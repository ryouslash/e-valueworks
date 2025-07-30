<?php
if (!defined('ABSPATH')) {
  exit;
}
get_header(); ?>

<div class="l-content">
  <div class="l-container">
    <div class="l-content__inner">
      <main class="l-mainContent">
        <div class="c-title1">
          <?php _e('お探しのページが見つかりませんでした。', 'e-valueworks');  ?>
        </div>
        <div class="p-404-error">
          <p class="p-404-error__text">
            <?php
            printf(
              __('申し訳ございませんが、<a href="%s">こちらのリンク</a>からトップページにお戻り下さい。', 'e-valueworks'),
              esc_url(home_url())
            );
            ?>
          </p>
        </div>
      </main>
    </div>
  </div>
</div>

<?php get_footer(); ?>