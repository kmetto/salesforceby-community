import path from 'path';
import CleanWebpackPlugin from 'clean-webpack-plugin';

module.exports =  {
    entry: {
        main: path.resolve(__dirname, '../src/frontend/js/search-hidden.js'),
    },
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: 'js/[name].bundle.js',
        publicPath: 'dist',
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /(node_modules)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['env'],
                    },
                },
            },
            {
                test: /\.(png|jpg|gif)$/,
                use: {
                    loader: 'file-loader',
                    options: {
                        outputPath: 'images',
                    },
                },
            },
            {
                test: /\.woff2?$/,
                use: {
                    loader: 'file-loader',
                    options: {
                        outputPath: 'fonts',
                        publicPath: 'dist/fonts/',
                    },
                },
            },
        ],
    },
    plugins: [
        new CleanWebpackPlugin('dist'),
    ],
};