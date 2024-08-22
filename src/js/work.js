import $ from 'jquery';

$(function() {
  const header = document.querySelector('.l-header');

  function workCheckVisibility() {
    let $photoElement = $('.p-single-work-client__siteImg');
    let windowTop = $(window).scrollTop();
    let windowBottom = windowTop + $(window).height();

    $photoElement.each(function() {
      let elementTop = $(this).offset().top;

      if (elementTop < windowBottom) {
        $(this).addClass('is-show');
      }
    });
  }

  // ページロード時に一度実行
  workCheckVisibility();

  // スクロール時に処理を実行
  $(window).on('scroll', function() {
    workCheckVisibility();
  });
});