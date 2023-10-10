<?php

    namespace App\Http\Controllers\Frontend;

    use App\Http\Controllers\Controller;
    use App\Models\Pages\Page;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\View\View;

    class BlogController extends Controller
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

    }
