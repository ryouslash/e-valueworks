<?php get_header(); ?>

<div class="l-content t-taxonomy-archive-news">
  <div class="l-container">
    <div class="l-content__inner">
      <main class="l-mainContent">

        <?php get_template_part('template-parts/postlist'); ?>
        <?php get_template_part('template-parts/pagination'); ?>

      </main>
      <aside class="l-sidebar">
        <!-- 1つまで -->
        <div class="p-single-news-title">
          <?php
          $queried_object = get_queried_object();

          if ($queried_object && is_tax('news_category')) {
            // タクソノミーネーム
            $taxonomy_name = esc_html($queried_object->name);
            echo '<h1 class="c-title1">' . $taxonomy_name . '</h1>';

            // タクソノミースラッグ（大文字でフォーマット）
            $taxonomy_slug = strtoupper(str_replace('-', ' ', esc_html($queried_object->slug)));
            echo '<div class="c-subTitle">' . $taxonomy_slug . '</div>';
          }
          ?>
        </div>
      </aside>
    </div>
  </div>
</div>

<?php get_footer(); ?>