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
const PrerenderSPAPlugin = require('prerender-spa-plugin');
const PuppeteerRenderer = PrerenderSPAPlugin.PuppeteerRenderer;

mix.js('resources/assets/js/app.js', 'public/js/app.js')
    .js('resources/assets/js/login.js', 'public/js/login.js')
    .js('resources/assets/dashboard/app.js', 'public/js/dashboard.js')

    .js('resources/assets/js/jquery.js', 'public/js/jquery.js')

    .sass('resources/assets/sass/app.scss', 'public/css')

    .version()
    .sourceMaps()
    .browserSync({
        proxy: 'localhost:8000',
        port: 3002,
        ui: {
            port: 3003
        },
        notify: false
    })
    .disableSuccessNotifications()
    .webpackConfig({
        plugins: [
            new PrerenderSPAPlugin({
                staticDir: path.join(__dirname, '/public'),
                outputDir: path.join(__dirname, 'resources/views/preRendered'),
                indexPath: path.join(__dirname, 'resources/views/home', 'index.html'),
                routes: [
                    '/',
                    '/brunch-menu',
                    '/menu',
                    '/contact',
                    '/liveMusic',
                    '/catering',
                ],
                renderer: new PuppeteerRenderer(),
                minify: {
                    collapseBooleanAttributes: true,
                    collapseWhitespace: true,
                    decodeEntities: true,
                    keepClosingSlash: true,
                    sortAttributes: true
                }
            }),
        ]
    });
