<?php
if (!defined('ABSPATH')) {
  exit;
};

$paged = get_query_var('paged') ?: get_query_var('page') ?: 1; // 現在のページ情報
$tax_type01 = 'scale'; // タクソノミー【scale】
$tax_type02 = 'price'; // タクソノミー【price】
$tax_type03 = 'language'; // タクソノミー【language】
$tax_type04 = 'specification'; // タクソノミー【specification】

// 初回読み込み時は通常のカスタム投稿10件を表示（絞り込み部分はAJAXハンドラーに切り分け）
$search_args = array(
  'post_type'      => 'work', //カスタム投稿
  'post_status'    => 'publish',
  // ajax-handler.php内2箇所、cutom-posts.php内1箇所と数値を合わせる必要あり
  'posts_per_page' => 10,
  'paged' => $paged
);

$tax_query = [];

//カスタムタクソノミー【 scale 】部分にあるチェックボックスの内容を取得
$param_page_terms = array();
if (! empty($_GET[$tax_type01])) {
  foreach ($_GET[$tax_type01] as $value) {
    $param_page_terms[] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
  }
}

//カスタムタクソノミー【 price 】部分にあるチェックボックスの内容を取得
$param_price_terms = array();
if (! empty($_GET[$tax_type02])) {
  foreach ($_GET[$tax_type02] as $value) {
    $param_price_terms[] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
  }
}

//カスタムタクソノミー【 language 】部分にあるチェックボックスの内容を取得
$param_language_terms = array();
if (! empty($_GET[$tax_type03])) {
  foreach ($_GET[$tax_type03] as $value) {
    $param_language_terms[] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
  }
}

//カスタムタクソノミー【 specification 】部分にあるチェックボックスの内容を取得
$param_specification_terms = array();
if (! empty($_GET[$tax_type04])) {
  foreach ($_GET[$tax_type04] as $value) {
    $param_specification_terms[] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
  }
}
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
              <form method="get" action="<?php echo esc_url(home_url('work')); ?>" class="js-ajax-form">
                <ul class="p-archive-work__searchItems">
                  <li class="p-archive-work__searchItem">
                    <dl>
                      <dt>ページ数</dt>
                      <dd>
                        <?php
                        $scale_terms = get_terms($tax_type01, array(
                          'hide_empty' => false,
                          'orderby' => 'description',
                          'order' => 'ASC'
                        ));

                        // descriptionに設定した数字で並べ替え
                        usort($scale_terms, function ($a, $b) {
                          // descriptionから数字を取得して比較
                          $a_description = (int) $a->description; // descriptionから数字を取得
                          $b_description = (int) $b->description; // descriptionから数字を取得
                          return $a_description - $b_description; // 数字順に並べる（昇順）
                        });

                        foreach ($scale_terms as $term) :
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

                        // descriptionに設定した数字で並べ替え
                        usort($price_terms, function ($a, $b) {
                          // descriptionから数字を取得して比較
                          $a_description = (int) $a->description; // descriptionから数字を取得
                          $b_description = (int) $b->description; // descriptionから数字を取得
                          return $a_description - $b_description; // 数字順に並べる（昇順）
                        });

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

                        // descriptionに設定した数字で並べ替え
                        usort($language_terms, function ($a, $b) {
                          // descriptionから数字を取得して比較
                          $a_description = (int) $a->description; // descriptionから数字を取得
                          $b_description = (int) $b->description; // descriptionから数字を取得
                          return $a_description - $b_description; // 数字順に並べる（昇順）
                        });

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

                        // descriptionに設定した数字で並べ替え
                        usort($specification_terms, function ($a, $b) {
                          // descriptionから数字を取得して比較
                          $a_description = (int) $a->description; // descriptionから数字を取得
                          $b_description = (int) $b->description; // descriptionから数字を取得
                          return $a_description - $b_description; // 数字順に並べる（昇順）
                        });


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
          $total_pages = $new_query->max_num_pages; ?>
          <div class="p-archive-work__result">
            <?php if ($new_query->have_posts()): ?>
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


              <?php if ($total_pages > $paged) : ?>
                <div class="p-archive-work__more js-load-more">
                  <button data-page="1" data-max="<?php echo esc_attr($new_query->max_num_pages); ?>">
                    もっと見る
                  </button>
                </div>
              <?php endif; ?>

            <?php else: ?>
              <div class="p-archive-work__noItem">
                <p>実績がありません。</p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </main>
    </div>
  </div>
</div>

<?php get_template_part('template-parts/fixcta'); ?>

<?php get_footer(); ?>