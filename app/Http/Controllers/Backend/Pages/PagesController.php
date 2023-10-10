<?php

    namespace App\Http\Controllers\Backend\Pages;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Backend\PageRequest;
    use App\Models\Pages\Page;
    use Carbon\Carbon;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Http\Request;
    use Illuminate\Routing\Redirector;
    use Illuminate\Support\Str;
    use Illuminate\View\View;

    class PagesController extends Controller
    {
        private $page_limit;

        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware(['permission:list pages'])->only('index');
            $this->middleware(['permission:add pages'])->only(['create', 'store']);
            $this->middleware(['permission:edit pages'])->only(['edit', 'update']);
            $this->middleware(['permission:delete pages'])->only('destroy');

            $this->page_limit = config('backend.page_limit');
        }

        /**
         * Display a listing of the resource.
         *
         * @param Request $request
         *
         * @return Application|Factory|\Illuminate\Contracts\View\View|View
         */
        public function index(Request $request)
        {
            $pages = Page::with(['translations']);
            if (isset($request->search) && $request->search != '') {
                $pages = $pages->whereHas('translations', function ($query) use ($request) {
                    $query->where('title', 'LIKE', '%' . $request->search . '%');
                })->orWhere('alias', 'LIKE', '%' . $request->search . '%');
            }
            $pages = $pages->latest()->paginate($this->page_limit);

            return view('views.pages.index', [
                'pages'      => $pages,
                'permission' => 'pages',
            ]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Application|Factory|\Illuminate\Contracts\View\View|View
         */
        public function create()
        {
            return view('views.pages.create');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param PageRequest $request
         *
         * @return Redirector
         */
        public function store(PageRequest $request)
        {
            $data = $request->all();
            foreach (config('app.locales') as $lang) {
                if ($lang != config('app.locale')) {
                    if (is_array($data[$lang]) && $data[$lang]['title'] == null) {
                        unset($data[$lang]);
                    }
                }
            }
            if (!isset($data['alias'])) {
                $number = 1;
                $alias  = Str::slug($data[config('app.locale')]['title']);
                while (Page::where('alias', $alias)->first()) {
                    $alias = Str::slug($data[config('app.locale')]['title']) . '-' . $number++;
                }
                $data['alias'] = $alias;
            }
            $data['active']    = $request->active ?? 0;
            $data['admin_id']  = auth()->user()->id;
            $data['nid']       = 0;

            $page = Page::create($data);

            $date = Carbon::parse($request->date)->toDateString() . ' ' . Carbon::now()->toTimeString();
            $page->withoutTimestamps()->update([
                'created_at' => Carbon::parse($date)->toDateTimeString(),
                'updated_at' => Carbon::parse($date)->toDateTimeString(),
            ]);

            return redirect(
                $request->get('action') == 'continue'
                    ? route('backend.pages.edit', ['page' => $page])
                    : route('backend.pages.index')
            )->with('success', ['text' => __('backend.pages.created')]);
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param Page $page
         *
         * @return Application|Factory|\Illuminate\Contracts\View\View|View
         */
        public function edit($page)
        {
            $page = Page::findOrFail($page);

            if ($page->type == 1 && isset($term)) {
                $category = $term->id;
            } else {
                $category = 0;
            }
            return view('views.pages.edit', [
                'page'     => $page,
            ]);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param PageRequest $request
         * @param Page        $page
         *
         * @return Redirector
         */
        public function update(PageRequest $request, $page)
        {
            $data = $request->all();
            $page = Page::findOrFail($page);

            foreach (config('app.locales') as $lang) {
                if ($lang != config('app.locale')) {
                    if (is_array($data[$lang]) && $data[$lang]['title'] == null) {
                        unset($data[$lang]);
                        $page->deleteTranslations($lang);
                    }
                }
            }
            if (!isset($data['alias'])) {
                $number = 1;
                $alias  = Str::slug($data[config('app.locale')]['title']);
                while (Page::where('alias', $alias)->first()) {
                    $alias = Str::slug($data[config('app.locale')]['title']) . '-' . $number++;
                }
                $data['alias']    = $alias;
                $page->updated_at = Carbon::now();
            }
            $data['active']    = $request->active ?? 0;
            $page->update($data);

            $date = Carbon::parse($request->date)->toDateString() . ' ' . Carbon::parse($page->created_at)->toTimeString();
            $page->withoutTimestamps()->update([
                'created_at' => Carbon::parse($date)->toDateTimeString(),
                'updated_at' => Carbon::parse($date)->toDateTimeString(),
            ]);

            return redirect(
                $request->get('action') == 'continue'
                    ? route('backend.pages.edit', ['page' => $page])
                    : route('backend.pages.index')
            )->with('success', ['text' => __('backend.pages.updated')]);
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param Page $page
         *
         * @return Redirector
         */
        public function destroy($page)
        {
            Page::findOrFail($page)->delete();
            return redirect(route('backend.pages.index'))
                ->with('success', ['text' => __('backend.pages.deleted')]);
        }

        /**
         * Show the specified resource.
         *
         * @param Page $page
         *
         * @return Application|Factory|\Illuminate\Contracts\View\View|View
         */
        public function show($page)
        {
            $page = Page::with(['admin', 'titleImage'])
                ->where('alias', $page)
                ->firstOrFail();

            $page_prev = Page::active()
                ->where('created_at', '<', $page->created_at)
                ->whereIn('type', Page::getType('main_top'))
                ->orderByDesc('created_at')
                ->first();

            $page_next = Page::active()
                ->where('created_at', '>', $page->created_at)
                ->whereIn('type', Page::getType('main_top'))
                ->orderBy('created_at')
                ->first();

            return view('views.pages.show', [
                'page'      => $page,
                'page_prev' => $page_prev,
                'page_next' => $page_next,
            ]);
        }

    }
