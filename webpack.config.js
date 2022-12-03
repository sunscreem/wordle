const path = require('path');
module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('assets/js'),
            '@Components': path.resolve('assets/js/Components'),
        },
    },
    devServer: {
        headers: { "Access-Control-Allow-Origin": "*"},

    }
};


