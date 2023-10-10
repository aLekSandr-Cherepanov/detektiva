<?php

    namespace App\Http\Controllers\Backend\Auth;

    use App\Http\Controllers\Controller;
    use Illuminate\Contracts\Auth\StatefulGuard;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\View\View;

    class AuthenticatedController extends Controller
    {
        /**
         * Get the guard to be used during authentication.
         *
         * @return StatefulGuard
         */
        protected function guard()
        {
            return Auth::guard('admin');
        }

        /**
         * Display the login view.
         *
         * @return Application|Factory|\Illuminate\Contracts\View\View|View
         */
        public function create()
        {
            return view('views.auth.login');
        }

        /**
         * Handle an incoming authentication request.
         *
         * @param Request $request
         *
         * @return RedirectResponse
         */
        public function store(Request $request): RedirectResponse
        {
            $this->validateLogin($request);
            if ($this->attemptLogin($request)) {
                $request->session()->regenerate();
                return redirect()->route('backend.dashboard');
            }
            return redirect()->back()->withErrors(['failed' => __('auth.failed')]);
        }

        /**
         * Get the needed authorization credentials from the request.
         *
         * @param Request $request
         * @return array
         */
        protected function credentials(Request $request): array
        {
            return $request->only($this->username(), 'password');
        }

        /**
         * Attempt to log the user into the application.
         *
         * @param Request $request
         *
         * @return bool
         */
        protected function attemptLogin(Request $request): bool
        {
            return Auth::guard('admin')->attempt(
                array_merge($this->credentials($request), ['active' => 1]), $request->filled('remember')
            );
        }

        /**
         * Get the login username to be used by the controller.
         *
         * @return string
         */
        public function username(): string
        {
            return 'email';
        }

        /**
         * Validate the user login request.
         *
         * @param Request $request
         *
         * @return void
         */
        protected function validateLogin(Request $request)
        {
            $request->validate([
                $this->username() => 'required|email',
                'password'        => 'required|string',
            ]);
        }

        /**
         * Destroy an authenticated session.
         *
         * @param Request $request
         *
         * @return RedirectResponse
         */
        public function destroy(Request $request): RedirectResponse
        {
            Auth::guard('admin')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        }
    }
