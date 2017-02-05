const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

var elixirTypscript = require('elixir-typescript');
require('laravel-elixir-livereload');

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

elixir(mix => {
    // mix.sass('app.scss')
    //    .webpack('app.js');

    // mix.typescript('main.ts', 'public/');

    mix.copy('node_modules/@angular', 'public/@angular');
    mix.copy('node_modules/core-js', 'public/core-js');
    mix.copy('node_modules/zone.js', 'public/zone.js');
    mix.copy('node_modules/systemjs', 'public/systemjs');
    mix.copy('node_modules/rxjs', 'public/rxjs');

    mix.typescript('app/*.ts', 'public/app', null, {
	    "target": "es5",
	    "module": "commonjs",
	    "moduleResolution": "node",
	    "sourceMap": true,
	    "emitDecoratorMetadata": true,
	    "experimentalDecorators": true,
	    "lib": [ "es2015", "dom" ],
	    "noImplicitAny": true,
	    "suppressImplicitAnyIndexErrors": true
	  });

    mix.typescript('main.ts', 'public/main.js', null, {
	    "target": "es5",
	    "module": "commonjs",
	    "moduleResolution": "node",
	    "sourceMap": true,
	    "emitDecoratorMetadata": true,
	    "experimentalDecorators": true,
	    "lib": [ "es2015", "dom" ],
	    "noImplicitAny": true,
	    "suppressImplicitAnyIndexErrors": true
	  });

    mix.livereload();
    mix.browserSync({proxy: 'hsky.demo.me:8080'});
});
