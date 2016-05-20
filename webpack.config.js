'use strict';

const webpack = require('webpack');

let path = require('path');

module.exports = {
  entry: "./app/app.js",
    output: {
        path: path.join(__dirname, 'build'),
        filename: "./bundle.js"
    },
    devtool: 'inline-source-map',
    module: {
        loaders: [
            {
              test: /\.css$/,
              loader: "style!css"
            },
            {
              test: /\.js$/,
              exclude: /node_modules/,
              loader: "babel-loader"
            }
        ]
    },
    plugins: [
      new webpack.optimize.UglifyJsPlugin({
        compress: {warnings: false},
        output: {comments: false}
      }),
    ]
};
