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
    .scripts('resources/js/pages/asset/create.js', 'public/js/pages/asset/create.js')
    .scripts('node_modules/select2/dist/js/select2.full.js', 'public/vendor/select2/dist/js/select2.js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles('node_modules/select2/dist/css/select2.css', 'public/vendor/select2/dist/css/select2.css')
