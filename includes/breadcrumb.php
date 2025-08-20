<?php

/**
 * Breadcrumb NavXTの多言語化
 */
function my_bcn_breadcrumb_title($title, $type, $id)
{
  if (in_array('post-work-archive', $type, true)) {
    $title = mb_strtoupper(__('制作実績', 'e-valueworks'), 'UTF-8');
  }

  if (in_array('post-news-archive', $type, true)) {
    $title = mb_strtoupper(__('お知らせ', 'e-valueworks'), 'UTF-8');
  }

  return $title;
};
add_filter('bcn_breadcrumb_title', 'my_bcn_breadcrumb_title', 10, 3);