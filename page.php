<!DOCTYPE html>
<html lang="ja">

<head>
  <?php get_header(); ?>
</head>

<body>
  <?php get_template_part('template-parts/header2'); ?>

  <div class="l-content">
    <div class="l-container">
      <div class="l-content__inner">
        <main class="l-mainContent">
          <?php if (have_posts()): ?>
            <?php while (have_posts()) : the_post(); ?>
              <h1 class="c-title1"><?php the_title(); ?></h1>
              <div class="p-editorContent -page-template-default">
                <?php the_content(); ?>
              </div>
        </main>
      <?php endwhile; ?>
    <?php endif; ?>
    <!-- サイドバーなし -->
      </div>
    </div>
  </div>

  <?php get_footer(); ?>