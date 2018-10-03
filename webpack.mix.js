const mix = require('laravel-mix');
const path = require('path');
const webpack = require('webpack');

mix.js('resources/js/app.js', 'public/js').version();
mix.sass('resources/sass/app.scss', 'public/css').version();

mix.copyDirectory('resources/js/icons/svg', 'public/svg');
mix.webpackConfig({
    resolve: {
        alias: {
            '@': path.join(__dirname, './resources/js')
        }
    }
});