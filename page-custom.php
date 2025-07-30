<?php
if (!defined('ABSPATH')) {
  exit;
}

/*
*
*Template Name: カスタムページ
*
*/
?>

<?php get_header(); ?>

<div class="l-content">
  <div class="l-content__inner">
    <main class="l-mainContent">
      <?php the_content(); ?>

      <?php get_template_part('template-parts/fixcta'); ?>
    </main>
  </div>
</div>

<?php get_footer(); ?>



