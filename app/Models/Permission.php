<?php

    namespace App\Models;

    use Spatie\Permission\Models\Permission as PermissionVendor;

    class Permission extends PermissionVendor
    {
        public $guard_name = 'admin';
    }
