import $ from "jquery";
import debounce from "@js/utils/debounce";
import { dom, library } from "@fortawesome/fontawesome-svg-core";
import {
  faPenNib,
  faCode,
  faServer,
  faChevronDown,
  faLink,
  faChevronUp,
  faBars,
  faXmark,
  faCheck,
  faTag,
  faChevronLeft,
  faChevronRight,
  faSackDollar,
  faMagnifyingGlass,
  faCalculator,
} from "@fortawesome/free-solid-svg-icons";
import {
  faEnvelope,
  faHandshake,
  faHandPointRight,
} from "@fortawesome/free-regular-svg-icons";
import {
  faInstagram,
  faFacebook,
  faGithub,
  faLinkedin,
} from "@fortawesome/free-brands-svg-icons";

$(function () {
  initFontAwesome();
  initViewport();
  initVwSetting();
  initDrawerMenu();
  initPageTopButton();
  initAnchorScroll();
  initFixCta();
});

$(window).on("load", function () {
  setHeaderHeightVar();
});

/**
 * Font awesome 読み込み
 */
function initFontAwesome() {
  library.add(
    faEnvelope,
    faHandshake,
    faPenNib,
    faCode,
    faServer,
    faChevronDown,
    faLink,
    faInstagram,
    faFacebook,
    faGithub,
    faLinkedin,
    faChevronUp,
    faBars,
    faXmark,
    faCheck,
    faTag,
    faChevronLeft,
    faChevronRight,
    faSackDollar,
    faHandPointRight,
    faMagnifyingGlass,
    faCalculator
  );
  dom.i2svg();
}

/**
 * viewportタグの書き換えロジック（挙動がやや読めないため極力viewportのみに頼らない）
 */
function initViewport() {
  const FIXED_SP_WIDTH = 420;

  const oldViewport = document.querySelector("#viewport");
  if (oldViewport) oldViewport.remove();

  // 初期値を定義
  let content = "width=device-width,initial-scale=1";

  if (window.innerWidth <= FIXED_SP_WIDTH) {
    // 420px以下はwidth=420で固定
    content = `width=${FIXED_SP_WIDTH}`;
  }

  const meta = document.createElement("meta");
  meta.name = "viewport";
  meta.id = "viewport";
  meta.content = content;
  document.head.prepend(meta);
}

/**
 * 100vwの調整
 */
function initVwSetting() {
  function setVw() {
    let vw = $(window).width() / 100 + "px";
    $(":root").css("--vw", vw);
  }
  setVw();

  const debouncedSetVw = debounce(setVw, 200);
  $(window).on("resize", debouncedSetVw);
}

/**
 * ドロワーメニュー表示ロジック
 */
function initDrawerMenu() {
  const drawerBtn = document.querySelector(".l-header__drawerBtn");
  const drawerMenu = document.querySelector(".p-drawerMenu");

  if (drawerBtn && drawerMenu) {
    drawerBtn.addEventListener("click", function () {
      drawerBtn.classList.toggle("is-open");
      drawerMenu.classList.toggle("is-show");
    });
  }
}

/**
 * 少しスクロールしたところでページトップボタンを表示するロジック
 */
function initPageTopButton() {
  let pageTop = $(".c-pageTop");
  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 1000) {
      pageTop.addClass("is-show");
    } else {
      pageTop.removeClass("is-show");
    }
  });
}

/**
 * スムースリンクの実装ロジック
 */
function initAnchorScroll() {
  $('a[href^="#"]').on("click", function (e) {
    e.preventDefault();
    const headerHeight = document.querySelector(".l-header")?.offsetHeight || 0;
    let href = $(this).attr("href");
    let target = $(href === "#" || href === "" ? "html" : href);
    let position = target.offset().top - headerHeight;
    $("html, body").animate({ scrollTop: position }, 2000, "swing");
  });
}

/**
 * 固定CTAの実装ロジック
 */
function initFixCta() {
  let fixCtaLeft = document.querySelector(".p-fixCta__left");
  let fixCtaClose = document.querySelector(".p-fixCta__close");

  if (fixCtaLeft) {
    fixCtaLeft.addEventListener("click", function () {
      let targetElement = document.querySelector(".p-fixCta");
      if (targetElement) {
        targetElement.classList.toggle("is-active");
      }
    });
  }

  if (fixCtaClose) {
    fixCtaClose.addEventListener("click", function () {
      let targetElement = document.querySelector(".p-fixCta");
      if (targetElement) {
        targetElement.classList.remove("is-active");
      }
    });
  }
}

/**
 * ヘッダーの高さ取得ロジック
 */
function setHeaderHeightVar() {
  const header = document.querySelector(".l-header");
  if (header) {
    const headerHeight = header.offsetHeight;
    document.documentElement.style.setProperty(
      "--headerHeight",
      `${headerHeight}px`
    );
  }
}
