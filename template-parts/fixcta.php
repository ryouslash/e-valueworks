<?php if (!defined('ABSPATH')) {
  exit;
}; ?>

<div class="p-fixCta">
  <div class="p-fixCta__inner">
    <div class="p-fixCta__left">
      <?php $locale = get_locale();
      if ('en_US' == $locale) { ?>
        Contact Us & Consultation
      <?php } else { ?>
        お問い合わせ・ご相談
      <?php } ?>
    </div>
    <div class="p-fixCta__right">
      <ul class="p-fixCta__naviItems">
        <li class="p-fixCta__naviItem p-fixCta__naviItem--price">
          <a href="<?php echo esc_url(home_url('price')); ?>"><i class="fa-solid fa-sack-dollar"></i>
            <?php $locale = get_locale();
            if ('en_US' == $locale) { ?>
              Price
            <?php } else { ?>
              料金
            <?php } ?>
          </a>
        </li>
        <li class="p-fixCta__naviItem p-fixCta__naviItem--form">
          <?php
          if (is_front_page()): ?>
            <a href="#contact"><i class="fa-regular fa-envelope"></i>
              <?php $locale = get_locale();
              if ('en_US' == $locale) { ?>
                Contact via Form
              <?php } else { ?>
                メールで相談
              <?php } ?>
            </a>
          <?php else: ?>
            <a href="<?php echo esc_url(home_url('#contact')); ?>"><i class="fa-regular fa-envelope"></i>
              <?php $locale = get_locale();
              if ('en_US' == $locale) { ?>
                Contact via Form
              <?php } else { ?>
                メールで相談
              <?php } ?>
            </a>
          <?php endif ?>
        </li>
        <?php $locale = get_locale();
        if ('en_US' == $locale) { ?>
          <li class="p-fixCta__naviItem p-fixCta__naviItem--linkedIn">
            <a href="https://www.linkedin.com/in/ryo-ikeda-48861a140/" target="_blank"><i class="fa-brands fa-linkedin"></i>
              Contact via LinkedIn
            </a>
          </li>
        <?php } else { ?>
          <li class="p-fixCta__naviItem p-fixCta__naviItem--chatwork">
            <a href="https://www.chatwork.com/ryouslash" target="_blank"><img src="/img/cw_logomark_color.svg" alt="Chatwork アイコン" width="150" height="150" />
              Chatworkで相談
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