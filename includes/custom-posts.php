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
    'show_in_rest' => true,  // これでブロックエディターを有効化
  ]);
});
