const path = require('path');
module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
            '@Components': path.resolve('resources/js/Components'),
        },
    },
    devServer: {
        headers: { "Access-Control-Allow-Origin": "*"},

    }
};


