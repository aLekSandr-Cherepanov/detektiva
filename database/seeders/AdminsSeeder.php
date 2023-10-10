<?php

    namespace Database\Seeders;

    use App\Models\Admin;
    use App\Models\Role;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Str;

    class AdminsSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $admin                    = new Admin();
            $admin->name              = 'Admin';
            $admin->password          = bcrypt('secret');
            $admin->email             = 'vt2company@gmail.com';
            $admin->active            = true;
            $admin->email_verified_at = now();
            $admin->locale            = 'ru';
            $admin->remember_token    = Str::random(10);
            $admin->save();

            $role = Role::where('name', Admin::ROLE_ADMIN)->first();
            $admin->assignRole($role);

        }
    }
