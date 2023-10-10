const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */


mix.copy('resources/frontend/css', 'public/css');
mix.copy('resources/frontend/js', 'public/js');
mix.copy('resources/frontend/images', 'public/images');
mix.copy('resources/frontend/fonts', 'public/fonts');

/*
 |--------------------------------------------------------------------------
 | Backend
 |--------------------------------------------------------------------------
 */
mix.copy('resources/backend/admin/assets/css', 'public/backend/assets/css');
mix.copy('resources/backend/admin/assets/fonts', 'public/backend/assets/fonts');
mix.copy('resources/backend/admin/assets/icons', 'public/backend/assets/icons');
mix.copy('resources/backend/admin/assets/images', 'public/backend/assets/images');
mix.copy('resources/backend/admin/assets/js', 'public/backend/assets/js');
mix.copy('resources/backend/admin/assets/pages', 'public/backend/assets/pages');
mix.copy('resources/backend/admin/assets/plugins', 'public/backend/assets/plugins');

mix.sass('resources/backend/admin/assets/scss/style.scss', 'public/backend/assets/css');