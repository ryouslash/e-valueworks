import $ from 'jquery';

const header = document.querySelector('.l-header');
const headerHeight = header.offsetHeight; // 数値として保持

$(document).ready(function() {
  function workCheckVisibility() {
    var $photoElement = $('.p-single-work__photo');
    var windowTop = $(window).scrollTop();
    var windowBottom = windowTop + $(window).height();

    $photoElement.each(function() {
      var elementTop = $(this).offset().top;
      var elementBottom = elementTop + $(this).outerHeight();

      if (elementTop < windowBottom) {
        $(this).addClass('is-show');
      }
    });
  }

  // スクロールとリサイズ時に処理を実行
  $(window).on('scroll resize', function() {
    workCheckVisibility();
  });

  // ページロード時に一度実行
  workCheckVisibility();
});