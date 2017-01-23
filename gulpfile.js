var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')

        .styles([
        'resources/assets/css/bootstrap.css',
        'resources/assets/css/font-awesome.css',
        'resources/assets/css/sb-admin-2.css',
        'resources/assets/css/timeline.css',
        'resources/assets/css/blur-table.css'
    ], 'public/css/libs.css')
    .scripts([
        'resources/assets/js/jquery.js',
        'resources/assets/js/bootstrap.js',
        'resources/assets/js/Chart.js',
        'resources/assets/js/metisMenu.js',
        'resources/assets/js/sb-admin-2.js',
        'resources/assets/js/frontend.js'
    ],  'public/js/libs.js')
});
