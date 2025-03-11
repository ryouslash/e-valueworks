const { merge } = require("webpack-merge");
const common = require("./webpack.common");

module.exports = merge(common, {
  mode: "production",
  resolve: {
    alias: {
      ...common.resolve.alias,
      vue$: "vue/dist/vue.esm-browser.prod.js",
    },
  },
  plugins: [],
});
