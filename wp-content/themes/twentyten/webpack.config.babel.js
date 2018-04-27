import path from 'path';
import CleanWebpackPlugin from 'clean-webpack-plugin';
import ExtractTextPlugin from 'extract-text-webpack-plugin';
module.exports =  {
    entry: {
        'main.js': path.resolve(__dirname, 'src/frontend/js/search-hidden.js'),
        'styles.css': path.resolve(__dirname, 'src/frontend/styles/index.scss'),
    },
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: '[name]',
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
                test: /\.scss$/,
                use: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: ['css-loader', 'sass-loader'],
                }),
            },
            {
                test: /\.(png|jpg|gif)$/,
                use: {
                    loader: 'file-loader',
                    options: {
                        outputPath: 'images/',
                    },
                },
            },
            {
                test: /\.woff2?$/,
                use: {
                    loader: 'file-loader',
                    options: {
                        outputPath: 'fonts',
                        publicPath: 'fonts/',
                    },
                },
            },
        ],
    },
    plugins: [
        new CleanWebpackPlugin('dist'),
        new ExtractTextPlugin('styles.css'),
    ],
};