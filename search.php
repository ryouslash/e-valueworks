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

        <?php
        $paged = get_query_var('paged') ?: get_query_var('page') ?: 1;
        $total_pages = $wp_query->max_num_pages;
        ?>

        <?php if ($total_pages > 1): ?>
          <div class="c-pagination">
            <!-- 検索結果ページ -->
            <?php
            echo paginate_links([
              'base'    => add_query_arg('paged', '%#%'),
              'format'  => '',
              'current' => max(1, $paged),
              'total'   => $total_pages,
              'mid_size' => 1,
              'prev_text' => '&lt;',
              'next_text' => '&gt;',
            ]);
            ?>
          </div>
        <?php endif; ?>
      </main>
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>