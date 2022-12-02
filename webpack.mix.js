const mix = require('laravel-mix');

const proxyURL = process.env.MIX_PROXY_URL;

const path = require('path');

mix.setPublicPath(path.normalize('public'))
    .js('resources/js/app.js', 'public/assets/js')
    .postCss("resources/css/app.css", "public/assets/css", [
        require('postcss-import'),
        require('tailwindcss/nesting'),
        require('tailwindcss'),
    ])
    .vue({version:3})
    .sourceMaps(true,'source-map')
    .webpackConfig(require('./webpack.config'))
    .extract()
    .browserSync({
        proxy: proxyURL,
        open: false,
        notify: false,
        files: [
            "resources/**/*.blade.php",
            "web/**/*.(js|css|svg)",
            "tailwind.config.js"
        ],
    });

// if (mix.inProduction()) {
    mix.version();
// }






