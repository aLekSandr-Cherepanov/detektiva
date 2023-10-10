<?php

    namespace App\Http\Controllers\Backend\Admins;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Backend\AdminRequest;
    use App\Models\Role;
    use App\Models\Admin;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Routing\Redirector;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Str;
    use Illuminate\View\View;

    class AdminsController extends Controller
    {

        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware(['permission:list admins'])->only('index');
            $this->middleware(['permission:add admins'])->only(['create', 'store']);
            $this->middleware(['permission:edit admins'])->only(['edit', 'update']);
            $this->middleware(['permission:delete admins'])->only('destroy');
        }

        /**
         * Display a listing of the resource.
         *
         * @return Application|Factory|\Illuminate\Contracts\View\View|View
         */
        public function index()
        {
            if (auth()->user()->can('delete admins')) {
                $admins = Admin::latest()->paginate(config('backend.page_limit'));
            } else {
                $admins = Admin::withTrashed()->latest()->paginate(config('backend.page_limit'));
            }
            $roles = Role::all();

            return view('views.admins.index', [
                'admins'     => $admins,
                'roles'      => $roles,
                'permission' => 'admins',
            ]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Application|Factory|\Illuminate\Contracts\View\View|View
         */
        public function create()
        {
            $roles = Role::all()->pluck('name', 'id')->toArray();
            return view('views.admins.create', ['roles' => $roles]);
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param AdminRequest $request
         *
         * @return Redirector
         */
        public function store(AdminRequest $request)
        {
            $admin                    = new Admin();
            $admin->name              = $request->name;
            $admin->email             = $request->email;
            $admin->phone             = $request->phone;
            $admin->active            = $request->active ?? false;
            $admin->remember_token    = Str::random(10);
            if (isset($request->password)) {
                $admin->password = Hash::make($request->password);
            }
            $admin->save();
            $admin->roles()->sync([$request->role]);

            return redirect(
                $request->get('action') == 'continue'
                    ? route('backend.admins.edit', ['admin' => $admin])
                    : route('backend.admins.index')
            )->with('success', ['text' => __('backend.admins.created')]);
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param Admin $admin
         *
         * @return Application|Factory|\Illuminate\Contracts\View\View|View
         */
        public function edit($admin)
        {
            $admin = Admin::findOrFail($admin);
            $roles = Role::all()->pluck('name', 'id')->toArray();

            $admin->password = '';
            return view('views.admins.edit', [
                'admin'      => $admin,
                'roles'      => $roles,
                'permission' => 'admins',
            ]);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param AdminRequest $request
         * @param Admin        $admin
         *
         * @return RedirectResponse
         */
        public function update(AdminRequest $request, $admin)
        {
            $admin        = Admin::findOrFail($admin);
            $admin->name  = $request->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            if ($admin->id != auth()->user()->id) {
                $admin->active = $request->active ?? false;
            }
            if (isset($request->password)) {
                $admin->password = Hash::make($request->password);
            }
            $admin->update();
            $admin->roles()->sync([$request->role]);

            return redirect(
                $request->get('action') == 'continue'
                    ? route('backend.admins.edit', ['admin' => $admin])
                    : route('backend.admins.index')
            )->with('success', ['text' => __('backend.admins.updated')]);
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param Admin $admin
         *
         * @return RedirectResponse
         */
        public function destroy($admin)
        {
            if ($admin != auth()->user()->id) {
                Admin::findOrFail($admin)->delete();
                return redirect(route('backend.admins.index'))
                    ->with('success', ['text' => __('backend.admins.deleted')]);
            } else {
                return redirect(route('backend.admins.index'))
                    ->withErrors('error', __('errors.users.delete_error'));
            }
        }

        /**
         * Force user logout.
         *
         * @param Admin $admin
         *
         * @return RedirectResponse
         */
        public function logout($admin)
        {
            Session::where('user_id', $admin->id)->delete();
            return redirect(route('backend.admins.edit', ['admin' => $admin]))->with('success', __('backend.admins.logout'));
        }

    }
