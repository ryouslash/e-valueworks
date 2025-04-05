import $ from "jquery";

$(function () {
  $(".js-ajax-form").on("submit", function (e) {
    e.preventDefault(); // 通常の送信を止める
    const formData = $(this).serialize(); // チェックボックスなどの値を取得

    $.ajax({
      url: my_ajax.url, // WordPressから渡されたAJAX用URL
      type: "GET",
      data: formData + "&action=filter_work_posts&nonce=" + my_ajax.nonce,
      success: function (res) {
        $(".p-archive-work__result").html(res); // 結果を表示
      },
    });
  });
});
