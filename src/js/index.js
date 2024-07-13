// jQuery読み込み
import $ from 'jquery';

$(document).ready(function () {
  // ウィンドウがスクロールされるたびに実行される関数
  $(window).on('scroll', function () {
    $('.js-promise__img').each(function(index) {
      // 画像の位置を取得
      var imgTop = $(this).offset().top;
      var imgBottom = imgTop + $(this).outerHeight();
      // ウィンドウのスクロール位置を取得
      var windowTop = $(window).scrollTop();
      var windowBottom = windowTop + $(window).height();

      // 1番目の要素の特別扱い
      if (index === 0) {
        if (imgBottom <= windowTop) {
          $('.p-promise__item').eq(index).removeClass('is-active');
        } else {
          $('.p-promise__item').eq(index).addClass('is-active');
        }
      }
      // 3番目の要素の特別扱い
      else if (index === 3) {
        if (imgTop <= windowTop) {
          $('.p-promise__item').eq(index).addClass('is-active');
        } else {
          $('.p-promise__item').eq(index).removeClass('is-active');
        }
      }
      // 他の要素の通常の条件
      else {
        // 画像がウィンドウの表示範囲内にあるかどうかを確認
        if (imgTop <= windowTop && imgBottom >= windowTop) {
          $('.p-promise__item').eq(index).addClass('is-active');
        } else {
          $('.p-promise__item').eq(index).removeClass('is-active');
        }
      }
    });
  });
});
