const webpack = require('webpack');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');

module.exports = {
  optimization: {
    minimizer: [
        new UglifyJsPlugin({
          test: /\.js(\?.*)?$/i,
          extractComments: true,
          include: './bundle.js',
        } 
      )
    ]
  },
  entry: ["./js/app.js", "./scss/main.scss"],
  output: {
    filename: "./bundle.js",
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: "babel-loader"
      },
      { // regular css files
        test: /\.css$/,
        use:  ExtractTextPlugin.extract({
          fallback: "style-loader",
          use: [ { loader: 'css-loader', options: { minimize: true } }, 'postcss-loader' ]
        })
      },
      { // sass / scss loader for webpack
        test: /\.(sass|scss)$/,
        use: ExtractTextPlugin.extract([{ loader: 'css-loader', options: { minimize: true } }, 'postcss-loader', "sass-loader"])
      },
      {
        test: /\.(jpe?g|png|gif|svg)$/i,
        use: [
            'file-loader?hash=sha512&digest=hex&name=./images/[hash].[ext]',
            'image-webpack-loader?bypassOnDebug&optimizationLevel=7&interlaced=false'
        ]
      }
    ]
  },
  plugins: [
    new ExtractTextPlugin({ // define where to save the file
      filename: '[name].bundle.css',
      allChunks: true
    }),
    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery",
      "window.jQuery": "jquery"
    })
  ]
}
