<!DOCTYPE html>
<html lang="ja">

<head>
  <?php get_header(); ?>

</head>

<body>
  <?php get_template_part('template-parts/header1'); ?>

  <div class="l-content">
    <div class="l-container">
      <div class="l-content__inner">
        <main class="l-mainContent">
          <div class="c-title1">
            <span class="u-inline-block">お探しのページが</span><span class="u-inline-block">見つかりませんでした。</span>
          </div>
          <div class="p-404-error">
            <p class="p-404-error__text">
              申し訳ございませんが、<a href="<?php echo esc_url(home_url()); ?>">こちらのリンク</a>からトップページにお戻り下さい。
            </p>
          </div>
        </main>
      </div>
    </div>
  </div>

  <?php get_footer(); ?>