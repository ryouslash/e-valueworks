import $ from "jquery";
import "slick-carousel/slick/slick.min.js";

$(function () {
  initTypingAnimation();
  initMainVisualFadeIn();
  initNewsSlider();
  initWorkSlider();
  initFaqToggle();
});

$(window).on("load scroll", function () {
  initScrollAnimation();
  animatePromiseSection();
});

/**
 * タイピングアニメーションの初期化
 */
function initTypingAnimation() {
  const lang = document.documentElement.lang;

  const typing = (el, sentence) => {
    const target = document.querySelector(el);
    if (!target) return;

    if (lang === "en-US") {
      [...sentence].forEach((char, index) => {
        setTimeout(() => {
          target.innerHTML += char === "\n" ? "<br>" : char;
        }, 60 * index);
      });
    } else {
      [...sentence].forEach((char, index) => {
        setTimeout(() => {
          target.innerHTML += char === "\n" ? "<br>" : char;
        }, 100 * index);
      });
    }
  };

  setTimeout(() => {
    if (lang === "en-US") {
      typing(
        ".js-typing--en",
        "Coding that transforms experience\nthrough the power of UX."
      );
    } else {
      typing(
        ".js-typing--ja",
        window.innerWidth <= 419
          ? "魅せ方ひとつで、\n体験が変わる\nUXをデザインするコーディング"
          : "魅せ方ひとつで、体験が変わる\nUXをデザインするコーディング"
      );
    }
  }, 1000);
}

/**
 * メインビジュアルのテキストとボタン表示
 */
function initMainVisualFadeIn() {
  const mainVisualText = document.querySelector(".p-top-mainVisual__text");
  const mainVisualButton = document.querySelector(".p-top-mainVisual__buttons");
  const lang = document.documentElement.lang;

  if (lang === "en-US") {
    setTimeout(() => {
      mainVisualText.classList.add("is-show");
    }, 4700);

    setTimeout(() => {
      mainVisualButton.classList.add("is-show");
    }, 5200);
  } else {
    setTimeout(
      () => {
        mainVisualText.classList.add("is-show");
      },
      window.innerWidth <= 419 ? 4400 : 4300
    );

    setTimeout(
      () => {
        mainVisualButton.classList.add("is-show");
      },
      window.innerWidth <= 419 ? 4900 : 4800
    );
  }
}

/**
 * お知らせスライダーの切り替え処理
 */
function initNewsSlider() {
  let items = $(".p-top-news__item");
  let nextItem = 1;

  items.eq(0).addClass("is-slideIn");

  if (items.length > 1) {
    function showNextItem() {
      items.removeClass("is-slideIn");
      items.eq(nextItem).addClass("is-slideIn");
      nextItem = (nextItem + 1) % items.length;
    }
    setInterval(showNextItem, window.innerWidth <= 419 ? 5400 : 5300);
  } else {
    items.eq(0).addClass("is-slideIn");
  }
}

/**
 * スクロールアニメーション（お悩み・アバウト・約束・料金）
 */
function initScrollAnimation() {
  const header = document.querySelector(".l-header");
  const headerHeight = header.offsetHeight;
  const windowTop = $(window).scrollTop();
  const windowHeight = $(window).outerHeight();
  const windowCenter = windowTop + windowHeight / 2;

  // お悩みはこちら
  const $troubleElement = $(".p-top-troubles");
  const troubleOffsetTop = $troubleElement.offset().top;
  if (windowTop > troubleOffsetTop - headerHeight) {
    $troubleElement.find(".p-top-troubles__item").each(function (index) {
      setTimeout(() => $(this).addClass("is-fadeIn"), index * 200);
    });
  }

  // アバウト
  const $aboutElement = $(".p-top-about");
  const aboutOffsetTop = $aboutElement.offset().top;
  if (windowTop > aboutOffsetTop - headerHeight) {
    $aboutElement.find(".p-top-about__items").addClass("is-active");
  }

  // 料金プラン
  const $priceElement = $(".p-top-price__plans");
  const priceOffsetTop = $priceElement.offset().top;
  if (windowCenter > priceOffsetTop) {
    $priceElement.find(".p-top-price__plan").addClass("is-active");
  }
}

/**
 * お客様への4つのお約束 表示ロジック
 */
function animatePromiseSection() {
  if ($(window).width() <= 1024) return;

  const headerHeight = document.querySelector(".l-header").offsetHeight;
  const windowTop = $(window).scrollTop();

  $(".p-top-promise__img").each(function (index) {
    const $img = $(this);
    const imgTop = $img.offset().top;
    const imgBottom = imgTop + $img.outerHeight();
    const $item = $(".p-top-promise__item").eq(index);

    if (index === 0) {
      imgBottom < windowTop + headerHeight
        ? $item.removeClass("is-active")
        : $item.addClass("is-active");
    }

    if (index === 1 || index === 2) {
      if (
        imgTop > windowTop + headerHeight ||
        imgBottom < windowTop + headerHeight
      ) {
        $item.removeClass("is-active");
      } else {
        $item.addClass("is-active");
      }
    }

    if (index === 3) {
      imgTop <= windowTop + headerHeight
        ? $item.addClass("is-active")
        : $item.removeClass("is-active");
    }
  });
}

/**
 * 制作実績のスライダー初期化
 */
function initWorkSlider() {
  $(".p-top-work__slider").slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });
}

/**
 * よくある質問の開閉処理
 */
function initFaqToggle() {
  $(".p-top-faq__list").on("click", function () {
    $(this).toggleClass("is-open");
  });
}
