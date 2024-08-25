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

/**
 * 制作実績「業種」のターム一覧ページは404ページにリダイレクトさせる
 */
function disable_taxonomy_archive_redirect()
{
  if (is_tax('industry')) {
    wp_redirect(home_url('404'));
    exit;
  }
}
add_action('template_redirect', 'disable_taxonomy_archive_redirect');
