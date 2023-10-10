<?php

    return [

        /*
        |--------------------------------------------------------------------------
        | Admin Panel Prefix
        |--------------------------------------------------------------------------
        |
        | This value is the prefix of your admin section of application.
        |
        */

        'prefix' => env('ADMIN_PREFIX', 'admin'),

        /*
        |--------------------------------------------------------------------------
        | Admin Panel Theme Path
        |--------------------------------------------------------------------------
        |
        | This value is the path of folders for the files of this theme.
        |
        */

        'theme' => 'admin',

        /*
        |--------------------------------------------------------------------------
        | Admin Panel Title
        |--------------------------------------------------------------------------
        |
        | The default title of your admin panel, this goes into the title tag
        | of your page. You can override it per page with the title section.
        |
        */

        'title_prefix' => 'VT2 CMS - ',

        'title' => '',

        'title_postfix' => '',

        /*
        |--------------------------------------------------------------------------
        | Admin Panel Registration Link
        |--------------------------------------------------------------------------
        |
        | Set to "true" to show the link to the registration page in the login form.
        |
        */

        'register_link' => false,

        /*
        |--------------------------------------------------------------------------
        | Admin Panel Page Limit
        |--------------------------------------------------------------------------
        |
        | This number is limit of items for the lists pages.
        |
        */

        'page_limit' => 20,

        /*
        |--------------------------------------------------------------------------
        | CMS Name and Site URL
        |--------------------------------------------------------------------------
        */

        'cms' => [
            'name' => env('CMS_NAME', 'VT2 CMS'),
            'url'  => env('CMS_URL', 'https://vt2.com.ua'),
        ],

        /*
        |--------------------------------------------------------------------------
        | CMS Version
        |--------------------------------------------------------------------------
        */

        'version' => '3.0'

    ];
