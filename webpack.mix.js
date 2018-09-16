const mix = require('laravel-mix');
const path = require('path');
const webpack = require('webpack');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.webpackConfig({
    resolve: {
        alias: {
            '@': path.join(__dirname, './resources/js')
        }
    }
});