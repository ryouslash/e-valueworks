<?php
function filter_work_posts()
{
  // Nonceの検証
  if (!isset($_GET['nonce']) || !wp_verify_nonce($_GET['nonce'], 'my_ajax_nonce')) {
    die('Permission denied');
  }

  // ページ番号
  $paged = isset($_GET['page']) ? intval($_GET['page']) : 1; //ページ番号はAJAXからWordPressメインクエリ$pagedと同じ値を送信
  $tax_type01 = 'scale'; // タクソノミー【scale】
  $tax_type02 = 'price'; // タクソノミー【price】
  $tax_type03 = 'language'; // タクソノミー【language】
  $tax_type04 = 'specification'; // タクソノミー【specification】

  $args = [
    'post_type' => 'work',
    'post_status' => 'publish',
    // archive-work.phpと数値を合わせる必要あり
    'posts_per_page' => 10,
    'paged' => $paged,
  ];

  $tax_query = [];

  // 各タクソノミー名
  $taxonomies = [$tax_type01, $tax_type02, $tax_type03, $tax_type04];

  foreach ($taxonomies as $tax) {
    if (!empty($_GET[$tax]) && is_array($_GET[$tax])) {
      // 配列の各要素に対して指定された関数
      $terms = array_map('sanitize_text_field', $_GET[$tax]);

      $tax_query[] = [
        'taxonomy' => $tax,
        'terms' => $terms,
        'include_children' => true,
        'field' => 'slug',
        // ターム間はOR検索
        'operator' => 'IN',
      ];
    }
  }

  if (!empty($tax_query)) {
    $args['tax_query'] = array_merge(['relation' => 'AND'], $tax_query);
  }

  // 投稿取得
  $query = new WP_Query($args);

  // 投稿がある場合の処理
  if ($query->have_posts()) : ?>
    <ul class="p-archive-work__items">
      <?php while ($query->have_posts()): $query->the_post(); ?>
        <li class="p-archive-work__item">
          <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()): ?>
              <?php the_post_thumbnail(); ?>
            <?php endif; ?>
            <?php
            $terms = get_the_terms(get_the_ID(), 'industry');
            if ($terms && !is_wp_error($terms)) : ?>
              <div class="p-archive-work__industry">
                <?php echo esc_html($terms[0]->name); ?>
              </div>
            <?php endif; ?>
            <h2 class="p-archive-work__title">
              <?php the_title(); ?>
            </h2>
          </a>
        </li>
      <?php endwhile;
      wp_reset_postdata(); ?>
    </ul>
  <?php else : ?>
    <div class="p-archive-work__noItem">
      <p>該当の実績はありません。</p>
    </div>
<?php endif;

  wp_die(); // AJAX終了
}

add_action('wp_ajax_filter_work_posts', 'filter_work_posts');
add_action('wp_ajax_nopriv_filter_work_posts', 'filter_work_posts');
