let mix = require("laravel-mix");

require("laravel-mix-tailwind");
require("laravel-mix-purgecss");

mix.browserSync({
    proxy: 'book-store.test',
    notify: false,
    port: 8080
});

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

mix.js("resources/assets/js/app.js", "public/js")
    .postCss("resources/assets/css/app.css", "public/css")
    .tailwind()
    .purgeCss()
    .disableNotifications();

if (mix.inProduction()) {
    mix.version();
}
