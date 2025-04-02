<?php
$paged = get_query_var('paged') ?: get_query_var('page') ?: 1;
$total_pages = $wp_query->max_num_pages;
?>

<?php if ($total_pages > 1): ?>
  <div class="c-pagination">
    <!-- 検索結果ページ -->
    <?php if (is_search()) : ?>
      <?php
      echo paginate_links([
        'base'    => add_query_arg('paged', '%#%'),
        'format'  => '',
        'current' => max(1, $paged),
        'total'   => $total_pages,
        'add_args' => ['s' => get_search_query()],
        'mid_size' => 1,
        'prev_text' => '&lt;&lt;前へ',
        'next_text' => '次へ&gt;&gt;',
      ]);
      ?>
      <!-- 投稿一覧、カテゴリー一覧、タグ一覧ページ -->
    <?php else : ?>
      <?php
      the_posts_pagination([
        'mid_size' => 1,
        'prev_text' => '&lt;&lt;前へ',
        'next_text' => '次へ&gt;&gt;',
        'screen_reader_text' => ' ',
      ]);
      ?>
    <?php endif; ?>
  </div>
<?php endif; ?>