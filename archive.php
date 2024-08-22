<!DOCTYPE html>
<html lang="ja">

<head>
  <?php get_header(); ?>
</head>

<body>
  <?php get_template_part('template-parts/header1'); ?>

  <div class="l-content t-archive">
    <div class="c-pageHeader">
      <div class="l-container">
        <span class="c-pageHeader__subTitle">お役立ちコラム</span>
        <div class="c-pageHeader__title">
          <?php wp_title(''); ?>
        </div>
      </div>
    </div>
    <div class="l-container">
      <div class="l-content__inner">
        <main class="l-mainContent">
          <div class="p-postList">
            <?php if (have_posts()): ?>
              <ul class="p-postList__items">
                <?php while (have_posts()): the_post(); ?>
                  <li class="p-postList__item">
                    <a href="<?php the_permalink(); ?>">
                      <div class="p-postList__left">
                        <div class="p-postList__thumbnail">
                          <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('large'); ?>
                          <?php else: ?>
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/noimg.jpg" />
                          <?php endif; ?>
                        </div>
                      </div>
                      <div class="p-postList__right">
                        <h2 class="p-postList__title">
                          <?php the_title(); ?>
                        </h2>
                        <div class="p-postList__metas">
                          <time class="p-postList__time" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
                          <?php if (is_category()): ?>
                            <div class="p-postList__taxonomy">
                              <?php single_cat_title(); ?>
                            </div>
                          <?php endif; ?>
                        </div>
                        <div class="p-postList__excerpt">
                          <?php the_excerpt(); ?>
                        </div>
                      </div>
                    </a>
                  </li>
                <?php endwhile; ?>
              </ul>
            <?php else: ?>
              <div class="p-postList__noItem">
                <p>該当する投稿がありません。</p>
              </div>
            <?php endif; ?>
          </div>
          <div class="c-pagination">
            <ul class="c-pagination__items">
              <li class="c-pagination__item">
                <a href="#"><i class="fa-solid fa-chevron-left"></i></a>
              </li>
              <li class="c-pagination__item"><a href="#">1</a></li>
              <li class="c-pagination__item"><a href="#">2</a></li>
              <li class="c-pagination__item"><a href="#">3</a></li>
              <li class="c-pagination__item">
                <a href="#"><i class="fa-solid fa-chevron-right"></i></a>
              </li>
            </ul>
          </div>
        </main>
        <aside class="l-sidebar">
          <div class="p-sidebarItem p-sidebarLatestPosts">
            <div class="p-sidebarItem__title">最新の投稿</div>
            <ul class="p-sidebarLatestPosts__items">
              <li class="p-sidebarLatestPosts__item">
                <a href="#">
                  <div class="p-sidebarLatestPosts__thumbnail">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/noimg.jpg" />
                  </div>
                  <div class="p-sidebarLatestPosts__title">
                    Webサイトにカレンダーを実装する方法
                  </div>
                </a>
              </li>
              <li class="p-sidebarLatestPosts__item">
                <a href="#">
                  <div class="p-sidebarLatestPosts__thumbnail">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/noimg.jpg" />
                  </div>
                  <div class="p-sidebarLatestPosts__title">
                    Webサイトにカレンダーを実装する方法
                  </div>
                </a>
              </li>
              <li class="p-sidebarLatestPosts__item">
                <a href="#">
                  <div class="p-sidebarLatestPosts__thumbnail">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/noimg.jpg" />
                  </div>
                  <div class="p-sidebarLatestPosts__title">
                    Webサイトにカレンダーを実装する方法
                  </div>
                </a>
              </li>
              <li class="p-sidebarLatestPosts__item">
                <a href="#">
                  <div class="p-sidebarLatestPosts__thumbnail">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/noimg.jpg" />
                  </div>
                  <div class="p-sidebarLatestPosts__title">
                    Webサイトにカレンダーを実装する方法
                  </div>
                </a>
              </li>
              <li class="p-sidebarLatestPosts__item">
                <a href="#">
                  <div class="p-sidebarLatestPosts__thumbnail">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/noimg.jpg" />
                  </div>
                  <div class="p-sidebarLatestPosts__title">
                    Webサイトにカレンダーを実装する方法
                  </div>
                </a>
              </li>
            </ul>
          </div>

          <div class="p-sidebarItem p-sidebarTaxonomy">
            <div class="p-sidebarItem__title">カテゴリー</div>
            <ul class="p-sidebarTaxonomy__items">
              <li class="p-sidebarTaxonomy__item">
                <a href="#">Web制作</a>
              </li>
              <li class="p-sidebarTaxonomy__item">
                <a href="#">WordPress</a>
              </li>
            </ul>
          </div>

          <div class="p-sidebarItem p-sidebarTag">
            <div class="p-sidebarItem__title">タグ</div>
            <ul class="p-sidebarTag__items">
              <li class="p-sidebarTag__item">
                <a href="#"><i class="fa-solid fa-tag"></i> HTML</a>
              </li>
              <li class="p-sidebarTag__item">
                <a href="#"><i class="fa-solid fa-tag"></i> CSS</a>
              </li>
            </ul>
          </div>

          <div class="p-sidebarItem p-sidebarSearch">
            <div class="p-sidebarItem__title">記事を検索</div>
            <div class="p-sidebarSearch__form">
              <form action="#" method="get">
                <input
                  type="text"
                  name="s"
                  value=""
                  placeholder="キーワードを入力" />
                <button type="submit">検索</button>
              </form>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>

  <?php get_footer(); ?>