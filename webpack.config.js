const webpack = require('webpack');

module.exports = {
  entry: "./assets/js-codes/entry.js",
    output: {
        path: __dirname,
        filename: "./assets/bundle.js"
    },
    module: {
        loaders: [
            { test: /\.css$/, loader: "style!css" },
            { test: /\.jsx?$/, exclude: /node_modules/, loader: 'babel'}
        ]
    },
    plugins: [
      new webpack.optimize.UglifyJsPlugin({
        compress: {
          warnings: false
        },
        output: {
          comments: false
        }
      }),
    ]
};
