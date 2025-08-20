<?php
if (!defined('ABSPATH')) {
  exit;
};

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
 * 制作実績ページのページネーションは強制的にトップにリダイレクト（AJAX通信でのみ次のページ情報を表示させる）
 */
function redirect_extra_work_pages()
{
  if (
    !wp_doing_ajax() &&
    is_post_type_archive('work') &&
    get_query_var('paged') > 1
  ) {
    wp_redirect(home_url('/work/'));
    exit;
  }
}
add_action('template_redirect', 'redirect_extra_work_pages');


/**
 * authorページは強制的に
 */
function redirect_author_archive() {
  if (is_author()) {
    wp_redirect(home_url('/404'));
    exit;
  }
}
add_action('template_redirect', 'redirect_author_archive');