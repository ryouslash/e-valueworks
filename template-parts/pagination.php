<?php
$total_pages = $wp_query->max_num_pages;
?>
<?php if ($total_pages > 1): ?>
  <div class="c-pagination">
    <!-- 投稿一覧、カテゴリー一覧、タグ一覧ページ、お知らせ一覧、お知らせタクソノミー一覧 -->
    <?php
    the_posts_pagination([
      'mid_size' => 1,
      'prev_text' => '&lt;',
      'next_text' => '&gt;',
      'screen_reader_text' => ' ',
    ]);
    ?>
  </div>
<?php endif; ?>