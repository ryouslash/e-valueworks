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
                <?php else: ?>
                  <?php
                  $categories = get_the_category();
                  if (! empty($categories)) {
                    $first_category = $categories[0];
                    // カテゴリー名を取得
                  }
                  ?>
                  <div class="p-postList__taxonomy"><?php echo esc_html($first_category->name); ?></div>
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
      <p>投稿がありません。</p>
    </div>
  <?php endif; ?>
</div>