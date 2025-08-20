<?php

/**
 * Contact Form 7の自動pタグ無効
 */
function wpcf7_autop_return_false()
{
  return false;
}
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');