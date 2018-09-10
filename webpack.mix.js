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

//scss
mix.sass('resources/assets/sass/common/style.scss', 'public/css')
    .sass('resources/assets/sass/register/register.scss', 'public/css')
    .sass('resources/assets/sass/register/confirm.scss', 'public/css')
    .sass('resources/assets/sass/common/style_layout_building.scss', 'public/css')
    .sass('resources/assets/sass/building/style.scss', 'public/css/building')
    .sass('resources/assets/sass/register/fixconfig.scss', 'public/css')
    .sass('resources/assets/sass/cart/list_product.scss', 'public/css/cart')
    .sass('resources/assets/sass/cart/style.scss', 'public/css/cart')
    .options({
        processCssUrls: false
    });
    
//js
mix.js('resources/assets/js/common/script.js', 'public/js')
    .js('resources/assets/js/cart/script.js', 'public/js/cart')
    .js('resources/assets/js/cart/register.js', 'public/js/cart')
    .js('resources/assets/js/builder/index.js', 'public/js/builder')
    .js('resources/assets/js/builder/search.js', 'public/js/builder')
    .js('resources/assets/js/product/index.js', 'public/js/product')
    .js('resources/assets/js/common/postlink.js', 'public/js')
    .js('resources/assets/js/common/iinavi.js', 'iinavi/js')
    .js('resources/assets/main/main.js', 'public/js')
    .js('resources/assets/js/building/register.js', 'public/js/building');


