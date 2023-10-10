<?php

    namespace App\Models;

    use App\Traits\Uuids;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Spatie\Permission\Traits\HasRoles;

    class Admin extends Authenticatable
    {
        use Notifiable, HasRoles, SoftDeletes, Uuids;

        const ROLE_ADMIN   = 'admin';
        const ROLE_MANAGER = 'manager';

        protected $keyType = 'string';
        public $guard_name = 'admin';

        /**
         * Indicates if the IDs are auto-incrementing.
         *
         * @var bool
         */
        public $incrementing = false;

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = ['name', 'email', 'phone', 'active'];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden
            = [
                'password', 'remember_token',
            ];

        /**
         * The attributes that should be cast to native types.
         *
         * @var array
         */
        protected $casts
            = [
                'email_verified_at' => 'datetime',
            ];

    }
