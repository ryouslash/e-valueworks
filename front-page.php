<?php
if (!defined('ABSPATH')) {
  exit;
}
get_header(); ?>

<?php $locale = get_locale();
if ($locale == 'en_US') { ?>
  <?php get_template_part('template-parts/front-page', 'en'); ?>
<?php } else { ?>
  <?php get_template_part('template-parts/front-page', 'ja'); ?>
<?php } ?>

<?php get_footer(); ?>