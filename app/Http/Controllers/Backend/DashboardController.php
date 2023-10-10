<?php

    namespace App\Http\Controllers\Backend;

    use App\Http\Controllers\Controller;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\View\View;

    class DashboardController extends Controller
    {

        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('auth');
        }

        /**
         * Display the dashboard page.
         *
         * @return Application|Factory|\Illuminate\Contracts\View\View|View
         */
        public function index()
        {
            return view('views.dashboard.index');
        }

        /**
         * Switch language
         *
         * @param $locale
         *
         * @return RedirectResponse
         */
        public function setLocale($locale)
        {
            if (in_array($locale, config('app.backend_locales'))) {
                session()->put('backend_locale', $locale);
            }
            return redirect()->back();
        }

    }
