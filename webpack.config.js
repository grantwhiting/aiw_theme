var ExtractTextPlugin = require("extract-text-webpack-plugin");

module.exports = {
  entry: ["./js/app.js", "./scss/main.scss"],
  output: {
    filename: "dist/bundle.js"
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
        use:  ExtractTextPlugin.extract(["style-loader", "css-loader"])
      },
      { // sass / scss loader for webpack
        test: /\.(sass|scss)$/,
        use: ExtractTextPlugin.extract(["css-loader", "sass-loader"])
      }
    ]
  },
  plugins: [
    new ExtractTextPlugin({ // define where to save the file
      filename: 'dist/[name].bundle.css',
      allChunks: true,
    }),
  ],
}
