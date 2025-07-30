<?php if (!defined('ABSPATH')) {
  exit;
}; ?>
<div class="p-sidebarItem p-sidebarSearch">
  <div class="p-sidebarItem__title"><?php _e('記事を検索', 'e-valueworks'); ?></div>
  <div class="p-sidebarSearch__form">
    <form action="<?php echo esc_url(home_url("/")); ?>" method="get" name="s">
      <input
        type="text"
        name="s"
        value=""
        placeholder="<?php _e('キーワードを入力', 'e-valueworks'); ?>" />
      <button type="submit"><?php _e('検索', 'e-valueworks'); ?></button>
    </form>
  </div>
</div>