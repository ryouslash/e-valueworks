<!DOCTYPE html>
<html lang="ja">

<head>
  <?php get_header(); ?>
</head>

<body>
  <?php get_template_part('template-parts/header1'); ?>

  <div class="l-content">
    <div class="l-container">
      <div class="l-content__inner">
        <main class="l-mainContent">
          <div class="c-title1">制作実績</div>

          <div class="p-archive-work">

            <div class="p-archive-work__search">
              <div class="p-archive-work__searchTitle"><i class="fa-solid fa-magnifying-glass"></i>絞り込み検索</div>
              <div class="p-archive-work__searchArea">
                <ul class="p-archive-work__searchItems">
                  <li class="p-archive-work__searchItem">

                    <dl>
                      <dt>ページ数</dt>
                      <dd><input type="checkbox"><label for=""></label></dd>
                    </dl>
                  </li>
                  <li class="p-archive-work__searchItem">
                    <div>価格帯</div>
                  </li>
                  <li class="p-archive-work__searchItem">
                    <div>使用言語・ツール</div>
                  </li>
                  <li class="p-archive-work__searchItem">
                    <div>サイト仕様</div>
                  </li>
                </ul>
              </div>
            </div>

            <?php if (have_posts()): ?>
              <ul class="p-archive-work__items">
                <?php while (have_posts()): the_post(); ?>
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