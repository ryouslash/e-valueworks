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
          <h1 class="c-title1"><?php echo mb_strtoupper(__('お知らせ', 'e-valueworks'), 'UTF-8'); ?></h1>
          <div class="c-subTitle">
            <?php
            $locale = get_locale();
            echo ($locale === 'ja') ? 'NEWS' : 'お知らせ';
            ?>
          </div>
        </div>
      </aside>
    </div>
  </div>
</div>

<?php get_footer(); ?>