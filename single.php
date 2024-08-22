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
                            <i class="fa-solid fa-tag"></i><?php echo esc_html($tag->name); ?>
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

            <?php
            // 現在の投稿IDを取得
            $current_post_id = get_the_ID();

            // 現在の投稿が属するカテゴリーを取得
            $categories = wp_get_post_categories($current_post_id);

            if ($categories) {
              $args = array(
                'category__in'   => $categories,   // 同じカテゴリーの投稿を取得
                'post__not_in'   => array($current_post_id),   // 現在の投稿は除外
                'posts_per_page' => 6,   // 表示する投稿数
              );
            }

            $related_posts_query = new WP_Query($args);; ?>
            <?php if ($related_posts_query->have_posts()): ?>
              <ul class="p-single-relatedPosts__items">
                <?php while ($related_posts_query->have_posts()): $related_posts_query->the_post(); ?>
                  <li class="p-single-relatedPosts__item">
                    <a href="<?php the_permalink(); ?>">
                      <div class="p-single-relatedPosts__itemLeft">
                        <div class="p-single-relatedPosts__thumbnail">
                          <div class="p-postList__thumbnail">
                            <?php if (has_post_thumbnail()): ?>
                              <?php the_post_thumbnail('large'); ?>
                            <?php else: ?>
                              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/noimg.jpg" />
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
                      <div class="p-single-relatedPosts__itemRight">
                        <div class="p-single-relatedPosts__title">
                          <?php the_title(); ?> </div>
                        <time class="p-single-relatedPosts__time" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
                      </div>
                    </a>
                  </li>
                <?php endwhile; ?>
              </ul>
            <?php else: ?>
              <div class="p-single-relatedPosts__noItem">
                <p>同じカテゴリーの記事がありません。</p>
              </div>
              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
          </div>
      </main>

      <aside class="l-sidebar">
        <?php get_template_part('template-parts/sidebar/latest-posts'); ?>
        <?php get_template_part('template-parts/sidebar/category'); ?>
        <?php get_template_part('template-parts/sidebar/tag'); ?>
        <?php get_template_part('template-parts/sidebar/search'); ?>
      </aside>
    </div>
  </div>

</div>

<?php get_footer(); ?>