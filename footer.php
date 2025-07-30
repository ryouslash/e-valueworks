<?php
if (!defined('ABSPATH')) {
  exit;
}
?>

<?php if (!is_front_page()): ?>
  <?php get_template_part('template-parts/breadcrumb'); ?>
<?php endif; ?>
<footer class="l-footer">
  <div class="l-footer__inner l-container">
    <?php
    // メニューIDを取得する
    $menu_name = 'footer_nav';
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object($locations[$menu_name]);

    $menu_items = wp_get_nav_menu_items($menu->term_id);
    ?>
    <?php if ($menu_items): ?>
      <nav class="l-footer__navi">
        <ul class="l-footer__navi-items">
          <?php foreach ($menu_items as $item): ?>
            <li class="l-footer__navi-item">
              <a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </nav>
    <?php endif; ?>

    <div class="l-footer__copyright">
      <small>&copy; E-VALUE WORKS.</small>
    </div>
  </div>
</footer>

<a class="c-pageTop js-pageTop" href="#">
  <i class="fa-solid fa-chevron-up"></i>
</a>

<div class="c-languageSwitcher">
  <?php
  // 現在の言語
  $locale = get_locale();
  $domain = site_url();
  // 現在のURLのパス（例：/work/）
  $current_path = $_SERVER['REQUEST_URI'];
  // 新しいリンク先を初期化
  $switch_url = '';
  if ($locale === 'ja') {
    // ja → en：ドメイン直後に /en を追加
    $switch_url = $domain . '/en' . $current_path;
  } elseif ($locale === 'en_US') {
    // 先頭が /en で始まっていて、その後がスラッシュ（/）か、何も続かずに終わる場合/に変更
    $switch_url = $domain . preg_replace('#^/en(/|$)#', '/', $current_path);
  }
  ?>
  <a href="<?php echo esc_url($switch_url); ?>" class="c-languageSwitcher__link">
    <i class="fa-solid fa-language"></i>
  </a>
</div>

<?php wp_footer(); ?>
</body>

</html>