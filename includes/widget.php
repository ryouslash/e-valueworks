<?php
if (!defined('ABSPATH')) {
  exit;
};

/**
 * 独自のウィジェットエリアを追加
 */
function custom_widget_areas()
{
  register_sidebar(array(
    'name'          => '記事上ウィジェット',
    'id'            => 'single_top_widget',
    'description'   => '投稿記事の上に表示されるウィジェットエリア',
    'before_widget' => '<div class="c-widget">',
    'after_widget'  => '</div>',
  ));

  register_sidebar(array(
    'name'          => '記事下ウィジェット',
    'id'            => 'single_bottom_widget',
    'description'   => '投稿記事の下に表示されるウィジェットエリア',
    'before_widget' => '<div class="c-widget">',
    'after_widget'  => '</div>',
  ));
}
add_action('widgets_init', 'custom_widget_areas');