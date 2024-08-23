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
            <ul class="p-archive-work__items">
              <li class="p-archive-work__item">
                <a href="#"><img
                    class="p-archive-work__siteImg"
                    src="dist/img/work1.png" />
                  <div class="p-archive-work__industry">宿泊施設</div>
                  <h2 class="p-archive-work__title">
                    亀岡ゲストハウス 舞舟 様
                  </h2>
                </a>
              </li>
              <li class="p-archive-work__item">
                <a href="#"><img
                    class="p-archive-work__siteImg"
                    src="dist/img/work2.png" />
                  <div class="p-archive-work__industry">協会・団体</div>
                  <h2 class="p-archive-work__title">
                    一般社団法人 新潟地域福祉協会 様
                  </h2>
                </a>
              </li>
              <li class="p-archive-work__item">
                <a href="#"><img
                    class="p-archive-work__siteImg"
                    src="dist/img/work3.png" />
                  <div class="p-archive-work__industry">コンサルティング</div>
                  <h2 class="p-archive-work__title">
                    オランダ海外進出・起業支援 A3 様
                  </h2>
                </a>
              </li>
              <li class="p-archive-work__item">
                <a href="#"><img
                    class="p-archive-work__siteImg"
                    src="dist/img/work4.png" />
                  <div class="p-archive-work__industry">宿泊施設</div>
                  <h2 class="p-archive-work__title">d3 HOTEL+ 様</h2>
                </a>
              </li>
            </ul>
          </div>
        </main>
      </div>
    </div>
  </div>

  <div class="p-fixCta">
    <div class="p-fixCta__inner">
      <div class="p-fixCta__left">お問い合わせ・ご相談</div>
      <div class="p-fixCta__right">
        <ul class="p-fixCta__naviItems">
          <li class="p-fixCta__naviItem p-fixCta__naviItem--price">
            <a href="#"><i class="fa-solid fa-sack-dollar"></i>ご利用料金</a>
          </li>
          <li class="p-fixCta__naviItem p-fixCta__naviItem--form">
            <a href="#"><i class="fa-regular fa-envelope"></i>お見積もり相談</a>
          </li>
          <li class="p-fixCta__naviItem p-fixCta__naviItem--chatwork">
            <a href="#"><img src="dist/img/cw_logomark_color.svg" />Chatworkでご相談</a>
          </li>
        </ul>
        <div class="p-fixCta__close">
          <i class="fa-solid fa-xmark"></i>
        </div>
      </div>
    </div>
  </div>

  <?php get_footer(); ?>