<?php

    namespace Database\Seeders;

    use App\Models\Role;
    use Illuminate\Database\Seeder;
    use App\Models\Permission;
    use Illuminate\Support\Facades\DB;
    use Spatie\Permission\PermissionRegistrar;
    use App\Models\Admin;

    class RolesSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            // Reset cached roles and permissions
            app()[PermissionRegistrar::class]->forgetCachedPermissions();

            // create permissions
            DB::transaction(function () {
                //users
                Permission::create(['name' => 'add admins']);
                Permission::create(['name' => 'edit admins']);
                Permission::create(['name' => 'delete admins']);
                Permission::create(['name' => 'list admins']);

                //roles
                Permission::create(['name' => 'add roles']);
                Permission::create(['name' => 'edit roles']);
                Permission::create(['name' => 'delete roles']);
                Permission::create(['name' => 'list roles']);

                // settings
                Permission::create(['name' => 'list settings']);
                Permission::create(['name' => 'edit settings']);
                Permission::create(['name' => 'delete settings']);
                Permission::create(['name' => 'add settings']);

                //pages
                Permission::create(['name' => 'add pages']);
                Permission::create(['name' => 'edit pages']);
                Permission::create(['name' => 'delete pages']);
                Permission::create(['name' => 'list pages']);

            });

            $role = Role::create(['name' => Admin::ROLE_ADMIN, 'active' => true]);
            $role->syncPermissions(Permission::all());

            $role = Role::create(['name' => Admin::ROLE_MANAGER, 'active' => true]);
            $role->syncPermissions(Permission::whereIn('name', [
                'add pages',
                'edit pages',
                'delete pages',
                'list pages',
            ])->get());

        }
    }
