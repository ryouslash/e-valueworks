import $ from "jquery";

$(function () {
  initAjaxFormSubmit();
  initAjaxLoadMore();
});

/**
 * AJAX フィルターフォーム送信処理
 */
function initAjaxFormSubmit() {
  $(".js-ajax-form").on("submit", function (e) {
    e.preventDefault();
    // ページ情報をリセット
    let page = 1;
    const formData = $(this).serialize();

    $.ajax({
      url: my_ajax.url,
      type: "POST",
      data:
        formData +
        "&action=filter_work_posts&nonce=" +
        my_ajax.nonce +
        "&page=" +
        page,
    }).done(function (res) {
      $(".p-archive-work__result").html(res);
    });
  });
}

/**
 * AJAX 「もっと見る」処理
 */
function initAjaxLoadMore() {
  $(document).on("click", ".js-load-more button", function () {
    const $btn = $(this);
    let page = parseInt($btn.data("page"));
    page++;
    $btn.data("page", page);
    const max = parseInt($btn.data("max"));
    const formData = $(".js-ajax-form").serialize();

    $.ajax({
      url: my_ajax.url,
      type: "POST",
      data:
        formData +
        "&action=see_more_work&nonce=" +
        my_ajax.nonce +
        "&page=" +
        page,
    }).done(function (res) {
      $(".p-archive-work__items").append(res);

      if (page >= max) {
        $btn.closest(".js-load-more").remove();
      }
    });
  });
}
