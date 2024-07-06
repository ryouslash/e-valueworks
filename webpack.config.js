const path = require('path');  //path モジュールの読み込み
// require() を使って MiniCssExtractPlugin の読み込み
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
// css-minimizer-webpack-plugin を読み込み変数 CssMinimizerPlugin に代入
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");

module.exports = {
  entry: ['./src/js/index.js', './src/scss/style.scss'],
  output: {  //出力先
    filename: 'js/main.js',
    path: path.resolve(__dirname, 'dist'),
    //Asset Modules の出力先の指定
    assetModuleFilename: 'img/[name][ext][query]'
  },
  watchOptions: {
    ignored: /node_modules/  //正規表現で指定（node_modules を除外）
  },
  //プラグインの設定（plugins プロパティの配列に追加）
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'css/style.css',  //ファイル名を指定
    }),
  ],
  //圧縮（minify）の設定
  optimization: {
    //minimize: true,  //モードに関わらず常に圧縮を有効にする場合は指定
    minimizer: [
      `...`,  //JavaScript の圧縮を有効に（デフォルトの圧縮の設定を適用）
      new CssMinimizerPlugin({
        parallel: true,  //ビルド速度を向上
      }),
    ],
  },
  module: {
    rules: [
      {
        //CSS & SASS 用のローダー
        test: /\.(scss|sass|css)$/i,  //拡張子 .scss、.sass、css を対象
        //使用するローダーを指定
        use: [
        // CSSファイルを抽出するように MiniCssExtractPlugin のローダーを指定
        MiniCssExtractPlugin.loader,
          // CSS ローダー
          //'style-loader', //この場合は必要ないので削除
          // CSS を JavaScript に変換するローダー（ソースマップを有効に）
          { loader: 'css-loader', options: { sourceMap: true } },
          // Sass をコンパイルするローダー（ソースマップを有効に）
          { loader: 'sass-loader', options: { sourceMap: true } },
        ],
      },
      //Asset Modules
      {
        //対象とするアセットファイルの拡張子を正規表現で指定
        test: /\.(png|jpe?g|gif|svg|eot|ttf|woff|woff2)$/i,
        //いずれかの type を指定
        type: 'asset/resource'
      },
      {
        // Babel 用のローダー
        test: /\.js$/,
        exclude: /node_modules/,
        use: [
          {
            loader: 'babel-loader',
            options: {
              presets: ['@babel/preset-env']
            }
          }
        ]
      },
  
    ]
  },
  //カンマが必要
  mode: 'development', // 追加
  devtool: 'source-map', // 追加
  //webpack-dev-server の設定
  devServer: {
    static: './',  //静的ファイルの場所
    open: true, // ブラウザを自動的に開く
  },
};
