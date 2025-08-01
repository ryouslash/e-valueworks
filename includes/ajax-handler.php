<?php
if (!defined('ABSPATH')) {
  exit;
};

/*
**絞り込み結果表示用ハンドラ
*/
function filter_work_posts()
{
  // Nonceの検証
  if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'my_ajax_nonce')) {
    die('Permission denied');
  }

  // ページ番号
  $page = isset($_POST['page']) ? intval($_POST['page']) : 1; //ページ番号はAJAXから送信
  $lang = isset($_POST['lang']) ? sanitize_text_field($_POST['lang']) : 'ja';
  // en-US → en_USに変更
  if (strpos($lang, '-') !== false) {
    $lang = str_replace('-', '_', $lang);
  }

  $tax_type01 = 'scale'; // タクソノミー【scale】
  $tax_type02 = 'price'; // タクソノミー【price】
  $tax_type03 = 'language'; // タクソノミー【language】
  $tax_type04 = 'specification'; // タクソノミー【specification】

  $args = [
    'post_type' => 'work',
    'post_status' => 'publish',
    // archive-work.phpと数値を合わせる必要あり
    'posts_per_page' => 10,
    'paged' => $page,
    'suppress_filters' => false,
    'lang' => $lang
  ];

  $tax_query = [];

  // 各タクソノミー名
  $taxonomies = [$tax_type01, $tax_type02, $tax_type03, $tax_type04];

  foreach ($taxonomies as $tax) {
    if (!empty($_POST[$tax]) && is_array($_POST[$tax])) {
      // 配列の各要素に対して指定された関数
      $terms = array_map('sanitize_text_field', $_POST[$tax]);

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
  $new_query = new WP_Query($args);
  $total_pages = $new_query->max_num_pages;

  // 投稿がある場合の処理
  if ($new_query->have_posts()) : ?>
    <ul class="p-archive-work__items">

      <?php while ($new_query->have_posts()): $new_query->the_post(); ?>
        <li class="p-archive-work__item ">
          <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()): ?>
              <?php the_post_thumbnail(); ?>
            <?php endif; ?>
            <?php
            $terms = get_the_terms(get_the_ID(), 'industry');
            if ($terms && !is_wp_error($terms)) : ?>
              <div class="p-archive-work__industry">
                <?php
                $term = $terms[0];
                $term_name = $term->name;

                if ($lang === 'ja') {
                  $display_term = $term_name;
                } else {
                  // 翻訳ファイル読み込み（念のため）
                  Bogo_POMO::import($lang);

                  // 翻訳キー（例：industry:18）
                  $translation_key = $term->taxonomy . ':' . $term->term_id;

                  // Bogo独自の翻訳メソッドで取得
                  $display_term = Bogo_POMO::translate($translation_key, $term->taxonomy, $term_name);
                }

                echo esc_html($display_term);
                ?>
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

    <!-- 現在のページ情報は必ず1になる -->
    <?php if ($total_pages > 1) : ?>
      <div class="p-archive-work__more js-load-more">
        <button data-page="1" data-max="<?php echo esc_attr($total_pages); ?>">
          <?php
          switch_to_locale($lang);
          $load_more_text = __('もっと見る', 'e-valueworks');
          restore_previous_locale();
          ?>
          <?php echo esc_html($load_more_text); ?>
        </button>
      </div>
    <?php endif; ?>

  <?php else : ?>
    <div class="p-archive-work__noItem">
      <p>
        <?php
        switch_to_locale($lang);
        $load_more_text = __('実績がありません。', 'e-valueworks');
        restore_previous_locale();
        ?>
        <?php echo esc_html($load_more_text); ?>
      </p>
    </div>
  <?php endif;

  wp_die(); // AJAX終了
}
add_action('wp_ajax_filter_work_posts', 'filter_work_posts');
add_action('wp_ajax_nopriv_filter_work_posts', 'filter_work_posts');

/*
**もっと見るボタン用ハンドラ
*/
function see_more_work()
{
  // Nonceの検証
  if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'my_ajax_nonce')) {
    die('Permission denied');
  }

  // ページ番号
  $page = isset($_POST['page']) ? intval($_POST['page']) : 1; //ページ番号はAJAXから送信
  $lang = isset($_POST['lang']) ? sanitize_text_field($_POST['lang']) : 'ja';
  if (strpos($lang, '-') !== false) {
    $lang = str_replace('-', '_', $lang);
  }
  $tax_type01 = 'scale'; // タクソノミー【scale】
  $tax_type02 = 'price'; // タクソノミー【price】
  $tax_type03 = 'language'; // タクソノミー【language】
  $tax_type04 = 'specification'; // タクソノミー【specification】

  $args = [
    'post_type' => 'work',
    'post_status' => 'publish',
    // archive-work.phpと数値を合わせる必要あり
    'posts_per_page' => 10,
    'paged' => $page,
    'suppress_filters' => false,
    'lang' => $lang
  ];

  $tax_query = [];

  // 各タクソノミー名
  $taxonomies = [$tax_type01, $tax_type02, $tax_type03, $tax_type04];

  foreach ($taxonomies as $tax) {
    if (!empty($_POST[$tax]) && is_array($_POST[$tax])) {
      // 配列の各要素に対して指定された関数
      $terms = array_map('sanitize_text_field', $_POST[$tax]);

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
  $new_query = new WP_Query($args);

  // 投稿がある場合の処理
  if ($new_query->have_posts()) : ?>
    <?php while ($new_query->have_posts()): $new_query->the_post(); ?>
      <li class="p-archive-work__item">
        <a href="<?php the_permalink(); ?>">
          <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail(); ?>
          <?php endif; ?>
          <?php
          $terms = get_the_terms(get_the_ID(), 'industry');
          if ($terms && !is_wp_error($terms)) : ?>
            <div class="p-archive-work__industry">
              <?php
              $term = $terms[0];
              $term_name = $term->name;

              if ($lang === 'ja') {
                $display_term = $term_name;
              } else {
                // 翻訳ファイル読み込み（念のため）
                Bogo_POMO::import($lang);

                // 翻訳キー（例：industry:18）
                $translation_key = $term->taxonomy . ':' . $term->term_id;

                // Bogo独自の翻訳メソッドで取得
                $display_term = Bogo_POMO::translate($translation_key, $term->taxonomy, $term_name);
              }

              echo esc_html($display_term);
              ?>
            </div>
          <?php endif; ?>
          <h2 class="p-archive-work__title">
            <?php the_title(); ?>
          </h2>
        </a>
      </li>
    <?php endwhile;
    wp_reset_postdata(); ?>
<?php endif;

  wp_die(); // AJAX終了
}
add_action('wp_ajax_see_more_work', 'see_more_work');
add_action('wp_ajax_nopriv_see_more_work', 'see_more_work');
