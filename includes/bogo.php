
<?php
/**
 * カスタム投稿タイプ対応
 */
function my_localizable_post_types($localizable)
{
  $args = array(
    'public' => true,
    '_builtin' => false
  );
  $custom_post_types = array_values(get_post_types($args, 'names', 'and'));
  return array_merge($localizable, $custom_post_types);
}
add_filter('bogo_localizable_post_types', 'my_localizable_post_types', 10, 1);
