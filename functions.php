<?php

/**
 * CSSファイルのエンキュー
 */
function add_custom_styles()
{
  wp_enqueue_style('style', esc_url(get_template_directory_uri()) . '/dist/css/style.css', array(), '1.0.0',);
}
add_action('wp_enqueue_scripts', 'add_custom_styles');

/**
 * JSファイルのエンキュー
 */
function add_custom_scripts()
{
  wp_enqueue_script('jquery'); // jQuery のエンキュー
  wp_enqueue_script('main', esc_url(get_template_directory_uri()) . '/dist/js/main.js', array('jquery'), '1.0.0', true); // 共通スクリプト

  if (is_front_page()):
    wp_enqueue_script('top', esc_url(get_template_directory_uri()) . '/dist/js/top.js', array('common'), '1.0.0', true); // トップページ用スクリプト

  elseif (is_singular('work')):
    wp_enqueue_script('work', esc_url(get_template_directory_uri()) . '/dist/js/work.js', array('common'), '1.0.0', true); // 制作実績用スクリプト
  endif;
}
add_action('wp_enqueue_scripts', 'add_custom_scripts');

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

get_template_part('includes/custom-posts');
