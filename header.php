<?php
if (!defined('ABSPATH')) {
  exit; // WordPressを通さずアクセスされた場合は終了
}; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- meta description -->
  <?php if (is_front_page()): ?>
    <?php $locale = get_locale();
    if ('en_US' == $locale) { ?>
      <meta name="description" content="Coding that transforms experience through the power of UX.We offer flexible solutions to meet diverse needs, whether it's cost-effective, high-quality coding for individual projects or monthly contracts for site maintenance and updates.">
    <?php } else { ?>
      <meta name="description" content="魅せ方ひとつで、体験が変わる UXをデザインするコーディング。低価格・高品質なコーディングを案件単位で依頼したい方、ちょっとした改修作業を月額契約で外注したい方など様々なニーズにお応えします。">
    <?php } ?>
  <?php endif; ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <header class="l-header">
    <div class="l-header__inner l-container">
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