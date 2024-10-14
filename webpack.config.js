const path = require('path');  //path モジュールの読み込み
// require() を使って MiniCssExtractPlugin の読み込み
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
// css-minimizer-webpack-plugin を読み込み変数 CssMinimizerPlugin に代入
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");

module.exports = {
  entry: {
    main: ['./src/js/main.js', './src/scss/style.scss'],
    top: './src/js/top.js',
    work: './src/js/work.js',
    price: './src/js/price.js',
    admin: ['./src/js/admin.js', './src/scss/admin.scss'],
    'editor-style': './src/js/editor-style.scss',
  },
  output: {  //出力先
    filename: 'js/[name].js',
    path: path.resolve(__dirname, 'dist'),
    //Asset Modules の出力先の指定
    assetModuleFilename: (pathData) => {
      const ext = path.extname(pathData.filename).replace('.', '');
      if (/png|jpe?g|gif|svg/.test(ext)) {
        return 'img/[name][ext][query]';
      }
      if (/eot|ttf|woff|woff2/.test(ext)) {
        return 'fonts/[name][ext][query]';
      }
      return '[name][ext][query]';
    }
  },
  externals: {
    jquery: 'jQuery'
  },
  watchOptions: {
    ignored: /node_modules/  //正規表現で指定（node_modules を除外）
  },

  //プラグインの設定（plugins プロパティの配列に追加）
  plugins: [
    new MiniCssExtractPlugin({
      filename: (pathData) => {
        // エントリーポイント名に応じて異なるファイル名を出力する
        return pathData.chunk.name === 'main' ? 'css/style.css' : 'css/[name].css';
      },
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
    splitChunks: {
      chunks: 'all',
      minSize: 1000,
      minChunks: 2,
      maxAsyncRequests: 30,
      maxInitialRequests: 30,
      enforceSizeThreshold: 50000,
      cacheGroups: {
        defaultVendors: {
          test: /[\\/]node_modules[\\/]/,
          priority: -10,
          reuseExistingChunk: true,
          name: 'vendors',  // vendor.js として出力
        },
      },
    },
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
  cache: {
    type: 'filesystem', // キャッシュをファイルシステムに保存
  },
};