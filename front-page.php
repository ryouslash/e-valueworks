<?php
if (!defined('ABSPATH')) {
  exit;
}
get_header(); ?>

<?php $locale = get_locale();
if ('en_US' == $locale) { ?>
  <?php get_template_part('template-parts/page/front-page', 'en'); ?>
<?php } else { ?>
  <?php get_template_part('template-parts/page/front-page', 'ja'); ?>
<?php } ?>

<?php get_footer(); ?>