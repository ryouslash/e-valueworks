<div class="p-sidebarItem p-sidebarSearch">
  <div class="p-sidebarItem__title">記事を検索</div>
  <div class="p-sidebarSearch__form">
    <form action="<?php echo esc_url(home_url()) ?>" method="get" name="s">
      <input
        type="text"
        name="s"
        value=""
        placeholder="キーワードを入力" />
      <button type="submit">検索</button>
    </form>
  </div>
</div>