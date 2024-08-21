import $ from 'jquery';
import { config, dom, library } from '@fortawesome/fontawesome-svg-core';
import {faPenNib, faCode, faServer ,faChevronDown, faLink, faChevronUp, faBars, faXmark, faCheck, faTag, faChevronLeft, faChevronRight, faSackDollar} from '@fortawesome/free-solid-svg-icons';
import { faEnvelope, faHandshake } from '@fortawesome/free-regular-svg-icons';
import {faInstagram, faFacebook, faGithub, faLinkedin} from '@fortawesome/free-brands-svg-icons';

// Font awesome 読み込み
library.add(faEnvelope, faHandshake, faPenNib, faCode, faServer,faChevronDown, faLink,faInstagram, faFacebook, faGithub, faLinkedin, faChevronUp, faBars, faXmark, faCheck, faTag, faChevronLeft, faChevronRight, faSackDollar);
dom.i2svg();

// 100vwの調整
function setVw() {
  // --vwをセットする関数
  let vw = $(window).width() / 100 + "px";
  // ブラウザ幅/100を取得し変数vwに格納
  $(":root").css("--vw", vw);
  // :rootのカスタムプロパティ--vwにvwを代入させる。これで、スクロールバーの幅を除いた画面幅/100が--vwになる
}

$(window).on("load resize", function () {
  setVw();
});
// 画面を、読み込んだ時・サイズを変えた時  →  関数setVwが動作する

// 初期ロード時にも関数を実行
setVw();

const header = document.querySelector('.l-header');
const headerHeight = header.offsetHeight; // 数値として保持

document.documentElement.style.setProperty('--headerHeight', headerHeight + 'px');

// ヘッダー箇所
document.addEventListener('DOMContentLoaded', function () {
  // .l-header__nav 要素を取得
  const drawerBtn = document.querySelector('.l-header__drawerBtn');
  const drawerMenu = document.querySelector('.p-drawerMenu');

  // クリックイベントのリスナーを追加
  drawerBtn.addEventListener('click', function () {
    // クラス名 'is-open' をトグルする
    drawerBtn.classList.toggle('is-open');
    drawerMenu.classList.toggle('is-show');
  });
});


// スムーススクロール
$(function () {
  if (location.hash) {
    var target = $(location.hash);
    if (target.length) {
      var position = target.offset().top - headerHeight;
      $("html, body").animate(
        {
          scrollTop: position,
        },
        0 // ページ読み込み時のスクロールは即時
      );
    }
  }
  
  $('a[href^="#"]').click(function (e) {
    e.preventDefault(); // デフォルトのアンカー動作を停止

    var speed = 2000;
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? "html" : href);
    var position = target.offset().top - headerHeight;

    $("html, body").animate(
      {
        scrollTop: position,
      },
      speed,
      "swing"
    );
  });
});

// ページトップボタンをスクロールしたところで表示
$(function () {
  var pageTop = $(".c-pageTop");

  $(window).scroll(function () {
    if ($(this).scrollTop() > 1000) {
      pageTop.addClass('is-show');
    } else {
      pageTop.removeClass('is-show');
    }
  });
});

// p-ficCta__leftをクリックすると、p-ficCtaにis-activeがつく
document.querySelector('.p-fixCta__left').addEventListener('click', function() {
  document.querySelector('.p-fixCta').classList.toggle('is-active');
});

document.querySelector('.p-fixCta__close').addEventListener('click', function() {
  const targetElement = document.querySelector('.p-fixCta');  
  targetElement.classList.remove('is-active');
});
