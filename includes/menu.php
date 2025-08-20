<?php

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