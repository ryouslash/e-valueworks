<?php
if (!defined('ABSPATH')) {
  exit;
};

function add_custom_post()
{
  /**
   * カスタム投稿タイプ「お知らせ」を追加
   */
  register_post_type('news', [
    'label' => 'お知らせ',
    'public' => true,
    'menu_icon' => 'dashicons-bell',
    'supports' => ['thumbnail', 'title', 'editor'],
    'has_archive' => true, // アーカイブを有効化
    'show_in_rest' => true,  // これでブロックエディターを有効化
  ]);

  register_taxonomy('news_category', 'news', [
    'label' => 'お知らせカテゴリー',
    'hierarchical' => true,
    'show_in_rest' => true,
  ]);

  /**
   * カスタム投稿タイプ「制作実績」を追加
   */
  register_post_type('work', [
    'label' => '制作実績',
    'public' => true,
    'menu_icon' => 'dashicons-cover-image',
    'supports' => ['thumbnail', 'title', 'editor'],
    'has_archive' => true, // アーカイブを有効化
    'show_in_rest' => true,  // これでブロックエディターを有効化
  ]);

  register_taxonomy('industry', 'work', [
    'label' => '業種',
    'hierarchical' => true,
    'show_in_rest' => true,
  ]);

  register_taxonomy('scale', 'work', [
    'label' => 'ページ数',
    'hierarchical' => true,
    'show_in_rest' => true,
  ]);

  register_taxonomy('price', 'work', [
    'label' => '価格帯',
    'hierarchical' => true,
    'show_in_rest' => true,
  ]);

  register_taxonomy('language', 'work', [
    'label' => '使用言語・ツール',
    'hierarchical' => true,
    'show_in_rest' => true,
  ]);

  register_taxonomy('specification', 'work', [
    'label' => 'サイト仕様',
    'hierarchical' => true,
    'show_in_rest' => true,
  ]);
}
add_action('init', 'add_custom_post');

/**
 * 制作実績ページのページネーションが正しく動作するようメインクエリのposts_per_pageをサブループの件数に合わせる
 */
function modify_work_archive_query($query)
{
  if (!is_admin() && $query->is_main_query() && is_post_type_archive('work')) {
    $query->set('posts_per_page', 10);
  }
}
add_action('pre_get_posts', 'modify_work_archive_query');

/**
 * お知らせカテゴリーを選択していない場合、自動的に「お知らせ」がデフォルトタームとなるように設定
 */
function set_default_term_for_news_category($post_id, $post)
{
  $taxonomy = 'news_category'; // ここにカスタムタクソノミーのスラッグを指定
  $default_term_slug = 'news'; // ここにデフォルトのタームのスラッグを指定

  // 投稿タイプのチェック
  if ($post->post_type != 'news') { // ここにカスタム投稿タイプを指定
    return;
  }

  $terms = wp_get_post_terms($post_id, $taxonomy);
  if (empty($terms) || is_wp_error($terms)) {
    wp_set_object_terms($post_id, $default_term_slug, $taxonomy);
  }
}
add_action('save_post', 'set_default_term_for_news_category', 10, 2);