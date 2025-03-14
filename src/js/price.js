import { createApp } from "vue";
import App from "../App.vue";

import ScrollHint from "scroll-hint";

const app = createApp(App);
app.mount("#app");

// scrollHintを初期化
new ScrollHint(".js-scrollable", {
  i18n: {
    scrollable: "スクロールできます",
  },
});
