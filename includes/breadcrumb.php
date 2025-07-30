<?php

/**
 * Breadcrumb NavXTの多言語化
 */
function my_bcn_breadcrumb_title($title, $this_type, $this_id)
{
  if (is_post_type_archive('work')) {
    $title = mb_strtoupper(__('制作実績', 'e-valueworks'), 'UTF-8');
  }
  if ((is_post_type_archive('news') || is_tax('news_category'))) {
    $title = mb_strtoupper(__('お知らせ', 'e-valueworks'), 'UTF-8');
  }

  if (is_home()) {
    $title = mb_strtoupper(__('お役立ちコラム', 'e-valueworks'), 'UTF-8');
  }

  return $title;
};
add_filter('bcn_breadcrumb_title', 'my_bcn_breadcrumb_title', 10, 3);
