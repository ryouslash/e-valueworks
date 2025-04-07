import $ from "jquery";

/*
 **AJAX通信処理
 */
$(function () {
  // サブミットボタンが押された場合の処理
  $(".js-ajax-form").on("submit", function (e) {
    e.preventDefault(); // 通常の送信を止める
    // ページ情報をリセット
    let page = 1;
    const formData = $(this).serialize(); // チェックボックスなどの値を取得

    $.ajax({
      url: my_ajax.url, // WordPressから渡されたAJAX用URL
      type: "POST",
      data:
        formData +
        "&action=filter_work_posts&nonce=" +
        my_ajax.nonce +
        "&page=" +
        page,
    }).done(function (res) {
      $(".p-archive-work__result").html(res); // 結果を表示
    });
  });

  // もっと見るボタンが押された場合の処理
  $(document).on("click", ".js-load-more button", function () {
    const $btn = $(this);
    let page = parseInt($btn.data("page"));
    page++;
    $btn.data("page", page);
    const max = parseInt($btn.data("max"));
    const formData = $(".js-ajax-form").serialize(); // チェックボックスなどの値を取得

    $.ajax({
      url: my_ajax.url, // WordPressから渡されたAJAX用URL
      type: "POST",
      data:
        formData +
        "&action=see_more_work&nonce=" +
        my_ajax.nonce +
        "&page=" +
        page,
    }).done(function (res) {
      $(".p-archive-work__items").append(res); // 結果を表示

      if (page >= max) {
        $btn.closest(".js-load-more").remove();
      }
    });
  });
});
