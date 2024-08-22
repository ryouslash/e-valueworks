<!DOCTYPE html>
<html lang="ja">

<head>
  <?php get_header(); ?>
</head>

<?php get_template_part('template-parts/header2'); ?>


<div class="l-content t-single">
  <div class="c-pageHeader">
    <div class="l-container">
      <div class="c-pageHeader__title">
        <?php
        $categories = get_the_category($post->ID);
        if (! empty($categories)) {
          echo esc_html($categories[0]->name);  // 最初のカテゴリ名を表示
        };
        ?></div>
    </div>
  </div>
  <div class="l-container">
    <div class="l-content__inner">
      <main class="l-mainContent">
        <?php if (have_posts()): ?>
          <?php while (have_posts()) : the_post(); ?>
            <div class="p-postHead">
              <h1 class="p-postHead__title">
                <?php the_title(); ?>
              </h1>
              <div class="c-postMetas">
                <div class="c-postMetas__time"><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time></div>
                <?php
                $categories = get_the_category();
                if ($categories):
                ?>
                  <div class="c-postMetas__categoryWrap">
                    <!-- 2つまで -->
                    <ul class="c-postMetas__categories">
                      <?php
                      $count = 0; // カウンターを初期化
                      foreach ($categories as $category):
                        if ($count >= 2) {
                          break; // 2つ表示されたら、ここでループを止める
                        }
                      ?>
                        <li class="c-postMetas__category">
                          <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo esc_html($category->name); ?></a>
                        </li>
                      <?php
                        $count++; // カウンターをインクリメント
                      endforeach;
                      ?>
                    </ul>
                  </div>
                <?php endif; ?>

                <?php
                $tags = get_the_tags();
                if ($tags):
                ?>
                  <div class="c-postMetas__tagWrap">
                    <!-- 2つまで -->
                    <ul class="c-postMetas__tags">
                      <?php
                      $count = 0; // カウンターを初期化
                      foreach ($tags as $tag):
                        if ($count >= 2) {
                          break; // 2つ表示されたらループを終了
                        }
                      ?>
                        <li class="c-postMetas__tag">
                          <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
                            <i class="fa-solid fa-tag"></i> <?php echo esc_html($tag->name); ?>
                          </a>
                        </li>
                      <?php
                        $count++; // カウンターをインクリメント
                      endforeach;
                      ?>
                    </ul>
                  </div>
                <?php endif; ?>

              </div>
              <div class="p-postHead__thumbnail">
                <div class="p-postList__thumbnail">
                  <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('large'); ?>
                  <?php else: ?>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/noimg.jpg" />
                  <?php endif; ?>
                </div>
              </div>
              <div class="p-editorContent">
                <?php the_content(); ?>
              </div>
              <div class="c-prevNextNavi">

                <div class="c-prevNextNavi__item c-prevNextNavi__prev">
                  <?php
                  $previous_post = get_previous_post();
                  if ($previous_post): ?>
                    <a href="<?php the_permalink($previous_post); ?>"><i class="fa-solid fa-chevron-left"></i> 前の投稿へ</a>
                  <?php endif; ?>
                </div>

                <div class="c-prevNextNavi__item c-prevNextNavi__next">
                  <?php
                  $next_post = get_next_post();
                  if ($next_post): ?>
                    <a href="<?php the_permalink($next_post); ?>">次の投稿へ <i class="fa-solid fa-chevron-right"></i></a>
                  <?php endif; ?>
                </div>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>

          <div class="p-single-relatedPosts">
            <h2>同じカテゴリーの記事を読む</h2>
            <ul class="p-single-relatedPosts__items">
              <li class="p-single-relatedPosts__item">
                <a href="#">
                  <div class="p-single-relatedPosts__itemLeft">
                    <div class="p-single-relatedPosts__thumbnail">
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/noimg.jpg" />
                    </div>
                  </div>
                  <div class="p-single-relatedPosts__itemRight">
                    <div class="p-single-relatedPosts__title">
                      【初心者向け5ステップ】Webサイトにカレンダーを実装する方法
                    </div>
                    <time class="p-single-relatedPosts__time">2024.08.13</time>
                  </div>
                </a>
              </li>
              <li class="p-single-relatedPosts__item">
                <a href="#">
                  <div class="p-single-relatedPosts__itemLeft">
                    <div class="p-single-relatedPosts__thumbnail">
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/noimg.jpg" />
                    </div>
                  </div>
                  <div class="p-single-relatedPosts__itemRight">
                    <div class="p-single-relatedPosts__title">
                      Webサイトにカレンダーを実装する方法
                    </div>
                    <time class="p-single-relatedPosts__time">2024.08.13</time>
                  </div>
                </a>
              </li>
              <li class="p-single-relatedPosts__item">
                <a href="#">
                  <div class="p-single-relatedPosts__itemLeft">
                    <div class="p-single-relatedPosts__thumbnail">
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/noimg.jpg" />
                    </div>
                  </div>
                  <div class="p-single-relatedPosts__itemRight">
                    <div class="p-single-relatedPosts__title">
                      Webサイトにカレンダーを実装する方法
                    </div>
                    <time class="p-single-relatedPosts__time">2024.08.13</time>
                  </div>
                </a>
              </li>
              <li class="p-single-relatedPosts__item">
                <a href="#">
                  <div class="p-single-relatedPosts__itemLeft">
                    <div class="p-single-relatedPosts__thumbnail">
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/noimg.jpg" />
                    </div>
                  </div>
                  <div class="p-single-relatedPosts__itemRight">
                    <div class="p-single-relatedPosts__title">
                      Webサイトにカレンダーを実装する方法
                    </div>
                    <time class="p-single-relatedPosts__time">2024.08.13</time>
                  </div>
                </a>
              </li>
              <li class="p-single-relatedPosts__item">
                <a href="#">
                  <div class="p-single-relatedPosts__itemLeft">
                    <div class="p-single-relatedPosts__thumbnail">
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/noimg.jpg" />
                    </div>
                  </div>
                  <div class="p-single-relatedPosts__itemRight">
                    <div class="p-single-relatedPosts__title">
                      Webサイトにカレンダーを実装する方法
                    </div>
                    <time class="p-single-relatedPosts__time">2024.08.13</time>
                  </div>
                </a>
              </li>
              <li class="p-single-relatedPosts__item">
                <a href="#">
                  <div class="p-single-relatedPosts__itemLeft">
                    <div class="p-single-relatedPosts__thumbnail">
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/noimg.jpg" />
                    </div>
                  </div>
                  <div class="p-single-relatedPosts__itemRight">
                    <div class="p-single-relatedPosts__title">
                      Webサイトにカレンダーを実装する方法
                    </div>
                    <time class="p-single-relatedPosts__time">2024.08.13</time>
                  </div>
                </a>
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