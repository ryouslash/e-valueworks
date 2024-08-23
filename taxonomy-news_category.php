<!DOCTYPE html>
<html lang="ja">

<head>
  <?php get_header(); ?>

</head>

<body>
  <?php get_template_part('template-parts/header1'); ?>

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
            <?php if (have_posts()): ?>
              <?php while (have_posts()) : the_post(); ?>
                <div class="p-single-news-title">
                  <?php
                  $terms = get_the_terms(get_the_ID(), 'news_category');
                  if ($terms):
                  ?>
                    <div class="c-title1"><?php echo esc_html($terms[0]->name); ?></div>
                    <div class="c-subTitle">
                      <?php
                      $slug = esc_html(($terms[0]->slug));
                      $formatted_slug = strtoupper(str_replace('-', ' ', $slug));
                      echo $formatted_slug;
                      ?>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </aside>
      </div>
    </div>
  </div>

  <?php get_footer(); ?>