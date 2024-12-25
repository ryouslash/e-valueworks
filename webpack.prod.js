const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const { merge } = require("webpack-merge");
const common = require("./webpack.common");

module.exports = merge(common, {
  mode: "production",
  plugins: [
    // 出力ディレクトリをビルドの度にクリーンしてくれるプラグイン（ビルド後のファイルにWordPressタグを記載してく際は要削除。）
    new CleanWebpackPlugin(),
  ],
});
