<?php get_header(); ?>

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
      <span class="c-pageHeader__subTitle">お役立ちコラム</span>
      <h1 class="c-pageHeader__title">
        <?php wp_title(''); ?>
      </h1>
    </div>
  </div>
  <div class="l-container">
    <div class="l-content__inner">
      <main class="l-mainContent">
        <?php get_template_part('template-parts/postlist'); ?>
        <?php get_template_part('template-parts/pagination'); ?>


      </main>
      <aside class="l-sidebar">
        <?php get_template_part('template-parts/sidebar/search'); ?>
        <?php get_template_part('template-parts/sidebar/latest-posts'); ?>
        <?php get_template_part('template-parts/sidebar/category'); ?>
        <?php get_template_part('template-parts/sidebar/tag'); ?>
      </aside>
    </div>
  </div>
</div>

<?php get_footer(); ?>