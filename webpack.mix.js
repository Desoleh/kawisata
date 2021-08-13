const mix = require("laravel-mix");

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
// let mix = require("laravel-mix");

// mix.js("resources/js/app.js", "public/js")
//     .sass("resources/sass/app.scss", "public/css")
//     .sourceMaps();

mix.minify([
    "public/css/cetakslip.css",
    "public/css/custom-sidebar.css",
    "public/css/custom.css",
    "public/css/styles.css",
]);
mix.minify("public/js/main.js");
