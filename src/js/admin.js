jQuery(function($) {
  $('.term-thumbnail-upload').on('click', function(e) {
    e.preventDefault(); // デフォルトの動作を防ぐ
    let button = $(this);
    let custom_uploader = wp.media({
      title: '画像を選択',
      button: {
        text: 'この画像を使用'
      },
      multiple: false
    }).on('select', function() {
      let attachment = custom_uploader.state().get('selection').first().toJSON();
      button.prev('input').val(attachment.url);
    }).open();
  });
});
