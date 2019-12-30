const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .scripts([
        'resources/js/classes/form.js',
        'resources/js/classes/notification.js',
    ], 'public/js/app-admin.js')
    .scripts([
        'resources/js/custom.js'
    ], 'public/js/app-public.js')
    .sass('resources/sass/app.scss', 'public/css')
    .version();
