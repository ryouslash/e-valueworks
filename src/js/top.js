import $ from 'jquery';
import 'slick-carousel/slick/slick.min.js';

const header = document.querySelector('header');
const headerHeight = header.offsetHeight; // 数値として保持

document.documentElement.style.setProperty('--headerHeight', headerHeight + 'px');

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
  typing('.js-typing', '「早さ・正確さ・親身さ」が揃った\nコーディング代行事務所');
}, 1000); // 1秒（1000ミリ秒）遅延させる

// メインビジュアルのテキスト、ボタン要素を取得
const mainText = document.querySelector('.p-mainVisual__text');
const mainButton = document.querySelector('.p-mainVisual__button');

setTimeout(() => {
  mainText.classList.add('is-show');
}, 4300);

setTimeout(() => {
  mainButton.classList.add('is-show');
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
  
  setInterval(showNextItem, 8000);  // 8秒ごとにshowNextItemを実行
});

// お悩みはこちら 箇所
$(document).ready(function() {
  // スクロールイベントを監視
  $(window).on('scroll', function() {
    // p-troubles要素を取得
    var $troublesElement = $('.p-troubles');

    // p-troubles要素の位置を取得
    var offsetTop = $troublesElement.offset().top;
    var windowTop = $(window).scrollTop();

    // p-troublesがウィンドウのトップに来たら
    if (windowTop > offsetTop - headerHeight) {
      // p-troubles__itemの子要素にis-fadeInクラスを追加
      $troublesElement.find('.p-troubles__item').each(function(index) {
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
    // p-about__items要素を取得
    var $profileElement = $('.p-about__items');

    // p-about__items要素の位置を取得
    var offsetTop = $profileElement.offset().top;
    var elementHeight = $profileElement.outerHeight();
    var windowTop = $(window).scrollTop();
    var windowHeight = $(window).height();

    // ウィンドウの中央位置を計算
    var windowCenter = windowTop + (windowHeight / 2);
    console.log(windowCenter);

    // p-about__itemsの中央位置を計算
    var elementCenter = offsetTop + (elementHeight / 2);
    console.log(elementCenter);

    // p-about__itemsがウィンドウの中央部に来たら
    if (windowCenter > elementCenter) {
      $profileElement.addClass('is-active');
    }
  });
});

// 制作実績 箇所
$(document).ready(function(){
  $('.p-experience__slider').slick({
    // オプションをここに設定
    autoplay: true,
    autoplaySpeed: 3000,
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
  });
});

// お客様への4つのお約束 箇所
function promise() {
  $('.js-promise__img').each(function(index) {
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
        $('.p-promise__item').eq(index).removeClass('is-active');
        // $('.p-promise').addClass('is-bg2');
        // $('.p-promise').removeClass('is-bg1');
      } else {
        // 要素がウィンドウと重なる前、要素がウィンドウと重なっているとき
        $('.p-promise__item').eq(index).addClass('is-active');
        // $('.p-promise').addClass('is-bg1');
        // $('.p-promise').removeClass('is-bg2');
      }
    }

    // 2番目の要素
    if (index === 1) {
      if (imgTop > windowTop + headerHeight) {
        // 要素がウィンドウと重なる前
        $('.p-promise__item').eq(index).removeClass('is-active');
      } else if (imgBottom < windowTop + headerHeight) {
        // 要素がウィンドウと重なり終わって上部に隠れたとき（ここで背景色を変更）
        $('.p-promise__item').eq(index).removeClass('is-active');
        // $('.p-promise').addClass('is-bg3').removeClass('is-bg2');
      } else {
        // 要素がウィンドウと重なっているとき
        $('.p-promise__item').eq(index).addClass('is-active');
        // $('.p-promise').removeClass('is-bg3');
      }
    }

    // 3番目の要素
    if (index === 2) {
      if (imgTop > windowTop + headerHeight) {
        // 要素がウィンドウと重なる前
        $('.p-promise__item').eq(index).removeClass('is-active');
      } else if (imgBottom < windowTop + headerHeight) {
        // 要素がウィンドウと重なり終わって上部に隠れたとき（ここで背景色を変更）
        $('.p-promise__item').eq(index).removeClass('is-active');
        // $('.p-promise').addClass('is-bg4').removeClass('is-bg3');
      } else {
        // 要素がウィンドウと重なっているとき
        $('.p-promise__item').eq(index).addClass('is-active');
        // $('.p-promise').removeClass('is-bg4');
      }
    }

    // 4番目の要素の特別扱い
    if (index === 3) {
      // 要素がウィンドウと重なっているとき、要素がウィンドウと重なり終わって上部に隠れたとき
      if (imgTop <= windowTop + headerHeight) {
        $('.p-promise__item').eq(index).addClass('is-active');
      } else {
        // 要素がウィンドウと重なる前
        $('.p-promise__item').eq(index).removeClass('is-active');
      }
    }
  });
}

// ページロード時に実行
promise();

// スクロール時に実行
$(window).on('scroll', promise);


$(document).ready(function() {
  $('.p-faq__list').on('click', function() {
    $(this).toggleClass('is-open');
  });
});

