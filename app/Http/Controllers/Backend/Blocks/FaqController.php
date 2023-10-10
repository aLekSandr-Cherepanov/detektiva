<?php

    namespace App\Http\Controllers\Backend\Blocks;

    use App\Http\Controllers\Controller;
    use App\Models\Blocks\Block;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\View\View;

    class FaqController extends Controller
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
         * Display a listing of the moving lines.
         *
         * @return Application|Factory|\Illuminate\Contracts\View\View|View
         */
        public function index()
        {
            $blocks = Block::with(['translations'])
                ->where('type', Block::TYPE_BLOCK_FAQ)
                ->latest('order')->paginate($this->page_limit);

            return view('views.blocks.faq.index', [
                'blocks'     => $blocks,
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
            return view('views.blocks.faq.create');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param Request $request
         *
         * @return Application|RedirectResponse
         */
        public function store(Request $request)
        {
            $data = $request->all();
            foreach (config('app.locales') as $lang) {
                if ($lang != config('app.locale')) {
                    if (is_array($data[$lang]) && $data[$lang]['title'] == null) {
                        unset($data[$lang]);
                    }
                }
            }

            $order = Block::with(['translations'])->orderBy('order', 'desc')->first();

            $data['name']     = __('backend.blocks.faq');
            $data['type']     = Block::TYPE_BLOCK_FAQ;
            $data['active']   = $request->active ?? 0;
            $data['admin_id'] = auth()->user()->id;
            $data['order']    = $order ? $order->order + 10 : 0;

            $block = Block::create($data);

            return redirect(
                $request->get('action') == 'continue'
                    ? route('backend.blocks.faq.edit', ['faq' => $block])
                    : route('backend.blocks.faq.index')
            )->with('success', ['text' => __('backend.blocks.created')]);
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param $block
         *
         * @return Application|Factory|\Illuminate\Contracts\View\View|View
         */
        public function edit($block)
        {
            $block = Block::findOrFail($block);
            return view('views.blocks.faq.edit', [
                'block' => $block,
            ]);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param Request $request
         * @param         $block
         *
         * @return Application|RedirectResponse
         */
        public function update(Request $request, $block)
        {
            $data = $request->all();
            $block = Block::findOrFail($block);

            foreach (config('app.locales') as $lang) {
                if ($lang != config('app.locale')) {
                    if (is_array($data[$lang]) && $data[$lang]['title'] == null) {
                        unset($data[$lang]);
                        $block->deleteTranslations($lang);
                    }
                }
            }

            $data['active']   = $request->active ?? 0;
            $data['admin_id'] = auth()->user()->id;
            $data['order']    = isset($request->order) ? $request->order : 0;

            $block->update($data);

            return redirect(
                $request->get('action') == 'continue'
                    ? route('backend.blocks.faq.edit', ['faq' => $block])
                    : route('backend.blocks.faq.index')
            )->with('success', ['text' => __('backend.blocks.updated')]);
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param $block
         *
         * @return Application|RedirectResponse
         */
        public function destroy($block)
        {
            Block::findOrFail($block)->delete();
            return redirect(route('backend.blocks.faq.index'))
                ->with('success', ['text' => __('backend.blocks.faq.deleted')]);
        }

    }
