<body <?php body_class(); ?>>
  <?php wp_body_open(); ?><header class="l-header">

    <div class="l-header__inner l-container">
      <h1 class="l-header__logo">
        <a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/logo.svg" /></a>
      </h1>
      <nav class="l-header__nav">
        <ul class="p-gnav">
          <li class="p-gnav__item p-gnav__item--home">
            <a href="<?php echo esc_url(home_url()); ?>">ホーム</a>
          </li>
          <li class="p-gnav__item p-gnav__item--about">
            <a href="#">アバウト</a>
          </li>
          <li class="p-gnav__item p-gnav__item--work">
            <a href="#">制作実績</a>
          </li>
          <li class="p-gnav__item p-gnav__item--price">
            <a href="#">料金</a>
          </li>
          <li class="p-gnav__item p-gnav__item--news">
            <a href="#">お知らせ</a>
          </li>
          <li class="p-gnav__item p-gnav__item--contact">
            <a href="#contact">お問い合わせ</a>
          </li>
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
          <li class="p-drawerMenu__item p-drawerMenu__item--home">
            <a href="<?php echo esc_url(home_url()); ?>">ホーム</a>
          </li>
          <li class="p-drawerMenu__item p-drawerMenu__item--about">
            <a href="#">アバウト</a>
          </li>
          <li class="p-drawerMenu__item p-drawerMenu__item--work">
            <a href="#">制作実績</a>
          </li>
          <li class="p-drawerMenu__item p-drawerMenu__item--price">
            <a href="#">料金</a>
          </li>
          <li class="p-drawerMenu__item p-drawerMenu__item--news">
            <a href="#">お知らせ</a>
          </li>
          <li class="p-drawerMenu__item p-drawerMenu__item--contact">
            <a href="#contact">お問い合わせ</a>
          </li>
        </ul>
      </div>
    </div>
  </header>