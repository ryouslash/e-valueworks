<?php if (!defined('ABSPATH')) {
  exit;
};
$tags = get_tags([
  'hide_empty' => 1, // 投稿が存在するタグのみ取得
]); ?>
<?php if ($tags): ?>
  <div class="p-sidebarItem p-sidebarTag">
    <div class="p-sidebarItem__title">タグ</div>
    <ul class="p-sidebarTag__items">
      <?php foreach ($tags as $tag): ?>
        <li class="p-sidebarTag__item">
          <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><i class="fa-solid fa-tag"></i><?php echo esc_html($tag->name); ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>