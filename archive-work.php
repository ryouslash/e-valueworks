<?php get_header(); ?>


<div class="l-content">
  <div class="l-container">
    <div class="l-content__inner">
      <main class="l-mainContent">
        <h1 class="c-title1">制作実績</h1>

        <div class="p-archive-work">

          <?php get_template_part('template-parts/filtersearch'); ?>

          <div class="p-archive-work__search">
            <div class="p-archive-work__searchTitle"><i class="fa-solid fa-magnifying-glass"></i>絞り込み検索</div>
            <div class="p-archive-work__searchArea">
              <form method="get" action="<?php echo esc_url(home_url('work')); ?>">
                <ul class="p-archive-work__searchItems">
                  <li class="p-archive-work__searchItem">
                    <dl>
                      <dt>ページ数</dt>
                      <dd>
                        <?php
                        $page_terms = get_terms($tax_type01, array(
                          'hide_empty' => false,
                          'orderby' => 'term_id',  // 明示的にID順に並べる
                          'order' => 'ASC'         // 昇順で並べる（降順の場合は 'DESC'）
                        ));

                        foreach ($page_terms as $term) :
                          $checked = '';
                          if (in_array($term->slug, $param_page_terms, true)) {
                            $checked = 'checked';
                          }
                        ?>
                          <input type="checkbox" id="<?php echo esc_attr($term->slug); ?>" name="<?php echo $tax_type01; ?>[]" value="<?php echo esc_attr($term->slug); ?>" <?php echo $checked; ?>>
                          <label class="checkbox" for="<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></label>
                        <?php endforeach; ?>
                      </dd>
                    </dl>
                  </li>
                  <li class="p-archive-work__searchItem">
                    <dl>
                      <dt>価格帯</dt>
                      <dd>
                        <?php
                        $price_terms = get_terms($tax_type02, array(
                          'hide_empty' => false,
                          'orderby' => 'term_id',  // ID順で並べる
                          'order' => 'ASC'         // 昇順で並べる（降順にしたい場合は 'DESC' に変更）
                        ));

                        foreach ($price_terms as $term) :
                          $checked = '';
                          if (in_array($term->slug, $param_price_terms, true)) {
                            $checked = 'checked';
                          }
                        ?>
                          <input type="checkbox" id="<?php echo esc_attr($term->slug); ?>" name="<?php echo $tax_type02; ?>[]" value="<?php echo esc_attr($term->slug); ?>" <?php echo $checked; ?>>
                          <label class="checkbox" for="<?php echo esc_attr($term->slug); ?>">
                            <?php echo esc_html($term->name); ?>
                          </label>
                        <?php endforeach; ?>

                      </dd>
                    </dl>
                  </li>
                  <li class="p-archive-work__searchItem">
                    <dl>
                      <dt>使用言語・ツール</dt>
                      <dd>
                        <?php
                        $language_terms = get_terms($tax_type03, array(
                          'hide_empty' => false,
                          'orderby' => 'term_id',  // ID順で並べる
                          'order' => 'ASC'         // 昇順で並べる（降順にしたい場合は 'DESC' に変更）
                        ));

                        foreach ($language_terms as $term) :
                          $checked = '';
                          if (in_array($term->slug, $param_language_terms, true)) {
                            $checked = 'checked';
                          }
                        ?>
                          <input type="checkbox" id="<?php echo esc_attr($term->slug); ?>" name="<?php echo $tax_type03; ?>[]" value="<?php echo esc_attr($term->slug); ?>" <?php echo $checked; ?>>
                          <label class="checkbox" for="<?php echo esc_attr($term->slug); ?>">
                            <?php echo esc_html($term->name); ?>
                          </label>
                        <?php endforeach; ?>

                      </dd>
                    </dl>
                  </li>
                  <li class="p-archive-work__searchItem">
                    <dl>
                      <dt>サイト仕様</dt>
                      <dd>
                        <?php
                        $specification_terms = get_terms($tax_type04, array(
                          'hide_empty' => false,
                          'orderby' => 'term_id',  // ID順で並べる
                          'order' => 'ASC'         // 昇順に並べる（降順の場合は 'DESC'）
                        ));

                        foreach ($specification_terms as $term) :
                          $checked = '';
                          if (in_array($term->slug, $param_specification_terms, true)) {
                            $checked = 'checked';
                          }
                        ?>
                          <input type="checkbox" id="<?php echo esc_attr($term->slug); ?>" name="<?php echo $tax_type04; ?>[]" value="<?php echo esc_attr($term->slug); ?>" <?php echo $checked; ?>>
                          <label class="checkbox" for="<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></label>
                        <?php endforeach; ?>

                      </dd>
                    </dl>
                  </li>
                </ul>
                <div class="p-archive-work__searchBtns">
                  <input type="submit" value="絞り込む">
                </div>
              </form>
            </div>
          </div>

          <?php
          $new_query = new WP_Query($search_args);

          if ($new_query->have_posts()): ?>
            <ul class="p-archive-work__items">
              <?php while ($new_query->have_posts()): $new_query->the_post(); ?>
                <li class="p-archive-work__item">
                  <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()): ?>
                      <?php the_post_thumbnail(); ?>
                    <?php endif; ?>
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'industry');
                    if ($terms && !is_wp_error($terms)) : ?>
                      <div class="p-archive-work__industry">
                        <?php echo esc_html($terms[0]->name); ?>
                      </div>
                    <?php endif; ?>
                    <h2 class="p-archive-work__title">
                      <?php the_title(); ?>
                    </h2>
                  </a>
                </li>
              <?php endwhile; ?>
            </ul>
          <?php else: ?>
            <div class="p-archive-work__noItem">
              <p>実績がありません。</p>
            </div>
          <?php endif; ?>
        </div>
      </main>
    </div>
  </div>
</div>

<?php get_template_part('template-parts/fixcta'); ?>

<?php get_footer(); ?>