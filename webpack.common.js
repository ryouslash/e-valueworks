const path = require("path"); //path モジュールの読み込み
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");

module.exports = {
  entry: {
    main: ["./src/js/main.js", "./src/scss/style.scss"],
    top: "./src/js/top.js",
    work: "./src/js/work.js",
    price: "./src/js/price.js",
    admin: ["./src/js/admin.js", "./src/scss/admin.scss"],
    "editor-style": "./src/scss/editor-style.scss",
  },
  output: {
    //出力先
    filename: "js/[name].js",
    path: path.resolve(__dirname, "dist"),
    //Asset Modules の出力先の指定
    assetModuleFilename: (pathData) => {
      const ext = path.extname(pathData.filename).replace(".", "");
      if (/png|jpe?g|gif|svg/.test(ext)) {
        return "img/[name][ext][query]";
      }
      if (/eot|ttf|woff|woff2/.test(ext)) {
        return "fonts/[name][ext][query]";
      }
      return "[name][ext][query]";
    },
  },
  externals: {
    jquery: "jQuery",
  },
  module: {
    rules: [
      {
        // JS用のローダー
        test: /\.js$/,
        exclude: /node_modules/,
        use: [
          {
            loader: "babel-loader",
            options: {
              presets: ["@babel/preset-env"],
            },
          },
        ],
      },
      {
        //CSS & SASS 用のローダー
        // 対象となる拡張子を指定
        test: /\.(scss|sass|css)$/i,
        // どのローダーを噛ませるのかを指定（下から実行されていく。）
        use: [
          // styleタグを使ってCSS情報をHTML内に注入する処理
          // "style-loader",
          MiniCssExtractPlugin.loader,
          // CSS内でimportされているものをバンドル際に使用
          "css-loader",
          // ベンダープレフィックスが必要なものに自動的に付与
          "postcss-loader",
          // SASSからCSSへのコンパイルに使用
          "sass-loader",
        ],
      },
      //Asset Modules
      {
        //対象とするアセットファイルの拡張子を正規表現で指定
        test: /\.(png|jpe?g|gif|svg|eot|ttf|woff|woff2)$/i,
        //いずれかの type を指定
        type: "asset/resource",
      },
    ],
  },
  //プラグインの設定（plugins プロパティの配列に追加）
  plugins: [
    new MiniCssExtractPlugin({
      filename: (pathData) => {
        // エントリーポイント名に応じて異なるファイル名を出力する
        return pathData.chunk.name === "main"
          ? "css/style.css"
          : "css/[name].css";
      },
    }),
  ],
  //圧縮（minify）の設定
  optimization: {
    //minimize: true,  //モードに関わらず常に圧縮を有効にする場合は指定
    minimizer: [
      `...`, //JavaScript の圧縮を有効に（デフォルトの圧縮の設定を適用）
      new CssMinimizerPlugin({
        parallel: true, //ビルド速度を向上
      }),
    ],
    splitChunks: {
      chunks: "all",
      minSize: 0,
      minChunks: 2,
      maxAsyncRequests: 30,
      maxInitialRequests: 30,
      enforceSizeThreshold: 50000,
      cacheGroups: {
        defaultVendors: {
          test: /[\\/]node_modules[\\/]/,
          priority: -10,
          reuseExistingChunk: true,
          name: "vendors", // vendor.js として出力
        },
      },
    },
  },
  resolve: {
    alias: {
      "@scss": path.resolve(__dirname, "src/scss"),
      "@img": path.resolve(__dirname, "src/img"),
    },
  },
};
