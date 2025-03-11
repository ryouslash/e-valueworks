import $ from "jquery";
import { createApp } from "vue";

import "slick-carousel/slick/slick.min.js";

const app = createApp({
  data() {
    return {
      message: "Hello World",
    };
  },
});
app.mount("#app");

$(function () {
  // メインビジュアル箇所
  const typing = (el, sentence) => {
    [...sentence].forEach((char, index) => {
      setTimeout(() => {
        if (char === "\n") {
          document.querySelector(el).innerHTML += "<br>";
        } else {
          document.querySelector(el).innerHTML += char; // innerHTMLを使用
        }
      }, 100 * index);
    });
  };

  // タイピングの開始を1秒遅らせる
  setTimeout(() => {
    if (window.innerWidth <= 419) {
      typing(
        ".js-typing",
        "「早さ・正確さ・親身さ」\nが揃った\nコーディング代行事務所"
      );
    } else {
      typing(
        ".js-typing",
        "「早さ・正確さ・親身さ」が揃った\nコーディング代行事務所"
      );
    }
  }, 1000);

  const mainVisualText = document.querySelector(".p-top-mainVisual__text");
  const mainVisualButton = document.querySelector(".p-top-mainVisual__buttons");

  setTimeout(() => {
    mainVisualText.classList.add("is-show");
  }, 4300);

  setTimeout(() => {
    mainVisualButton.classList.add("is-show");
  }, 4800);

  // お知らせ 箇所
  let items = $(".p-top-news__item");
  let nextItem = 1;

  // 初期状態で1つ目のアイテムにクラスを追加
  items.eq(0).addClass("is-slideIn");
  if (items.length > 1) {
    function showNextItem() {
      items.removeClass("is-slideIn");
      items.eq(nextItem).addClass("is-slideIn");
      nextItem = (nextItem + 1) % items.length;
    }

    setInterval(showNextItem, 5000);
  } else {
    // アイテムが1つしかない場合は常に `is-slideIn` クラスを保持する
    items.eq(0).addClass("is-slideIn");
  }

  // スクロールイベントの監視
  $(window).on("load scroll", function () {
    const header = document.querySelector(".l-header");
    const headerHeight = header.offsetHeight; // 数値として保持

    // お悩みはこちら 箇所
    let $troubleElement = $(".p-top-troubles");
    let troubleOffsetTop = $troubleElement.offset().top;
    let windowTop = $(window).scrollTop();

    if (windowTop > troubleOffsetTop - headerHeight) {
      $troubleElement.find(".p-top-troubles__item").each(function (index) {
        let $item = $(this);
        setTimeout(function () {
          $item.addClass("is-fadeIn");
        }, index * 200);
      });
    }

    // アバウト 箇所
    let $aboutElement = $(".p-top-about");
    let aboutOffsetTop = $aboutElement.offset().top;

    if (windowTop > aboutOffsetTop - headerHeight) {
      $aboutElement.find(".p-top-about__items").addClass("is-active");
    }

    // お客様への4つのお約束 箇所
    function promise() {
      // 画面幅を取得
      let windowWidth = $(window).width();

      // 画面幅が1024px以下の場合、処理を中断
      if (windowWidth <= 1024) {
        return;
      }

      $(".p-top-promise__img").each(function (index) {
        // 画像の位置を取得
        let promiseImgTop = $(this).offset().top;
        let promiseImgBottom = promiseImgTop + $(this).outerHeight();
        // ウィンドウのスクロール位置を取得
        let windowTop = $(window).scrollTop();

        // 1番目の要素
        if (index === 0) {
          // 要素がウィンドウと重なり終わって上部に隠れたとき
          if (promiseImgBottom < windowTop + headerHeight) {
            $(".p-top-promise__item").eq(index).removeClass("is-active");
          } else {
            // 要素がウィンドウと重なる前、要素がウィンドウと重なっているとき
            $(".p-top-promise__item").eq(index).addClass("is-active");
          }
        }

        // 2番目の要素
        if (index === 1) {
          if (promiseImgTop > windowTop + headerHeight) {
            // 要素がウィンドウと重なる前
            $(".p-top-promise__item").eq(index).removeClass("is-active");
          } else if (promiseImgBottom < windowTop + headerHeight) {
            // 要素がウィンドウと重なり終わって上部に隠れたとき
            $(".p-top-promise__item").eq(index).removeClass("is-active");
          } else {
            // 要素がウィンドウと重なっているとき
            $(".p-top-promise__item").eq(index).addClass("is-active");
          }
        }

        // 3番目の要素
        if (index === 2) {
          if (promiseImgTop > windowTop + headerHeight) {
            // 要素がウィンドウと重なる前
            $(".p-top-promise__item").eq(index).removeClass("is-active");
          } else if (promiseImgBottom < windowTop + headerHeight) {
            // 要素がウィンドウと重なり終わって上部に隠れたとき
            $(".p-top-promise__item").eq(index).removeClass("is-active");
          } else {
            // 要素がウィンドウと重なっているとき
            $(".p-top-promise__item").eq(index).addClass("is-active");
          }
        }

        // 4番目の要素の特別扱い
        if (index === 3) {
          // 要素がウィンドウと重なっているとき、要素がウィンドウと重なり終わって上部に隠れたとき
          if (promiseImgTop <= windowTop + headerHeight) {
            $(".p-top-promise__item").eq(index).addClass("is-active");
          } else {
            // 要素がウィンドウと重なる前
            $(".p-top-promise__item").eq(index).removeClass("is-active");
          }
        }
      });
    }

    promise();

    // 料金プラン 箇所
    let $priceElement = $(".p-top-price__plans");
    let priceOffsetTop = $priceElement.offset().top;
    let windowHeight = $(window).outerHeight();
    let windowCenter = windowTop + windowHeight / 2;

    if (windowCenter > priceOffsetTop) {
      $priceElement.find(".p-top-price__plan").addClass("is-active");
    }
  });

  // 制作実績 箇所
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

  // よくある質問箇所
  $(".p-top-faq__list").on("click", function () {
    $(this).toggleClass("is-open");
  });
});
