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
 | todo:
 | toastr js und css
 */

/*------------------------------- BACKEND scripts ----------------------------------*/
/*Combine backend scripts aus resources/assets/js/*/
/*
 https://laravel.com/docs/5.4/mix#working-with-stylesheets
 mix.js
 mix.scripts
 mix.combine
 mix.babel(['src/files'], 'output/path');
 mix.babel() is identical to mix.combine() , other than it also applies Babel to the output.
 mix.copy('node_modules/foo/bar.css', 'public/css/bar.css');
 mix.copyDirectory('assets/img', 'public/img');

 if (mix.config.inProduction) {
 mix.version();
 }
 mix.browserSync('my-domain.dev');

*/

mix.sass('resources/assets/sass/frontend/app.scss', 'public/css/frontend.css')
    .sass('resources/assets/sass/backend/app.scss', 'public/css/backend.css')

mix.styles([
    './public/css/backend.css',
    'resources/assets/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css',
    'resources/assets/plugins/toastr/build/toastr.css',
    /*'resources/assets/plugins/ashleydw_lightbox/dist/ekko-lightbox.css'*/
    'resources/assets/plugins/fancybox3/jquery.fancybox.css',
    'resources/assets/plugins/animate.css',
    'resources/assets/plugins/bgrins-spectrum/spectrum.css',
    'resources/assets/plugins/sweetalert2/sweetalert2.css'
], 'public/css/backend.css');

//require('../../../../node_modules/toastr/build/toastr.min');

    mix.js('resources/assets/js/frontend/app.js', 'public/js/frontend.js')

    mix.js([
        'resources/assets/js/backend/before.js',
        'resources/assets/js/backend/app.js',
        'resources/assets/js/backend/after.js'
    ], 'public/js/backend.js');

mix.scripts([
    'resources/assets/plugins/toastr/build/toastr.js',
    /*'resources/assets/plugins/ashleydw_lightbox/dist/ekko-lightbox.js'*/
    'resources/assets/plugins/fancybox3/jquery.fancybox.js',
    'resources/assets/plugins/sweetalert2/sweetalert2.js',
    'resources/assets/plugins/bgrins-spectrum/spectrum.js'
], 'public/js/backend2.js');


if(mix.inProduction){
    mix.version();
}
