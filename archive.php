<?php
if (!defined('ABSPATH')) {
  exit;
}
get_header(); ?>

<div class="l-content">
  <div class="c-pageHeader"
    <?php
    // カテゴリーやタグのIDを取得
    $term_id = get_queried_object_id();

    // カスタムフィールド 'term_thumbnail' から画像URLを取得
    $background_image_url = get_term_meta($term_id, 'term_thumbnail', true);

    // 画像URLがある場合のみインラインスタイルを設定
    if ($background_image_url): ?>
    style="background-image: url('<?php echo esc_url($background_image_url); ?>');"
    <?php else: ?>
    style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/dist/img/column.jpg'); ?>');"
    <?php endif; ?>>

    <div class="l-container">
      <span class="c-pageHeader__subTitle"><?php _e('お役立ちコラム', 'e-valueworks'); ?></span>
      <h1 class="c-pageHeader__title">
        <?php
        $term = get_queried_object();
        echo esc_html($term->name);
        ?>
      </h1>
    </div>
  </div>
  <div class="l-container">
    <div class="l-content__inner">
      <main class="l-mainContent">
        <?php get_template_part('template-parts/postlist'); ?>
        <?php get_template_part('template-parts/pagination'); ?>


      </main>
      <?php get_sidebar(); ?>

    </div>
  </div>
</div>

<?php get_footer(); ?>