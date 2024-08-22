<?php

/**
 * <title>タグを出力する
 */
add_theme_support('title-tag');

/**
 * <title>の区切り文字を変更する
 */
function my_document_title_separator($separator)
{
  $separator = '|';
  return $separator;
}
add_filter('document_title_separator', 'my_document_title_separator');

/**
 * アイキャッチ画像を使用可能にする
 */
add_theme_support('post-thumbnails');

/**
 * 日付アーカイブページはトップページにリダイレクトさせる
 */
function redirect_date_archives_to_home()
{
  if (is_date()) {
    wp_redirect(home_url('/'));
    exit;
  }
}

add_action('template_redirect', 'redirect_date_archives_to_home');

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
