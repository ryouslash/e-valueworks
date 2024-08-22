<!DOCTYPE html>
<html lang="ja">

<head>
  <?php get_header(); ?>
</head>

<body>
  <?php get_template_part('template-parts/header1'); ?>

  <div class="l-content page-about">
    <div class="l-content__inner">
      <div class="l-container">
        <main class="l-mainContent">
          <section class="p-about l-sectionPadding">
            <div class="l-container">
              <h2 class="c-title1">弊所について</h2>
              <div class="p-about__intro">
                <p>
                  弊所 E-VALUE WORKS
                  は、2020年12月に開業した個人経営のWeb制作事務所です。
                </p>
                <p>
                  インターネットを基盤とし、真に価値あるサービスの提供を志し、日々邁進を続けています。
                </p>
              </div>
              <dl class="p-about__table">
                <div class="p-about__tableInner">
                  <dt>屋号</dt>
                  <dd>E-VALUE WORKS</dd>
                </div>
                <div class="p-about__tableInner">
                  <dt>事業形態</dt>
                  <dd>フリーランス・個人事業主</dd>
                </div>
                <div class="p-about__tableInner">
                  <dt>開業日</dt>
                  <dd>2020年12月21日</dd>
                </div>
                <div class="p-about__tableInner">
                  <dt>代表</dt>
                  <dd>池田 遼</dd>
                </div>
                <div class="p-about__tableInner">
                  <dt>住所</dt>
                  <dd>海外（ジョージア）</dd>
                </div>
                <div class="p-about__tableInner">
                  <dt>事業内容</dt>
                  <dd>
                    <ul>
                      <li>コーディング代行</li>
                      <li>IT・Web特化ライティング</li>
                      <li>
                        メディア運営（<a
                          href="https://plusoneweb.net/"
                          target="_blank">PLUSONEWEB</a>）
                      </li>
                      <li>
                        講師（<a
                          href="https://www.street-academy.com/steachers/729106"
                          target="_blank">ストアカ</a>）
                      </li>
                    </ul>
                  </dd>
                </div>
                <div class="p-about__tableInner">
                  <dt>連絡手段</dt>
                  <dd>
                    メール / Chatwork / 電話<br />※初回の方はお問い合わせフォームよりご連絡下さい。
                  </dd>
                </div>
              </dl>
            </div>
          </section>
          <section class="p-about-profile l-sectionPadding">
            <h2 class="c-title1">代表プロフィール</h2>
            <div class="p-about-profile__inner">
              <div class="p-about-profile__photo">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/profile.jpg" />
              </div>
              <div class="p-about-profile__detail">
                <div class="p-about-profile__text">
                  <p>E-VALUE WORKSを運営している池田と申します。</p>
                  <p>
                    元々はWebとは無関係の日本語講師をしていましたが、仕事をしながら旅をするWebエンジニアの男性と知り合い、「自分もこんな生き方をしたい」と感じ、その道を歩むことを決意しました。
                  </p>
                  <p>
                    未経験で人脈もない状態からのスタートでしたが、「自分の手で人生を切り開く」という強い熱意を持ち、スキルアップのための学習・経験を積み重ねてきました。
                  </p>
                  <p>
                    これからも、独立当初の強い気持ちを忘れず、僕が提供できる最大限の価値を提供するために、日々全力で努力して参ります。
                  </p>
                </div>
                <div class="c-snslinks p-top-about__sns">
                  <a
                    href="https://www.instagram.com/ryouslash/"
                    target="_blank"
                    class="c-snslinks__link c-snslinks__instagram"><i class="fa-brands fa-instagram"></i></a>
                  <a
                    href="https://www.facebook.com/ryouslash/"
                    target="_blank"
                    class="c-snslinks__link c-snslinks__facebook"><i class="fa-brands fa-facebook"></i></a>
                  <a
                    href="https://github.com/ryouslash/"
                    target="_blank"
                    class="c-snslinks__link c-snslinks__github"><i class="fa-brands fa-github"></i></a>
                  <a
                    href="https://www.linkedin.com/in/ryo-ikeda-48861a140/"
                    target="_blank"
                    class="c-snslinks__link c-snslinks__linkedin"><i class="fa-brands fa-linkedin"></i></a>
                  <a
                    href="http://plusoneweb.net/"
                    target="_blank"
                    class="c-snslinks__link c-snslinks__blog"><i class="fa-solid fa-link"></i></a>
                </div>
              </div>
            </div>
          </section>
          
          <?php get_template_part('template-parts/fixcta'); ?>

        </main>
      </div>
    </div>
  </div>

  <?php get_footer(); ?>