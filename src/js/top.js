import $ from 'jquery';
import 'slick-carousel/slick/slick.min.js';

const header = document.querySelector('.l-header');
const headerHeight = header.offsetHeight; // 数値として保持

// メインビジュアル箇所
const typing = (el, sentence) => {
  // 文字列を1文字ずつ取り出して処理を実行する
  [...sentence].forEach((char, index) => {
    // 0.1秒ごとに文字を出力する
    setTimeout(() => {
      if (char === '\n') {
        document.querySelector(el).innerHTML += '<br>';
      } else {
        document.querySelector(el).innerHTML += char; // innerHTMLを使用
      }
    }, 100 * index);
  });
}

// タイピングの開始を1秒遅らせる
setTimeout(() => {
  if (window.innerWidth <= 419) {
    // 画面幅が419px以下の場合の処理
    typing('.js-typing', '「早さ・正確さ・親身さ」\nが揃った\nコーディング代行事務所');
  } else {
    // 画面幅が419pxを超える場合の処理
    typing('.js-typing', '「早さ・正確さ・親身さ」が揃った\nコーディング代行事務所');
  }
}, 1000); // 1秒（1000ミリ秒）遅延させる


// メインビジュアルのテキスト、ボタン要素を取得
const mainVisualText = document.querySelector('.p-top-mainVisual__text');
const mainVisualButton = document.querySelector('.p-top-mainVisual__buttons');

setTimeout(() => {
  mainVisualText.classList.add('is-show');
}, 4300);

setTimeout(() => {
  mainVisualButton.classList.add('is-show');
}, 4800);

// お知らせ 箇所
$(document).ready(function() {
  let items = $('.p-top-news__item');
  console.log(items);
  let nextItem = 1;

  function showNextItem() {
    items.removeClass('is-slideIn');  // 全てのアイテムからクラスを削除
    items.eq(nextItem).addClass('is-slideIn');  // 現在のアイテムにクラスを追加

    nextItem = (nextItem + 1) % items.length;  // インデックスを更新（循環）
  }
  
  setInterval(showNextItem, 5000);  // 5秒ごとにshowNextItemを実行
});

// お悩みはこちら 箇所
$(document).ready(function() {
  // スクロールイベントを監視
  $(window).on('scroll', function() {
    // p-top-troubles要素を取得
    var $troublesElement = $('.p-top-troubles');

    // p-top-troubles要素の位置を取得
    var offsetTop = $troublesElement.offset().top;
    var windowTop = $(window).scrollTop();

    // p-top-troublesがウィンドウのトップに来たら
    if (windowTop > offsetTop - headerHeight) {
      // p-top-troubles__itemの子要素にis-fadeInクラスを追加
      $troublesElement.find('.p-top-troubles__item').each(function(index) {
        var $item = $(this);
        setTimeout(function() {
          $item.addClass('is-fadeIn');
        }, index * 200); // 0.3秒毎にクラスを追加
      });
    }
  });
});

// アバウト 箇所
$(document).ready(function() {
  // スクロールイベントを監視
  $(window).on('scroll', function() {
    var $aboutElement = $('.p-top-about');

    var offsetTop = $aboutElement.offset().top;
    var windowTop = $(window).scrollTop();

    if (windowTop > offsetTop - headerHeight) {
      $aboutElement.find('.p-top-about__items').addClass('is-active');
    }
  });
});

// 制作実績 箇所
$(document).ready(function(){
  $('.p-top-work__slider').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    responsive: [
      {
        breakpoint: 768, // 767px以下に適用するブレイクポイント
        settings: {
          slidesToShow: 1, // スライドを1つに設定
        }
      }
    ]
  });
});

// お客様への4つのお約束 箇所

function topPromise() {

    // 画面幅を取得
    var windowWidth = $(window).width();
  
    // 画面幅が1024px以下の場合、処理を中断
    if (windowWidth <= 1024) {
      return;
    }
  
  $('.p-top-promise__img').each(function(index) {
    // 画像の位置を取得
    var imgTop = $(this).offset().top;
    var imgBottom = imgTop + $(this).outerHeight();
    // ウィンドウのスクロール位置を取得
    var windowTop = $(window).scrollTop();
    var windowBottom = windowTop + $(window).height();

    // 1番目の要素
    if (index === 0) {
      // 要素がウィンドウと重なり終わって上部に隠れたとき（ここで背景色を変更）
      if (imgBottom < windowTop + headerHeight) {
        $('.p-top-promise__item').eq(index).removeClass('is-active');
   
      } else {
        // 要素がウィンドウと重なる前、要素がウィンドウと重なっているとき
        $('.p-top-promise__item').eq(index).addClass('is-active');
   
      }
    }

    // 2番目の要素
    if (index === 1) {
      if (imgTop > windowTop + headerHeight) {
        // 要素がウィンドウと重なる前
        $('.p-top-promise__item').eq(index).removeClass('is-active');
      } else if (imgBottom < windowTop + headerHeight) {
        // 要素がウィンドウと重なり終わって上部に隠れたとき（ここで背景色を変更）
        $('.p-top-promise__item').eq(index).removeClass('is-active');
      } else {
        // 要素がウィンドウと重なっているとき
        $('.p-top-promise__item').eq(index).addClass('is-active');
      }
    }

    // 3番目の要素
    if (index === 2) {
      if (imgTop > windowTop + headerHeight) {
        // 要素がウィンドウと重なる前
        $('.p-top-promise__item').eq(index).removeClass('is-active');
      } else if (imgBottom < windowTop + headerHeight) {
        // 要素がウィンドウと重なり終わって上部に隠れたとき（ここで背景色を変更）
        $('.p-top-promise__item').eq(index).removeClass('is-active');
      } else {
        // 要素がウィンドウと重なっているとき
        $('.p-top-promise__item').eq(index).addClass('is-active');
      }
    }

    // 4番目の要素の特別扱い
    if (index === 3) {
      // 要素がウィンドウと重なっているとき、要素がウィンドウと重なり終わって上部に隠れたとき
      if (imgTop <= windowTop + headerHeight) {
        $('.p-top-promise__item').eq(index).addClass('is-active');
      } else {
        // 要素がウィンドウと重なる前
        $('.p-top-promise__item').eq(index).removeClass('is-active');
      }
    }
  });
}

// ページロード時に実行
topPromise();

// スクロール時に実行
$(window).on('scroll', topPromise);

// 料金プラン
$(document).ready(function() {
  // スクロールイベントを監視
  $(window).on('scroll', function() {
    var $priceElement = $('.p-top-price__plans');

    var offsetTop = $priceElement.offset().top;
    var windowTop = $(window).scrollTop();
    var windowHeight = $(window).outerHeight();

    var windowCenter = windowTop + windowHeight / 2;

    // p-about__itemsがウィンドウの中央部に来たら
    if (windowCenter > offsetTop) {
      $priceElement.find('.p-top-price__plan').addClass('is-active');
    }
  });
});

// よくある質問箇所
$(document).ready(function() {
  $('.p-top-faq__list').on('click', function() {
    $(this).toggleClass('is-open');
  });
});
