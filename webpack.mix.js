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
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
  'resources/assets/css_course/libs/blog-post.css',
  'resources/assets/css_course/libs/bootstrap.css',
  'resources/assets/css_course/libs/font-awesome.css',
  'resources/assets/css_course/libs/metisMenu.css',
  'resources/assets/css_course/libs/sb-admin-2.css',
  'resources/assets/css_course/libs/styles.css',

], 'public/css/libs.css');

mix.scripts([
  'resources/assets/js_course/libs/jquery.js',
  'resources/assets/js_course/libs/bootstrap.js',
  'resources/assets/js_course/libs/metisMenu.js',
  'resources/assets/js_course/libs/sb-admin-2.js',
  'resources/assets/js_course/libs/scripts.js',

], 'public/js/libs.js');
