<?php if (!defined('ABSPATH')) {
  exit;
}; ?>

<div class="p-fixCta">
  <div class="p-fixCta__inner">
    <div class="p-fixCta__left">お問い合わせ・ご相談</div>
    <div class="p-fixCta__right">
      <ul class="p-fixCta__naviItems">
        <li class="p-fixCta__naviItem p-fixCta__naviItem--price">
          <a href="<?php echo esc_url(home_url('price')); ?>"><i class="fa-solid fa-sack-dollar"></i>料金</a>
        </li>
        <li class="p-fixCta__naviItem p-fixCta__naviItem--form">
          <?php
          if (is_front_page()): ?>
            <a href="#contact"><i class="fa-regular fa-envelope"></i>メールで相談</a>
          <?php else: ?>
            <a href="<?php echo esc_url(home_url('#contact')); ?>"><i class="fa-regular fa-envelope"></i>メールで相談</a>
          <?php endif ?>
        </li>
        <li class="p-fixCta__naviItem p-fixCta__naviItem--chatwork">
          <a href="https://www.chatwork.com/ryouslash" target="_blank"><img
              src="/img/cw_logomark_color.svg" alt="Chatwork アイコン" width="150" height="150" loading="lazy" />Chatworkで相談</a>
        </li>
      </ul>
      <div class="p-fixCta__close">
        <i class="fa-solid fa-xmark"></i>
      </div>
    </div>
  </div>
</div>