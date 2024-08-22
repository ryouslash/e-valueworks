<?php
/*
*
*Template Name: テンプレート2
*
*/
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <?php get_header(); ?>

</head>

<body>
  <?php get_template_part('template-parts/header2'); ?>

  <?php if (have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="l-content">
        <div
          class="c-pageHeader"
          <?php if (has_post_thumbnail()): ?>
          style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url()); ?>')"
          <?php endif; ?>>
          <div class="l-container">
            <h1 class="c-pageHeader__title"><?php the_title(); ?></h1>
          </div>
        </div>
        <div class="l-container">
          <div class="l-content__inner">
            <main class="l-mainContent">
              <div class="p-editorContent -page-template2">
                <?php the_content(); ?>
              </div>

            </main>
            <!-- サイドバーなし -->
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>

  <footer class="l-footer">
    <div class="l-container">
      <div class="l-footer__inner">
        <nav class="l-footer__navi">
          <ul class="l-footer__navi-items">
            <li class="l-footer__navi-item">
              <a href="#">プライバシーポリシー</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="l-footer__copyright">
      <small>&copy; E-VALUE WORKS.</small>
    </div>
  </footer>
  <a class="c-pageTop js-pageTop" href="#">
    <i class="fa-solid fa-chevron-up"></i>
  </a>
  <script src="dist/js/vendors.js"></script>
  <script src="dist/js/common.js"></script>
</body>

</html>