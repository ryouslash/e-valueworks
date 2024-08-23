<!DOCTYPE html>
<html lang="ja">

<head>
  <?php get_header(); ?>
</head>

<body>
  <?php get_template_part('template-parts/header2'); ?>


  <div class="l-content t-single-news">
    <div class="l-container">
      <div class="l-content__inner">
        <main class="l-mainContent">
        <?php if (have_posts()): ?>
          <?php while (have_posts()) : the_post(); ?>
          <div class="p-postHead">
            <h1 class="p-postHead__title">
              ホームページをリニューアルしました。
            </h1>
            <div class="c-postMetas">
              <div class="c-postMetas__time"><time>2024.08.13</time></div>
              <!-- 1つまで -->
              <ul class="c-postMetas__taxonomies">
                <li class="c-postMetas__taxonomy">
                  <a href="#">お知らせ</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="p-editorContent">
            <p>ここにテキストが入ります。</p>
            <p>ここにテキストが入ります。</p>
            <p>ここにテキストが入ります。</p>
            <p>ここにテキストが入ります。</p>

            [toc]
            <h2>見出し2</h2>
            <p>ここにテキストが入ります。</p>
            <p>ここにテキストが入ります。</p>
            <p>ここにテキストが入ります。</p>
            <h2>見出し2</h2>
            <h3>見出し3</h3>
            <h4>見出し4</h4>
            <p>ここにテキストが入ります。</p>
            <p>ここにテキストが入ります。</p>
            <p>ここにテキストが入ります。</p>
          </div>
          <div class="c-prevNextNavi">
            <div class="c-prevNextNavi__item c-prevNextNavi__prev">
              <a href="#"><i class="fa-solid fa-chevron-left"></i> 前の投稿へ</a>
            </div>
            <div class="c-prevNextNavi__item c-prevNextNavi__next">
              <a href="#">次の投稿へ <i class="fa-solid fa-chevron-right"></i></a>
            </div>
          </div>
        </main>
        <aside class="l-sidebar">
          <!-- 1つまで -->
          <div class="p-single-news-title">
            <div class="c-title1">メディア掲載</div>
            <div class="c-subTitle">Media Coverage</div>
          </div>
        </aside>
      </div>
    </div>
  </div>

  <?php get_footer(); ?>