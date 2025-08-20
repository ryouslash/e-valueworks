<?php
if (!defined('ABSPATH')) {
  exit;
};
/**
 * CSSファイルの読み込み
 */
function add_custom_styles()
{
  wp_enqueue_style('style', esc_url(get_template_directory_uri()) . '/dist/css/style.css', array(), filemtime(get_template_directory() . '/dist/css/style.css'));
}
add_action('wp_enqueue_scripts', 'add_custom_styles');

/**
 * 管理画面用CSSファイルの読み込み
 */
function custom_admin_enqueue_styles()
{
  wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/dist/css/admin.css', array(), filemtime(get_template_directory() . '/dist/css/admin.css'));
}
add_action('admin_enqueue_scripts', 'custom_admin_enqueue_styles');

/**
 * エディター用の CSS 読み込み
 */
function add_custom_editor_styles()
{
  // ブロックエディターをサポート
  add_theme_support('editor-styles');

  // 指定のファイルを読み込む
  add_editor_style('dist/css/editor-style.css');
}
add_action('after_setup_theme', 'add_custom_editor_styles');

/**
 * JSファイルの読み込み
 */
function add_custom_scripts()
{
  wp_enqueue_script('jquery'); // jQuery のエンキュー

  // 共通スクリプト
  wp_enqueue_script('main', get_template_directory_uri() . '/dist/js/main.js', array('jquery'), filemtime(get_template_directory() . '/dist/js/main.js'), true);

  if (is_front_page()):
    wp_enqueue_script('top', esc_url(get_template_directory_uri()) . '/dist/js/top.js', array('main'), filemtime(get_template_directory() . '/dist/js/top.js'), true); // トップページ用スクリプト

  elseif (is_page('price')):
    wp_enqueue_script('vendors', esc_url(get_template_directory_uri()) . '/dist/js/vendors.js', array('main'), filemtime(get_template_directory() . '/dist/js/vendors.js'), true);
    // wp_enqueue_script('vue-main', esc_url(get_template_directory_uri()) . '/dist/js/vue-main.js', array('vendors'), filemtime(get_template_directory() . '/dist/js/vue-main.js'), true);
    wp_enqueue_script('price', esc_url(get_template_directory_uri()) . '/dist/js/price.js', array('main'), filemtime(get_template_directory() . '/dist/js/price.js'), true); // 料金ページ用スクリプト

  elseif (is_post_type_archive('work')):
    wp_enqueue_script('work', esc_url(get_template_directory_uri()) . '/dist/js/work.js', array('main'), filemtime(get_template_directory() . '/dist/js/work.js'), true);

    // work.jsにAJAXの送信先URLとnonceを渡す
    wp_localize_script('work', 'my_ajax', [
      'url' => admin_url('admin-ajax.php'),
      'nonce' => wp_create_nonce('my_ajax_nonce')
    ]);

  endif;
}
add_action('wp_enqueue_scripts', 'add_custom_scripts');

/**
 * 管理画面でのJavaScriptの読み込み
 */
function term_thumbnail_scripts($hook)
{
  // スクリプトを特定の管理画面（カテゴリー・タグ編集画面）でのみ読み込む
  if ($hook === 'edit-tags.php' || $hook === 'term.php') {
    wp_enqueue_media(); // メディアライブラリ用スクリプトの読み込み
    wp_enqueue_script('term-thumbnail-script', get_template_directory_uri() . '/dist/js/admin.js', array('jquery'), false, true);
  }
}
add_action('admin_enqueue_scripts', 'term_thumbnail_scripts');

/**
 * タイトルサポート
 */
function add_title_support()
{
  add_theme_support('title-tag');
}
add_action('init', 'add_title_support');

/**
 * サムネイルサポート
 */
function add_thumbnail_support()
{
  add_theme_support('post-thumbnails');
}
add_action('init', 'add_thumbnail_support');

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
 * 独自テキストドメインの追加
 */
function add_text_domain()
{
  load_theme_textdomain('e-valueworks', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'add_text_domain');

get_template_part('includes/redirect');

get_template_part('includes/custom-posts');

get_template_part('includes/term-thumbnail');

get_template_part('includes/widget');

get_template_part('includes/menu');

get_template_part('includes/shortcode');

get_template_part('includes/core-blocks-style');

get_template_part('includes/ajax-handler');

get_template_part('includes/contact-form7');

get_template_part('includes/bogo');

get_template_part('includes/yoastseo');

get_template_part('includes/breadcrumb');