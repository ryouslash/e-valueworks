<?php

/**
 * CSSファイルの読み込み
 */
function add_custom_styles()
{
  wp_enqueue_style('style', esc_url(get_template_directory_uri()) . '/dist/css/style.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'add_custom_styles');

/**
 * 管理画面用CSSファイルの読み込み
 */
function custom_admin_enqueue_styles()
{
  wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/dist/css/admin-style.css', array(), '1.0.0');
}
add_action('admin_enqueue_scripts', 'custom_admin_enqueue_styles');

/**
 * JSファイルの読み込み
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

get_template_part('includes/basic-setting');

get_template_part('includes/redirect');

get_template_part('includes/custom-posts');

get_template_part('includes/taxonomy-fields');
