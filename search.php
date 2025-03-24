<?php get_header(); ?>

<div class="l-content t-search">
  <div class="c-pageHeader">
    <div class="l-container">
      <span class="c-pageHeader__subTitle">お役立ちコラム</span>
      <h1 class="c-pageHeader__title">
        検索ワード「<?php the_search_query(); ?>」
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