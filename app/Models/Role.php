<?php

    namespace App\Models;

    use Spatie\Permission\Models\Role as RoleModel;

    class Role extends RoleModel
    {
        public $guard_name = 'admin';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = ['name', 'guard_name', 'active'];

    }
