<?php
$c_post     = 'work'; // カスタム投稿【work】
$paged = get_query_var('paged') ?: get_query_var('page') ?: 1; // 現在のページ情報
$tax_type01 = 'page'; // タクソノミー【page】
$tax_type02 = 'price'; // タクソノミー【price】
$tax_type03 = 'language'; // タクソノミー【language】
$tax_type04 = 'specification'; // タクソノミー【specification】

$search_args = array(
  'post_type'      => $c_post, //カスタム投稿
  'post_status'    => 'publish',
  // includes>custom-posts.phpのmodify_work_archive_query($query)の中のposts_per_pageと数値を合わせる必要あり
  'posts_per_page' => 1,
  'paged' => $paged
);

$tax_query_args = [];

//カスタムタクソノミー【 page 】部分にあるチェックボックスの内容を取得
$param_page_terms = array();
if (! empty($_GET[$tax_type01])) {
  foreach ($_GET[$tax_type01] as $value) {
    $param_page_terms[] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
  }
  $tax_query_args[] = array(
    'taxonomy'         => $tax_type01,
    'terms'            => $param_page_terms,
    'include_children' => true,
    'field'            => 'slug',
    'operator'         => 'IN',
  );
}

//カスタムタクソノミー【 price 】部分にあるチェックボックスの内容を取得
$param_price_terms = array();
if (! empty($_GET[$tax_type02])) {
  foreach ($_GET[$tax_type02] as $value) {
    $param_price_terms[] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
  }
  $tax_query_args[] = array(
    'taxonomy'         => $tax_type02,
    'terms'            => $param_price_terms,
    'include_children' => true,
    'field'            => 'slug',
    'operator'         => 'IN',
  );
}


//カスタムタクソノミー【 language 】部分にあるチェックボックスの内容を取得
$param_language_terms = array();
if (! empty($_GET[$tax_type03])) {
  foreach ($_GET[$tax_type03] as $value) {
    $param_language_terms[] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
  }
  $tax_query_args[] = array(
    'taxonomy'         => $tax_type03,
    'terms'            => $param_language_terms,
    'include_children' => true,
    'field'            => 'slug',
    'operator'         => 'IN',
  );
}

//カスタムタクソノミー【 specification 】部分にあるチェックボックスの内容を取得
$param_specification_terms = array();
if (! empty($_GET[$tax_type04])) {
  foreach ($_GET[$tax_type04] as $value) {
    $param_specification_terms[] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
  }
  $tax_query_args[] = array(
    'taxonomy'         => $tax_type04,
    'terms'            => $param_specification_terms,
    'include_children' => true,
    'field'            => 'slug',
    'operator'         => 'IN',
  );
}


//カスタムタクソノミーそれぞれの情報をセットする
if (! empty($_GET[$tax_type01]) || ! empty($_GET[$tax_type02]) || ! empty($_GET[$tax_type03]) || ! empty($_GET[$tax_type04])) {
  $search_args['tax_query'] = array_merge(
    array('relation' => 'AND'),
    $tax_query_args
  );
};
?>

<?php get_header(); ?>


<div class="l-content">
  <div class="l-container">
    <div class="l-content__inner">
      <main class="l-mainContent">
        <h1 class="c-title1">制作実績</h1>

        <div class="p-archive-work">
          <div class="p-archive-work__search">
            <div class="p-archive-work__searchTitle"><i class="fa-solid fa-magnifying-glass"></i>絞り込み検索</div>
            <div class="p-archive-work__searchArea">
              <form method="get" action="<?php echo esc_url(home_url('work')); ?>">
                <ul class="p-archive-work__searchItems">
                  <li class="p-archive-work__searchItem">
                    <dl>
                      <dt>ページ数</dt>
                      <dd>
                        <?php
                        $page_terms = get_terms($tax_type01, array(
                          'hide_empty' => false,
                          'orderby' => 'term_id',  // 明示的にID順に並べる
                          'order' => 'ASC'         // 昇順で並べる（降順の場合は 'DESC'）
                        ));

                        foreach ($page_terms as $term) :
                          $checked = '';
                          if (in_array($term->slug, $param_page_terms, true)) {
                            $checked = 'checked';
                          }
                        ?>
                          <input type="checkbox" id="<?php echo esc_attr($term->slug); ?>" name="<?php echo $tax_type01; ?>[]" value="<?php echo esc_attr($term->slug); ?>" <?php echo $checked; ?>>
                          <label class="checkbox" for="<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></label>
                        <?php endforeach; ?>
                      </dd>
                    </dl>
                  </li>
                  <li class="p-archive-work__searchItem">
                    <dl>
                      <dt>価格帯</dt>
                      <dd>
                        <?php
                        $price_terms = get_terms($tax_type02, array(
                          'hide_empty' => false,
                          'orderby' => 'term_id',  // ID順で並べる
                          'order' => 'ASC'         // 昇順で並べる（降順にしたい場合は 'DESC' に変更）
                        ));

                        foreach ($price_terms as $term) :
                          $checked = '';
                          if (in_array($term->slug, $param_price_terms, true)) {
                            $checked = 'checked';
                          }
                        ?>
                          <input type="checkbox" id="<?php echo esc_attr($term->slug); ?>" name="<?php echo $tax_type02; ?>[]" value="<?php echo esc_attr($term->slug); ?>" <?php echo $checked; ?>>
                          <label class="checkbox" for="<?php echo esc_attr($term->slug); ?>">
                            <?php echo esc_html($term->name); ?>
                          </label>
                        <?php endforeach; ?>

                      </dd>
                    </dl>
                  </li>
                  <li class="p-archive-work__searchItem">
                    <dl>
                      <dt>使用言語・ツール</dt>
                      <dd>
                        <?php
                        $language_terms = get_terms($tax_type03, array(
                          'hide_empty' => false,
                          'orderby' => 'term_id',  // ID順で並べる
                          'order' => 'ASC'         // 昇順で並べる（降順にしたい場合は 'DESC' に変更）
                        ));

                        foreach ($language_terms as $term) :
                          $checked = '';
                          if (in_array($term->slug, $param_language_terms, true)) {
                            $checked = 'checked';
                          }
                        ?>
                          <input type="checkbox" id="<?php echo esc_attr($term->slug); ?>" name="<?php echo $tax_type03; ?>[]" value="<?php echo esc_attr($term->slug); ?>" <?php echo $checked; ?>>
                          <label class="checkbox" for="<?php echo esc_attr($term->slug); ?>">
                            <?php echo esc_html($term->name); ?>
                          </label>
                        <?php endforeach; ?>

                      </dd>
                    </dl>
                  </li>
                  <li class="p-archive-work__searchItem">
                    <dl>
                      <dt>サイト仕様</dt>
                      <dd>
                        <?php
                        $specification_terms = get_terms($tax_type04, array(
                          'hide_empty' => false,
                          'orderby' => 'term_id',  // ID順で並べる
                          'order' => 'ASC'         // 昇順に並べる（降順の場合は 'DESC'）
                        ));

                        foreach ($specification_terms as $term) :
                          $checked = '';
                          if (in_array($term->slug, $param_specification_terms, true)) {
                            $checked = 'checked';
                          }
                        ?>
                          <input type="checkbox" id="<?php echo esc_attr($term->slug); ?>" name="<?php echo $tax_type04; ?>[]" value="<?php echo esc_attr($term->slug); ?>" <?php echo $checked; ?>>
                          <label class="checkbox" for="<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></label>
                        <?php endforeach; ?>

                      </dd>
                    </dl>
                  </li>
                </ul>
                <div class="p-archive-work__searchBtns">
                  <input type="submit" value="絞り込む">
                </div>
              </form>
            </div>
          </div>

          <?php
          $new_query = new WP_Query($search_args);
          $total_pages = $new_query->max_num_pages;


          if ($new_query->have_posts()): ?>
            <ul class="p-archive-work__items">
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

            <?php if ($total_pages > 1): ?>
              <div class="c-pagination">
                <!-- 制作実績一覧ページ -->
                <?php
                $base_url = get_pagenum_link(1);
                // ?以降を削除してベースパスだけ取り出す
                $base_url = strtok($base_url, '?');

                echo paginate_links([
                  'base' => trailingslashit($base_url) . 'page/%#%/',
                  'format' => '',
                  'current' => max(1, $paged),
                  'total'   => $total_pages,
                  'mid_size' => 1,
                  'prev_text' => '&lt;',
                  'next_text' => '&gt;',
                  'add_args' => $_GET,
                ]);
                ?>
              </div>
            <?php endif; ?>

          <?php else: ?>
            <div class="p-archive-work__noItem">
              <p>実績がありません。</p>
            </div>
          <?php endif; ?>
        </div>
      </main>
    </div>
  </div>
</div>

<?php get_template_part('template-parts/fixcta'); ?>

<?php get_footer(); ?>