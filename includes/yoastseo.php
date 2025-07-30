<?php
function tr_yoast_pt_title($title)
{
  if (is_post_type_archive('work')) {
    $title = mb_strtoupper(__('制作実績', 'e-valueworks'), 'UTF-8');
    return $title . ' | ' . get_bloginfo('name');
  }

  if (is_post_type_archive('news')) {
    $title = mb_strtoupper(__('お知らせ', 'e-valueworks'), 'UTF-8');
    return $title . ' | ' . get_bloginfo('name');
  }

  if (is_search()) {
    $keyword = get_search_query();
    $title = sprintf(__('検索結果: %s', 'e-valueworks'), $keyword);
    return mb_strtoupper($title, 'UTF-8') . ' | ' . get_bloginfo('name');
  }

  if (is_home()) {
    $title = mb_strtoupper(__('お役立ちコラム', 'e-valueworks'), 'UTF-8');
    return $title . ' | ' . get_bloginfo('name');
  }

  return $title;
}
add_filter('wpseo_title', 'tr_yoast_pt_title');

function tr_yoast_pt_og_title($og_title)
{
  if (is_post_type_archive('work')) {
    $og_title = mb_strtoupper(__('制作実績', 'e-valueworks'), 'UTF-8');
    return $og_title . ' | ' . get_bloginfo('name');
  }

  if (is_post_type_archive('news')) {
    $og_title = mb_strtoupper(__('お知らせ', 'e-valueworks'), 'UTF-8');
    return $og_title . ' | ' . get_bloginfo('name');
  }

  if (is_search()) {
    $keyword = get_search_query();
    $og_title = sprintf(__('検索結果: %s', 'e-valueworks'), $keyword);
    return mb_strtoupper($og_title, 'UTF-8') . ' | ' . get_bloginfo('name');
  }

  if (is_home()) {
    $og_title = mb_strtoupper(__('お役立ちコラム', 'e-valueworks'), 'UTF-8');
    return $og_title . ' | ' . get_bloginfo('name');
  }

  return $og_title;
}
add_filter('wpseo_opengraph_title', 'tr_yoast_pt_og_title');
