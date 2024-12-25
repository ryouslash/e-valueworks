<?php get_header(); ?>

<?php if (have_posts()): ?>
  <?php while (have_posts()) : the_post(); ?>
    <div class="l-content t-single-news">
      <div class="l-container">
        <div class="l-content__inner">
          <main class="l-mainContent">
            <div class="p-postHead">
              <h1 class="p-postHead__title">
                <?php the_title(); ?>
              </h1>
              <div class="c-postMetas">
                <div class="c-postMetas__time">
                  <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
                </div>
                <!-- 1つまで -->
                <?php
                $terms = get_the_terms(get_the_ID(), 'news_category');
                if ($terms):
                ?>
                  <ul class="c-postMetas__taxonomies">
                    <li class="c-postMetas__taxonomy">
                      <a href="<?php echo esc_url(get_term_link($terms[0])); ?>"><?php echo esc_html($terms[0]->name); ?></a>
                    </li>
                  </ul>
                <?php endif; ?>
              </div>
            </div>
            <div class="p-editorContent">
              <?php the_content(); ?>
            </div>

            <?php get_template_part('template-parts/prevnextnavi'); ?>

          </main>
          <aside class="l-sidebar">
            <!-- 1つまで -->
            <div class="p-single-news-title">
              <?php
              if ($terms):
              ?>
                <div class="c-title1"><?php echo esc_html($terms[0]->name); ?></div>
                <div class="c-subTitle">
                  <?php
                  $slug = esc_html(($terms[0]->slug));
                  $formatted_slug = strtoupper(str_replace('-', ' ', $slug));
                  echo $formatted_slug;
                  ?>
                </div>
              <?php endif; ?>
            </div>
          </aside>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>