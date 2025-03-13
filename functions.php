<?php

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
add_action('after_setup_theme', function () {

  // ブロックエディターをサポート
  add_theme_support('editor-styles');

  // 指定のファイルを読み込む
  add_editor_style('dist/css/editor-style.css');
});

/**
 * JSファイルの読み込み
 */
function add_custom_scripts()
{
  wp_enqueue_script('jquery'); // jQuery のエンキュー

  // 共通スクリプト
  wp_enqueue_script('utility', get_template_directory_uri() . '/dist/js/utility.js', array('jquery'), filemtime(get_template_directory() . '/dist/js/utility.js'), true);

  wp_enqueue_script('main', get_template_directory_uri() . '/dist/js/main.js', array('jquery', 'utility'), filemtime(get_template_directory() . '/dist/js/main.js'), true);



  if (is_front_page()):
    wp_enqueue_script('top', esc_url(get_template_directory_uri()) . '/dist/js/top.js', array('main'), filemtime(get_template_directory() . '/dist/js/top.js'), true); // トップページ用スクリプト


  elseif (is_singular('work')):
    wp_enqueue_script('work', esc_url(get_template_directory_uri()) . '/dist/js/work.js', array('main'), filemtime(get_template_directory() . '/dist/js/work.js'), true); // 制作実績用スクリプト

  elseif (is_page('price')):
    wp_enqueue_script('price', esc_url(get_template_directory_uri()) . '/dist/js/price.js', array('main'), filemtime(get_template_directory() . '/dist/js/price.js'), true); // 料金ページ用スクリプト

  elseif (is_singular('post') || is_home() || is_category() || is_tag()) :
    wp_enqueue_script(
      'post',
      get_template_directory_uri() . '/dist/js/post.js',
      array('main'),
      filemtime(get_template_directory() . '/dist/js/post.js'),
      true
    );
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

add_action('admin_enqueue_scripts', 'term_thumbnail_scripts');

get_template_part('includes/basic-setting');

get_template_part('includes/redirect');

get_template_part('includes/custom-posts');

get_template_part('includes/taxonomy-fields');

get_template_part('includes/contact-form7');

get_template_part('includes/widget');

get_template_part('includes/core-blocks-style');
