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
    	"css/reset.min.css",    	
    	"css/grid12.css",
    	"css/social-buttons.css",
    	"myStyle.css"
    ], 'public/css', 'public')
    .version("public/css/all.css");
});
