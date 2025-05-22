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
          <?php $locale = get_locale();
          if ('en_US' == $locale) { ?>
            The page you are looking for could not be found.
          <?php } else { ?>
            <span class="u-inline-block">お探しのページが</span><span class="u-inline-block">見つかりませんでした。</span>
          <?php } ?>
        </div>
        <div class="p-404-error">
          <p class="p-404-error__text">
            <?php $locale = get_locale();
            if ('en_US' == $locale) { ?>
              We’re sorry, but please return to the <a href="<?php echo esc_url(home_url()); ?>">Toppage</a> using this link.
            <?php } else { ?>
              申し訳ございませんが、<a href="<?php echo esc_url(home_url()); ?>">こちらのリンク</a>からトップページにお戻り下さい。
            <?php } ?>
          </p>
        </div>
      </main>
    </div>
  </div>
</div>

<?php get_footer(); ?>