<?php
if (!defined('ABSPATH')) {
  exit;
};

/**
 * サムネイルサポート
 */
function add_thumbnail_support()
{
  add_theme_support('post-thumbnails');
}
add_action('init', 'add_thumbnail_support');

/**
 * カスタムメニューサポート
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

/**
 *  固定ページのスラッグをbodyクラスに追加
 */
function my_body_class($classes)
{
  if (is_page()) {
    $page = get_post();
    $classes[] = $page->post_name; // スラッグ名を追加
    $classes[] = 'page-' . $page->post_name; // 'page-' プレフィックスを追加
  }
  return $classes;
}
add_filter('body_class', 'my_body_class');

/**
 * ページネーション スクリーンリーダーテキストのタグ変更
 */
function change_navigation_markup($template)
{
  $template = str_replace('<h2 class="screen-reader-text">', '<span class="screen-reader-text">', $template);
  $template = str_replace('</h2>', '</span>', $template);
  return $template;
}
add_filter('navigation_markup_template', 'change_navigation_markup');

/**
 * Contact Form 7の自動pタグ無効
 */
function wpcf7_autop_return_false()
{
  return false;
}
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
