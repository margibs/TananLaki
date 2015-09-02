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
    mix.styles([
    	"style.css",    	
    	"css/dark.css",
    	"css/animate.css",
    	"css/magnific-popup.css",
    	"css/responsive.css",
    	"myStyle.css"
    ], 'public/css', 'public')
    .version("public/css/all.css");
});
