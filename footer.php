<?php
if (!defined('ABSPATH')) {
  exit;
}
?>

<footer class="l-footer">
  <div class="l-footer__inner">
    <?php if (!is_front_page()): ?>
      <?php get_template_part('template-parts/breadcrumb'); ?>
    <?php endif; ?>

    <nav class="l-footer__navi">
      <div class="l-container">
        <?php
        // メニューIDを取得する
        $menu_name = 'footer_nav';
        $locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object($locations[$menu_name]);

        $menu_items = wp_get_nav_menu_items($menu->term_id);
        ?>
        <ul class="l-footer__navi-items">
          <?php foreach ($menu_items as $item): ?>
            <li class="l-footer__navi-item">
              <a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </nav>
  </div>
  <div class="l-footer__copyright">
    <small>&copy; E-VALUE WORKS.</small>
  </div>
</footer>
<a class="c-pageTop js-pageTop" href="#">
  <i class="fa-solid fa-chevron-up"></i>
</a>
<?php wp_footer(); ?>
</body>

</html>