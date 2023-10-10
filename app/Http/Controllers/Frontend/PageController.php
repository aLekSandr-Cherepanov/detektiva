<?php

    namespace App\Http\Controllers\Frontend;

    use App\Http\Controllers\Controller;
    use App\Models\Blocks\Block;
    use App\Models\Pages\Page;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\File;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\Response;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\View\View;
    class PageController extends Controller
    {
        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('guest');
        }

        /**
         * Display the home page.
         *
         * @return Application|Factory|\Illuminate\Contracts\View\View|View
         */
        public function index()
        {
            return view('home');
        }

        public function test()
        {
            return view('pages.contacts');
        }

        /**
         * Display the any page.
         *
         * @param $alias
         *
         * @return Application|Factory|\Illuminate\Contracts\View\View|View
         */
        public function page($alias)
        {
            $page = Page::with(['admin'])
                ->where('alias', $alias)
                ->active()
                ->firstOrFail();
            return view('pages.page', [
                'page' => $page,
            ]);
        }

        /**
         * Display the FAQ page.
         *
         * @return Application|Factory|\Illuminate\Contracts\View\View|View
         */
        public function faq()
        {
            $faqs = Block::with(['translations'])
                ->where('type', Block::TYPE_BLOCK_FAQ)
                ->orderBy('created_at', 'asc')
                ->get();

            return view('pages.faq', [
                'faqs' => $faqs,
            ]);
        }

        /**
         * Display the any node.
         *
         * @param $id
         *
         * @return Application|Factory|\Illuminate\Contracts\View\View|View
         */
        public function node($id)
        {
            $page = Page::with(['admin'])
                ->where('alias', 'node/' . $id)
                ->active()
                ->firstOrFail();

            return view('pages.page', [
                'page' => $page,
            ]);
        }

        /**
         * Display the contact page.
         *
         * @return Application|Factory|\Illuminate\Contracts\View\View|View
         */
        public function contact()
        {
            return view('pages.contacts');
        }

        /**
         * Display the contact page.
         *
         * @param Request $request
         *
         * @return JsonResponse
         */
        public function contactSend(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'name'    => 'required',
                'email'   => 'required|email',
                'phone'   => 'required',
                'message' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['result' => 'error', 'message' => __('frontend.form_error')]);
            }

            $data = $request->all();
            try {
                Mail::send('emails.email', ['request' => $request],
                    function ($mail) {
                        $mail->to(env('MAIL_FROM_ADDRESS', 'info@detektiva.com'), 'Detektiva.com')
                            ->subject(__('frontend.subject_message'));
                    });
                return response()->json(['result' => 'success', 'message' => __('frontend.send_success')]);
            } catch (\Exception $e) {
                $error = $e->getMessage();
                Log::error('Mail ERROR: ' . json_encode($error));
            }
            return response()->json(['result' => 'error', 'message' => __('frontend.send_error')]);
        }

        /**
         * Display the old image.
         *
         * @param $filename
         *
         * @return mixed
         */
        public function oldRootImage($filename)
        {
            $path = storage_path('app/public/files/image/' . $filename);

            if (!File::exists($path)) {
                abort(404);
            }

            $file = File::get($path);
            $type = File::mimeType($path);

            $response = Response::make($file, 200);
            $response->header("Content-Type", $type);

            return $response;
        }

    }
