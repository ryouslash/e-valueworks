import ScrollHint from "scroll-hint";

document.addEventListener("DOMContentLoaded", function () {
  initScrollHint();
});

/**
 * スクロールヒントの初期化処理
 */
function initScrollHint() {
  new ScrollHint(".js-scrollable", {
    i18n: {
      scrollable: "スクロールできます",
    },
  });
}
