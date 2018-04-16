import path from 'path';
import CleanWebpackPlugin from 'clean-webpack-plugin';
import ExtractTextPlugin from 'extract-text-webpack-plugin';
module.exports =  {
    entry: {
        main: path.resolve(__dirname, 'src/frontend/js/search-hidden.js'),
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
                test: /\.css$/,
                use: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: ['css-loader'],
                }),
            },
            {
                test: /\.(png|jpg|gif)$/,
                use: {
                    loader: 'file-loader',
                    options: {
                        name: '[path][name].[ext]',
                        outputPath: 'images/',
                    },
                },
            },
        ],
    },
    plugins: [
        new CleanWebpackPlugin('dist'),
        new ExtractTextPlugin('css/custom-styles.css'),
    ],
};