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

mix.js('resources/js/products.js', 'public/js')
    .react().version()

mix.js('resources/js/checkout.js', 'public/js')
    .react().version()

mix.js('resources/js/menu.js', 'public/js')
    .react().version()
