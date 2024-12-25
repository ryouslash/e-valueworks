<?php get_header(); ?>

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
          <?php endwhile; ?>
        <?php endif; ?>
      </main>
      <!-- サイドバーなし -->
    </div>
  </div>
</div>

<?php get_footer(); ?>