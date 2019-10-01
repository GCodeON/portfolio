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

 mix.options({
     extractVueStyles: true,
     globalVueStyles: 'resources/assets/sass/app.scss'
 })

mix.js('resources/assets/js/app.js', 'public/js')
    .extract(['vue', 'jquery'])
    .version();

mix.sass('resources/assets/sass/app.scss', 'public/css')
.webpackConfig({
    module: {
        rules: [
            {
                test   : /\.jsx?$/,
                exclude: /node_modules(?!\/foundation-sites)|bower_components/,
                use    : [
                    {
                        loader : 'babel-loader',
                        options: Config.babel()
                    }
                ]
            }
        ]
    }
})
.sourceMaps()
.version()
.browserSync({
    proxy: 'gcodeon.lcl:8778',
    open : false,
    files: [
        'public/**/app.css'
    ]
});

mix.copy('public/vendor/cswiley/cms/assets/js/app.js', 'public/js/app-cms.js').version();
mix.copy('public/vendor/cswiley/cms/assets/css/app.css', 'public/css/app-cms.css').version();

mix.copy('public/vendor/cswiley/blogger/assets/js/app.js', 'public/js/app-blogger.js').version();

mix.copy('public/vendor/cswiley/blogger/assets/css/app.css', 'public/css/app-blogger.css').version();
