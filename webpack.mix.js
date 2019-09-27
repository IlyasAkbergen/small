const mix = require('laravel-mix');

mix.js('resources/js/modules/dashboard/dashboard.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
