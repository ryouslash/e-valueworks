<!DOCTYPE html>
<html lang="ja">

<head>
  <?php get_header(); ?>
</head>

<body>
  <?php get_template_part('template-parts/header2'); ?>

  <div class="l-content">
    <div class="l-container">
      <div class="l-content__inner">
        <main class="l-mainContent">
          <div class="c-title1">制作実績</div>
          <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>

              <div class="p-single-work-client">
                <h1 class="p-single-work-client__title">
                  <?php the_title(); ?>
                </h1>
                <div class="p-single-work-client__detail">
                  <div class="p-single-work-client__left">
                    <div class="p-single-work-client__summaryText">
                      <?php the_content(); ?>
                    </div>
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'industry');
                    if ($terms && !is_wp_error($terms)) : ?>
                      <div class="p-single-work-client__industry">
                        <?php echo esc_html($terms[0]->name); ?>
                      </div>
                    <?php endif; ?>

                    <div class="p-single-work-client__infoTable">
                      <dl>
                        <?php
                        $url = get_field('url');
                        $pageNumber = get_field('ページ数');
                        $estimatedAmount = get_field('見積もり金額');
                        $scope = get_field('弊所スコープ');
                        if ($url):
                        ?>
                          <div
                            class="p-single-work-client__tableItem p-single-work-client__tableItem--url">
                            <dt>URL</dt>
                            <dd>
                              <a href="<?php echo esc_url($url); ?>" target="_blank"><?php echo esc_url($url); ?></a>
                            </dd>
                          </div>
                        <?php else: ?>
                          <div
                            class="p-single-work-client__tableItem p-single-work-client__tableItem--url">
                            <dt>URL</dt>
                            <dd>公開準備中</dd>
                          </div>
                        <?php endif; ?>
                        <?php
                        if ($pageNumber):
                        ?>
                          <div
                            class="p-single-work-client__tableItem p-single-work-client__tableItem--page">
                            <dt>ページ数</dt>
                            <dd>
                              <?php echo esc_html($pageNumber); ?>
                            </dd>
                          </div>
                        <?php endif; ?>
                        <?php
                        if ($estimatedAmount):
                        ?>
                          <div
                            class="p-single-work-client__tableItem p-single-work-client__tableItem--price">
                            <dt>見積もり金額</dt>
                            <dd>
                              <?php echo esc_html($estimatedAmount); ?>
                            </dd>
                          </div>
                        <?php endif; ?>
                        <?php
                        $post_language_terms = get_the_terms(get_the_ID(), 'language');
                        if (!empty($post_language_terms) && !is_wp_error($post_language_terms)): ?>
                          <div
                            class="p-single-work-client__tableItem p-single-work-client__tableItem--language">
                            <dt>使用言語・ツール</dt>
                            <dd>
                              <?php
                              $post_language_names = array();
                              foreach ($post_language_terms as $term) {
                                $post_language_names[] = esc_html($term->name);
                              }
                              echo implode(' / ', $post_language_names);
                              ?>
                            </dd>
                          </div>
                        <?php endif; ?>
                        <?php
                        $post_specification_terms = get_the_terms(get_the_ID(), 'specification');
                        if (!empty($post_specification_terms) && !is_wp_error($post_specification_terms)): ?>
                          <div
                            class="p-single-work-client__tableItem p-single-work-client__tableItem--specification">
                            <dt>サイト仕様</dt>
                            <dd>
                              <?php
                              $post_specification_names = array();
                              foreach ($post_specification_terms as $term) {
                                $post_specification_names[] = esc_html($term->name);
                              }
                              echo implode(' / ', $post_specification_names);
                              ?>
                            </dd>
                          </div>
                        <?php endif; ?>
                        <?php if ($scope): ?>
                          <div
                            class="p-single-work-client__tableItem p-single-work-client__tableItem--scope">
                            <dt>弊所スコープ</dt>
                            <dd>
                              <?php echo esc_html($scope); ?>
                            </dd>
                          </div>
                        <?php endif; ?>
                      </dl>
                      <div class="p-single-work-client__tableBg"></div>
                    </div>
                  </div>
                  <div class="p-single-work-client__right">
                    <?php if (has_post_thumbnail()): ?>
                      <figure class="p-single-work-client__siteImg">
                        <?php the_post_thumbnail(); ?>
                      </figure>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="c-button3">
                  <a href="<?php echo esc_url(home_url('work')); ?>">実績一覧へ戻る</a>
                </div>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
        </main>
      </div>
    </div>
  </div>

  <?php get_template_part('template-parts/fixcta'); ?>

  <?php get_footer(); ?>