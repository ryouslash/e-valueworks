<?php
if (!defined('ABSPATH')) {
  exit;
}

$current_locale = get_locale(); // 例: ja_JP, en_US

// 現在の言語の記事IDを取得
$post_ids = get_posts([
  'post_type'      => 'post',
  'posts_per_page' => -1,
  'fields'         => 'ids',
  'meta_query'     => [
    [
      'key'   => '_locale',
      'value' => $current_locale,
    ]
  ]
]);

// その記事に紐づくタグを取得
$tags = [];
if ($post_ids) {
  $tags = wp_get_object_terms($post_ids, 'post_tag', [
    'hide_empty' => true,
  ]);
}
?>

<?php if ($tags): ?>
  <div class="p-sidebarItem p-sidebarTag">
    <div class="p-sidebarItem__title"><?php _e('タグ', 'e-valueworks'); ?></div>
    <ul class="p-sidebarTag__items">
      <?php foreach ($tags as $tag): ?>
        <li class="p-sidebarTag__item">
          <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><i class="fa-solid fa-tag"></i><?php echo esc_html($tag->name); ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>