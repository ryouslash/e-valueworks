<?php

/**
 * 日付アーカイブページはトップページにリダイレクトさせる
 */
function redirect_date_archives_to_home()
{
  if (is_date()) {
    wp_redirect(home_url('404'));
    exit;
  }
}
add_action('template_redirect', 'redirect_date_archives_to_home');
