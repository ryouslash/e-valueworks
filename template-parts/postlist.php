<div class="p-postList">
  <?php if (have_posts()): ?>
    <ul class="p-postList__items">
      <?php while (have_posts()): the_post(); ?>
        <li class="p-postList__item">
          <a href="<?php the_permalink(); ?>">

            <?php if (!is_post_type_archive('news') && !is_tax('news_category')): ?>
              <div class="p-postList__left">
                <div class="p-postList__thumbnail">
                  <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('large'); ?>
                  <?php else: ?>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/noimg.jpg" />
                  <?php endif; ?>
                </div>
              </div>
            <?php endif; ?>

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

                <?php elseif (is_post_type_archive('news') || is_tax('news_category')): ?>
                  <?php
                  $terms = get_the_terms(get_the_ID(), 'news_category');
                  if ($terms) {
                    $first_term = $terms[0];
                    // 1つ目のターム名を取得
                  }
                  ?>
                  <div class="p-postList__taxonomy"><?php echo esc_html($first_term->name); ?></div>

                <?php else: ?>
                  <?php
                  $categories = get_the_category();
                  if ($categories) {
                    $first_category = $categories[0];
                    // カテゴリー名を取得
                  }
                  ?>
                  <div class="p-postList__taxonomy">
                    <?php echo esc_html($first_category->name); ?>
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
      <?php if (is_post_type_archive('news') || is_tax('news_category')): ?>
        <p>お知らせがありません。</p>
      <?php else: ?>
        <p>投稿がありません。</p>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</div>