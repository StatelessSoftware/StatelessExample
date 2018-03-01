const path = require('path');

module.exports = {
  entry: './src/js/main.js',
  mode: "development",
  module: {
    rules: [
        {
           use: {
              loader:'babel-loader',
              options: { presets: ['env'] }
           },
           test: /\.js$/,
           exclude: /node_modules/
        }
    ]
  },
  output: {
    filename: 'main.js',
    path: path.resolve(__dirname, 'public/js')
  }
};