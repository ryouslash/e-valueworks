<!DOCTYPE html>
<html lang="ja">

<head>
  <?php get_header(); ?>
</head>

<body>
  <?php get_template_part('template-parts/header1'); ?>

  <div class="l-content t-archive">
    <div class="c-pageHeader">
      <div class="l-container">
        <span class="c-pageHeader__subTitle">お役立ちコラム</span>
        <div class="c-pageHeader__title">
          <?php wp_title(''); ?>
        </div>
      </div>
    </div>
    <div class="l-container">
      <div class="l-content__inner">
        <main class="l-mainContent">
          <?php get_template_part('template-parts/postlist'); ?>
          <?php get_template_part('template-parts/pagination'); ?>


        </main>
        <aside class="l-sidebar">
          <?php get_template_part('template-parts/sidebar/latest-posts'); ?>
          <?php get_template_part('template-parts/sidebar/category'); ?>
          <?php get_template_part('template-parts/sidebar/tag'); ?>
          <?php get_template_part('template-parts/sidebar/search'); ?>
        </aside>
      </div>
    </div>
  </div>

  <?php get_footer(); ?>