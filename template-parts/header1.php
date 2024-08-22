<body <?php body_class(); ?>>
  <?php wp_body_open(); ?><header class="l-header">

    <div class="l-header__inner l-container">
      <h1 class="l-header__logo">
        <a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/logo.svg" /></a>
      </h1>
      <nav class="l-header__nav">
        <?php
        // メニューIDを取得する
        $menu_name = 'global_nav';
        $locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object($locations[$menu_name]);

        $menu_items = wp_get_nav_menu_items($menu->term_id);
        ?>
        <ul class="p-gnav">
          <?php foreach ($menu_items as $item): ?>
            <li class="p-gnav__item">
              <a href="<?php echo $item->url; ?>"><?php echo $item->title; ?><span><?php echo $item->description; ?></span></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </nav>
      <div class="l-header__drawerBtn">
        <i class="fa-solid fa-bars"></i>
        <i class="fa-solid fa-xmark"></i>
      </div>
    </div>
    <div class="p-drawerMenu">
      <div class="l-container">
        <ul class="p-drawerMenu__items">
          <?php foreach ($menu_items as $item): ?>
            <li class="p-drawerMenu__item p-drawerMenu__item--home">
              <a href="<?php echo $item->url; ?>"><?php echo $item->title; ?><span><?php echo $item->description; ?></span></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </header>