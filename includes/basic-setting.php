<?php

/**
 * アイキャッチ画像を使用可能にする
 */
add_theme_support('post-thumbnails');


/**
 * 抜粋文の文字数を設定
 */
function custom_excerpt_length($length)
{
  return 55;
}
add_filter('excerpt_length', 'custom_excerpt_length');

/**
 * 省略記号の変更
 */
function custom_excerpt_symbol($length)
{
  return '&hellip;';
}
add_filter('excerpt_more', 'custom_excerpt_symbol');

/**
 * カスタムメニュー機能を使用可能にする
 */
add_theme_support('menus');

/**
 * メニュー機能を有効化する
 */
function custom_menu()
{
  register_nav_menus([
    'global_nav' => 'グローバルナビゲーション',
    'footer_nav' => 'フッターナビゲーション',
  ]);
}
add_action('init', 'custom_menu');

/**
 * サイト内検索の対象を投稿のみにする
 */
function custom_search_filter($query)
{
  if ($query->is_search) {
    $query->set('post_type', 'post');
  }
  return $query;
}
add_filter('pre_get_posts', 'custom_search_filter');
