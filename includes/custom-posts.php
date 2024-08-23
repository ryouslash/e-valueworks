<?php
/**
 * カスタム投稿タイプ「お知らせ」を追加
 */
add_action('init', function () {
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
});

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
