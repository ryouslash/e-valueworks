<?php

function custom_widget_areas()
{
  register_sidebar(array(
    'name'          => '記事下ウィジェット',
    'id'            => 'single_bottom_widget',
    'description'   => '投稿記事の下に表示されるウィジェットエリア',
    'before_widget' => '<div class="c-widget %2$s">',
    'after_widget'  => '</div>',
  ));
}
add_action('widgets_init', 'custom_widget_areas');
