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

      // 画像がウィンドウの上部に到達したかどうかを確認
      if (imgTop <= windowTop && imgBottom >= windowTop) {
        $('.p-promise__item').eq(index).addClass('is-active');
      } else {
        $('.p-promise__item').eq(index).removeClass('is-active');
      }
    });
    
  });
});