// import { createApp } from "vue";
// import App from "../App.vue";
// import ScrollHintPlugin from "../plugins/scrollHint.js";

import ScrollHint from "scroll-hint";

// const app = createApp(App);
// app.use(ScrollHintPlugin);
// app.mount("#app");

// scrollHintを初期化
new ScrollHint(".js-scrollable", {
  i18n: {
    scrollable: "スクロールできます",
  },
});
