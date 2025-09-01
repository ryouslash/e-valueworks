<?php
if (!defined('ABSPATH')) {
  exit;
};

$current_locale = get_locale(); // 例: ja_JP, en_US

// 現在の言語の記事を取得（IDだけ）
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

$categories = [];
if ($post_ids) {
  $categories = wp_get_object_terms($post_ids, 'category', [
    'hide_empty' => true,
  ]);

  // description の数字順でソート
  usort($categories, function ($a, $b) {
    $a_description = (int) $a->description;
    $b_description = (int) $b->description;
    return $a_description - $b_description;
  });
} ?>


<?php if ($categories): ?>
  <div class="p-sidebarItem p-sidebarTaxonomy">
    <div class="p-sidebarItem__title"><?php _e('カテゴリー', 'e-valueworks'); ?></div>
    <ul class="p-sidebarTaxonomy__items">
      <?php foreach ($categories as $category): ?>
        <li class="p-sidebarTaxonomy__item">
          <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo esc_html($category->name); ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>