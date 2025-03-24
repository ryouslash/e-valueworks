<?php
function render_googleAdsense()
{
  // 出力バッファリング開始
  ob_start();
?>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7743296555364692"
    crossorigin="anonymous"></script>
  <ins class="adsbygoogle"
    style="display:block; text-align:center;"
    data-ad-layout="in-article"
    data-ad-format="fluid"
    data-ad-client="ca-pub-7743296555364692"
    data-ad-slot="1081748858"></ins>
  <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
  </script>
<?php
  // バッファリングされた出力を取得して返す
  return ob_get_clean();
}
add_shortcode('ad', 'render_googleAdsense');
