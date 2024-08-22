<?php
$categories = get_categories([
  'hide_empty' => 1, // 投稿が存在するカテゴリーのみ取得
]); ?>

<?php if ($categories): ?>
  <div class="p-sidebarItem p-sidebarTaxonomy">
    <div class="p-sidebarItem__title">カテゴリー</div>
    <ul class="p-sidebarTaxonomy__items">
      <?php foreach ($categories as $category): ?>
        <li class="p-sidebarTaxonomy__item">
          <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo esc_html($category->name); ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>