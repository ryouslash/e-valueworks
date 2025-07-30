<?php if (!defined('ABSPATH')) {
  exit;
}; ?>

<div class="p-fixCta">
  <div class="p-fixCta__inner">
    <div class="p-fixCta__left">
      <?php _e('お問い合わせ・ご相談', 'e-valueworks'); ?>
    </div>
    <div class="p-fixCta__right">
      <ul class="p-fixCta__naviItems">
        <li class="p-fixCta__naviItem p-fixCta__naviItem--price">
          <a href="<?php echo esc_url(home_url('price')); ?>"><i class="fa-solid fa-sack-dollar"></i>
            <?php _e('料金', 'e-valueworks'); ?>
          </a>
        </li>
        <li class="p-fixCta__naviItem p-fixCta__naviItem--form">
          <?php
          if (is_front_page()): ?>
            <a href="#contact"><i class="fa-regular fa-envelope"></i>
              <?php _e('メールで相談', 'e-valueworks'); ?>
            </a>
          <?php else: ?>
            <a href="<?php echo esc_url(home_url('#contact')); ?>"><i class="fa-regular fa-envelope"></i>
              <?php _e('メールで相談', 'e-valueworks'); ?>
            </a>
          <?php endif ?>
        </li>
        <?php $locale = get_locale();
        if ($locale == 'ja') { ?>
          <li class="p-fixCta__naviItem p-fixCta__naviItem--chatwork">
            <a href="https://www.chatwork.com/ryouslash" target="_blank"><img src="/img/cw_logomark_color.svg" alt="Chatwork アイコン" width="150" height="150" />
              Chatworkで相談
            </a>
          </li>
        <?php } else { ?>
          <li class="p-fixCta__naviItem p-fixCta__naviItem--linkedIn">
            <a href="https://www.linkedin.com/in/ryo-ikeda-48861a140/" target="_blank"><i class="fa-brands fa-linkedin"></i>
              <?php _e('LinkedInで相談', 'e-valueworks'); ?>
            </a>
          </li>
        <?php } ?>
      </ul>
      <div class="p-fixCta__close">
        <i class="fa-solid fa-xmark"></i>
      </div>
    </div>
  </div>
</div>