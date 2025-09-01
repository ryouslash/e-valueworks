<?php
if (!defined('ABSPATH')) {
  exit; // WordPressを通さずアクセスされた場合は終了
}; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-W6EKGG8W70"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-W6EKGG8W70');
  </script>
  <meta charset="UTF-8">
  <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <header class="l-header">
    <div class="l-header__inner">
      <div class="l-header__upContent">
        <div class="l-container">
          <div class="c-langSwitcher js-langSwitcher">
            <select>
              <option value="jp">&#x1f1ef;&#x1f1f5; 日本語</option>
              <option value="en">&#x1f1fa;&#x1f1f8; ENGLISH</option>
            </select>
          </div>
        </div>
      </div>
      <div class="l-header__downContent l-container">
        <?php if (is_front_page() || is_page('about') || is_404()): ?>
          <h1 class="l-header__logo">
            <a href="<?php echo esc_url(home_url()); ?>"><img src="/img/logo.svg" alt="E-VALUE WORKS" width="386" height="37" /></a>
          </h1>
        <?php else: ?>
          <div class="l-header__logo">
            <a href="<?php echo esc_url(home_url()); ?>"><img src="/img/logo.svg" alt="E-VALUE WORKS" width="386" height="37" /></a>
          </div>
        <?php endif; ?>
        <nav class="l-header__nav">
          <?php
          // メニューIDを取得する
          $menu_name = 'global_nav';
          $locations = get_nav_menu_locations();
          $menu = wp_get_nav_menu_object($locations[$menu_name]);
          $menu_items = wp_get_nav_menu_items($menu->term_id);
          ?>
          <?php if ($menu_items): ?>
            <ul class="p-gnav">
              <?php foreach ($menu_items as $item): ?>
                <li class="p-gnav__item">
                  <a href="<?php echo $item->url; ?>"><?php echo $item->title; ?><span><?php echo $item->description; ?></span></a>
                </li>
              <?php endforeach; ?>
              <?php if (is_front_page()): ?>
                <?php $locale = get_locale();
                if ('en_US' == $locale) { ?>
                  <li class="p-gnav__item">
                    <a href="#contact">
                      CONTACT<span>お問い合わせ</span>
                    </a>
                  </li>
                <?php } else { ?>
                  <li class="p-gnav__item">
                    <a href="#contact">
                      お問い合わせ<span>CONTACT</span>
                    </a>
                  </li>
                <?php } ?>
              <?php else: ?>
                <?php $locale = get_locale();
                if ('en_US' == $locale) { ?>
                  <li class="p-gnav__item">
                    <a href="<?php echo esc_url(home_url()); ?>#contact">
                      CONTACT<span>お問い合わせ</span>
                    </a>
                  </li>
                <?php } else { ?>
                  <li class="p-gnav__item">
                    <a href="<?php echo esc_url(home_url()); ?>#contact">
                      お問い合わせ<span>CONTACT</span>
                    </a>
                  </li>
                <?php } ?>
              <?php endif; ?>
            </ul>
          <?php endif; ?>
        </nav>
        <div class="l-header__drawerBtn">
          <i class="fa-solid fa-bars"></i>
          <i class="fa-solid fa-xmark"></i>
        </div>
      </div>
    </div>

    <div class="p-drawerMenu">
      <div class="l-container">
        <?php if ($menu_items): ?>
          <ul class="p-drawerMenu__items">
            <?php foreach ($menu_items as $item): ?>
              <li class="p-drawerMenu__item">
                <a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
                <span><?php echo $item->description; ?></span>
              </li>
            <?php endforeach; ?>
            <?php if (is_front_page()): ?>
              <?php $locale = get_locale();
              if ('en_US' == $locale) { ?>
                <li class="p-drawerMenu__item">
                  <a href="#contact">
                    CONTACT
                    <span>お問い合わせ</span>
                  </a>
                </li>
              <?php } else { ?>
                <li class="p-drawerMenu__item">
                  <a href="#contact">
                    お問い合わせ
                    <span>CONTACT</span>
                  </a>
                </li>
              <?php } ?>
            <?php else: ?>
              <?php $locale = get_locale();
              if ('en_US' == $locale) { ?>
                <li class="p-drawerMenu__item">
                  <a href="<?php echo esc_url(home_url()); ?>#contact">
                    CONTACT
                    <span>お問い合わせ</span>
                  </a>
                </li>
              <?php } else { ?>
                <li class="p-drawerMenu__item">
                  <a href="<?php echo esc_url(home_url()); ?>#contact">
                    お問い合わせ
                    <span>CONTACT</span>
                  </a>
                </li>
              <?php } ?>
            <?php endif; ?>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </header>