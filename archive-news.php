<?php
if (!defined('ABSPATH')) {
  exit;
}
get_header(); ?>

<div class="l-content t-archive-news">
  <div class="l-container">
    <div class="l-content__inner">
      <main class="l-mainContent">

        <?php get_template_part('template-parts/postlist'); ?>
        <?php get_template_part('template-parts/pagination'); ?>

      </main>
      <aside class="l-sidebar">
        <!-- 1つまで -->
        <div class="p-single-news-title">
          <h1 class="c-title1">お知らせ</h1>
          <div class="c-subTitle">NEWS</div>
        </div>
      </aside>
    </div>
  </div>
</div>

<?php get_footer(); ?>