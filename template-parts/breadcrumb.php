<?php if (function_exists('bcn_display')): ?>
  <div class="c-breadcrumb">
    <div class="l-container">
      <div class="c-breadcrumb__inner">
        <?php
        // Breadcrumb NavXT の出力から |br| を削除するカスタム関数
        function custom_breadcrumb_navxt()
        {
          ob_start(); // 出力バッファリングを開始
          if (function_exists('bcn_display')) {
            bcn_display(); // Breadcrumb NavXT の出力をキャプチャ
          }
          $output = ob_get_clean(); // バッファの内容を取得してクリア
          $filtered_output = str_replace('|br|', '', $output); // |br| を削除
          echo $filtered_output; // フィルタリング後の出力を表示
        }
        // テーマの適切な場所で custom_breadcrumb_navxt() を使用
        custom_breadcrumb_navxt();
        ?>
      </div>
    </div>
  </div>
<?php endif; ?>