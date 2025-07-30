<?php
if (!defined('ABSPATH')) {
  exit;
}
get_header(); ?>

<div class="l-content">

  <?php
  if (is_home() && has_post_thumbnail(get_option('page_for_posts'))): $thumbnail_url = get_the_post_thumbnail_url(get_option('page_for_posts')); ?>
    <div class="c-pageHeader" style="background-image: url('<?php echo esc_url($thumbnail_url); ?>');">
    <?php else : ?>
      <div class="c-pageHeader" style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/dist/img/column.jpg'); ?>');">
      <?php endif; ?>
      <div class="l-container">
        <h1 class="c-pageHeader__title"><?php __('お役立ちコラム', 'e-valueworks');  ?></h1>
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