<?php

    namespace App\Http\Controllers\Backend\Admins;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Backend\RoleRequest;
    use App\Models\Permission;
    use App\Models\Role;
    use Carbon\Carbon;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Http\Request;
    use Illuminate\Routing\Redirector;
    use Illuminate\View\View;

    class RolesController extends Controller
    {
        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware(['permission:list roles'])->only('index');
            $this->middleware(['permission:add roles'])->only(['create', 'store']);
            $this->middleware(['permission:edit roles'])->only(['edit', 'update']);
            $this->middleware(['permission:delete roles'])->only('destroy');
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
            $roles = Role::paginate(config('backend.page_limit'));
            return view('views.roles.index', [
                'roles'      => $roles,
                'permission' => 'roles',
            ]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Application|Factory|\Illuminate\Contracts\View\View|View
         */
        public function create()
        {
            $permissions = Permission::all();
            return view('views.roles.create', ['permissions' => $permissions]);
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param RoleRequest $request
         *
         * @return Redirector
         */
        public function store(RoleRequest $request)
        {
            $role               = new Role();
            $role->name         = $request->name;
            $role->description  = $request->description;
            if (isset($request->permissions)) {
                $role->syncPermissions($request->permissions);
            }
            $role->save();
            return redirect(route('backend.roles.index'))
                ->with('success', ['text' => __('backend.roles.created')]);
        }

        /**
         * Display the specified resource.
         *
         * @param int $id
         */
        public function show($id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         *
         * @return Application|Factory|\Illuminate\Contracts\View\View|View
         */
        public function edit($id)
        {
            $role            = Role::findOrFail($id);
            $permissions     = Permission::all();
            $rolePermissions = $role->permissions->pluck('id')->toArray();
            return view('views.roles.edit', [
                'role'            => $role,
                'permissions'     => $permissions,
                'rolePermissions' => $rolePermissions,
                'permission'      => 'roles',
            ]);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param RoleRequest $request
         * @param int         $id
         *
         * @return Redirector
         */
        public function update(RoleRequest $request, $id)
        {
            $role               = $old = Role::findOrFail($id);
            $role->id           = $id;
            $role->name         = $request->name;
            $role->description  = $request->description;

            if (isset($request->permissions)) {
                $role->updated_at = Carbon::now();
                $role->syncPermissions($request->permissions);
            }
            $role->save();

            return redirect(route('backend.roles.edit', ['role' => $role]))
                ->with('success', ['text' => __('backend.roles.updated')]);
        }

        /**
         * Remove the role.
         *
         * @param int $id
         *
         * @return Redirector
         */
        public function destroy($id)
        {
            Role::findOrFail($id)->delete();
            return redirect(route('backend.roles.index'))
                ->with('success', ['text' => __('backend.roles.deleted')]);
        }
    }
