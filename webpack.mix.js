let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/index_11102018.js', 'public/js')
   .js('resources/assets/js/register.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/register.scss', 'public/css')
   .sass('resources/assets/sass/terms.scss', 'public/css')
   .sass('resources/assets/sass/donation.scss', 'public/css')
   .sass('resources/assets/sass/register-step.scss', 'public/css')
   .sass('resources/assets/sass/confirmation.scss', 'public/css');
