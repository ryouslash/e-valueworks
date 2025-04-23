<?php
if (!defined('ABSPATH')) {
  exit;
}
get_header(); ?>

<main class="l-content">
  <div class="p-top-mainVisual">
    <div class="p-top-mainVisual__bg"></div>
    <div class="p-top-mainVisual__inner l-container">
      <div class="p-top-mainVisual__title js-typing"></div>
      <div class="p-top-mainVisual__text">
        <ul>
          <li>
            <i class="fa-solid fa-check"></i>
            低価格・高品質なコーディングを案件単位で依頼したい方
          </li>
          <li>
            <i class="fa-solid fa-check"></i>
            ちょっとした改修作業を月額契約で外注したい方など
          </li>
        </ul>
        <p>様々なニーズにお応えします。</p>
      </div>
      <div class="p-top-mainVisual__buttons">
        <a
          href="#contact"
          class="p-top-mainVisual__button p-top-mainVisual__button--contact"><i class="fa-regular fa-envelope"></i>お見積り・ご相談</a>
        <a
          href="https://www.chatwork.com/ryouslash"
          class="p-top-mainVisual__button p-top-mainVisual__button--chatwork"
          target="_blank"><img src="/img/cw_logomark_color.svg" alt="Chatwork アイコン" width="150" height="150" />Chatworkでご相談</a>
      </div>
    </div>
  </div>

  <?php
  $args = array(
    'post_type' => 'news',
    'posts_per_page' => 5,
  );
  $the_latest_query = new WP_Query($args);
  ?>
  <?php if ($the_latest_query->have_posts()): ?>
    <div class="p-top-news">
      <div class="l-container">
        <ul class="p-top-news__items">
          <?php while ($the_latest_query->have_posts()): $the_latest_query->the_post(); ?>
            <li class="p-top-news__item">
              <time class="p-top-news__time" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y/m/d'); ?></time>
              <!-- 1つまで -->
              <?php
              $terms = get_the_terms(get_the_ID(), 'news_category');
              if ($terms):
              ?>
                <div class="p-top-news__taxonomy">
                  <?php foreach ($terms as $term): ?>
                    <a href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
              <div class="p-top-news__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </div>
            </li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
    <?php wp_reset_postdata(); ?>
  <?php endif; ?>


  <section class="p-top-troubles">
    <div class="l-sectionPadding">
      <div class="l-container">
        <h2 class="c-title1">こんなお悩みありませんか？</h2>
        <div class="p-top-troubles__circle">
          <div class="p-top-troubles__left">
            <div class="p-top-troubles__item">
              早くて品質の高い<br
                class="u-md--hide" />コーディングをして欲しい
            </div>
            <div class="p-top-troubles__item">
              保守管理しやすいCSS設計に基づいて<br
                class="u-md--hide" />コーディングして欲しい
            </div>
            <div class="p-top-troubles__item">
              WordPressの複雑な<br
                class="u-md--hide" />カスタマイズをお願いしたい
            </div>
            <div class="p-top-troubles__item">
              インパクトのあるアニメーションを<br
                class="u-md--hide" />実装して欲しい
            </div>
          </div>
          <div class="p-top-troubles__right">
            <div class="p-top-troubles__item">
              運用サイトの改修作業を<br
                class="u-md--hide" />月額契約で外注したい
            </div>
            <div class="p-top-troubles__item">
              ドメイン移管やサーバー移管など<br
                class="u-md--hide" />Web全般に詳しい方を雇いたい
            </div>
            <div class="p-top-troubles__item">
              料金体系がシンプルで分かりやすい所に<br
                class="u-md--hide" />依頼したい
            </div>
            <div class="p-top-troubles__item">
              外注コーダーにも社員の一員のように<br
                class="u-md--hide" />責任感を持って取り組んで欲しい
            </div>
          </div>
          <div class="p-top-troubles__center">
            <img src="/img/overthinking-man.png" alt="悩んでいる人" width="735" height="854" loading="lazy" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="p-top-about l-sectionPadding u-pt0">
    <h2 class="c-title1">そのお悩み私が解決します！</h2>
    <div class="l-container">
      <div class="p-top-about__items">
        <dl class="p-top-about__item p-top-about__item--profile">
          <dt class="p-top-about__itemTitle">Profile</dt>
          <dd class="p-top-about__itemDetail">
            <p>
              初めまして。<br />
              フリーランスコーダー・エンジニアの池田と申します。<br />
              趣味は比較的マイナーな国（例：アイルランド、ジョージアなど）への海外旅行です。
            </p>
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
          </dd>
        </dl>
        <dl class="p-top-about__item p-top-about__item--history">
          <dt class="p-top-about__itemTitle">History</dt>
          <dd class="p-top-about__itemDetail">
            <p>
              学歴<br />
              2013/4：中央大学 入学<br />
              2018/3：中央大学 卒業<br />
            </p>
            <p class="u-mb0">
              職歴<br />
              2018/10-2020/3：<br />フィリピンの日系企業にて日本語講師として勤務<br />
              2020/4-現在：Web制作フリーランスとして独立<br />
            </p>
            <div class="p-snslinks"></div>
          </dd>
        </dl>
        <dl class="p-top-about__item p-top-about__item--skills">
          <dt class="p-top-about__itemTitle">Skills</dt>
          <dd class="p-top-about__itemDetail">
            <p>
              言語<br />
              <span class="u-inline-block">HTML</span> /
              <span class="u-inline-block">CSS</span> /
              <span class="u-inline-block">SCSS</span> /
              <span class="u-inline-block">PHP</span> /
              <span class="u-inline-block">JavaScript</span>
            </p>
            <p>
              ライブラリ・フレームワーク<br />
              <span class="u-inline-block">jQuery</span> /
              <span class="u-inline-block">Vue.js</span> /
              <span class="u-inline-block">React</span>
            </p>
            <p>
              CMS<br />
              <span class="u-inline-block">WordPress</span>
            </p>
            <p>
              タスクランナー・バンドルツール<br />
              <span class="u-inline-block">Webpack</span> /
              <span class="u-inline-block">Gulp</span>
            </p>
          </dd>
        </dl>
        <div class="p-top-about__item p-top-about__item--photo">
          <img src="/img/profile.jpg" alt="プロフィール写真" width="1000" height="1000" loading="lazy" />
        </div>
      </div>
    </div>
  </section>

  <?php
  $args = array(
    'post_type' => 'work',
    'posts_per_page' => 5,
  );
  $the_work_query = new WP_Query($args);
  ?>
  <?php if ($the_work_query->have_posts()): ?>
    <section class="p-top-work l-sectionPadding">
      <div class="l-container">
        <h2 class="c-title1">制作実績</h2>
        <div class="p-top-work__inner">
          <p class="p-top-work__text">※以下は実績の一部です。</p>
          <div class="p-top-work__slider">
            <?php while ($the_work_query->have_posts()): $the_work_query->the_post(); ?>
              <div class="p-top-work__slider-item">
                <a href="<?php the_permalink(); ?>">
                  <?php if (has_post_thumbnail()): ?>
                    <figure class="p-top-work__photo">
                      <?php the_post_thumbnail(); ?>
                    </figure>
                  <?php endif; ?>
                  <?php
                  $terms = get_the_terms(get_the_ID(), 'industry');
                  if ($terms && !is_wp_error($terms)) : ?>
                    <div class="p-archive-work__industry">
                      <?php echo esc_html($terms[0]->name); ?>
                    </div>
                  <?php endif; ?>
                  <div class="p-top-work__title">
                    <?php the_title(); ?>
                  </div>
                </a>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </section>
    <?php wp_reset_postdata(); ?>
  <?php endif; ?>

  <section class="p-top-promise l-sectionPadding">
    <div class="l-container">
      <div class="p-top-promise__inner">
        <div class="p-top-promise__fixed">
          <h2 class="c-title1">お客様への4つのお約束</h2>
          <div class="p-top-promise__items">
            <dl class="p-top-promise__item is-active">
              <dt class="p-top-promise__title">
                <span>お約束1</span>
                <div>責任感を持って仕事に取り組みます</div>
              </dt>
              <dd class="p-top-promise__detail">
                <p>
                  フリーランスとして組織から独立してはいるものの、社員と同様の熱意と責任感を持って仕事に取り組みます。
                </p>
              </dd>
            </dl>
            <dl class="p-top-promise__item">
              <dt class="p-top-promise__title">
                <span>お約束2</span>
                <div>
                  <span class="u-inline-block">迅速な対応でリモートの不便を</span><span class="u-inline-block">感じさせません</span>
                </div>
              </dt>
              <dd class="p-top-promise__detail">
                <p>
                  迅速な対応を心がけ、距離によって生じるご不便をカバーします。また、丁寧なやりとりを意識し、コミュニケーションコストの無駄を省きます。
                </p>
              </dd>
            </dl>
            <dl class="p-top-promise__item">
              <dt class="p-top-promise__title">
                <span>お約束3</span>
                <div>思いやりの気持ちを大切にします</div>
              </dt>
              <dd class="p-top-promise__detail">
                <p>
                  「この人と働きたい」と思ってもらえるような、誠実な態度と思いやりの気持ちを何よりも大切にします。
                </p>
              </dd>
            </dl>
            <dl class="p-top-promise__item">
              <dt class="p-top-promise__title">
                <span>お約束4</span>
                <div>継続的に自己研鑽に努めます</div>
              </dt>
              <dd class="p-top-promise__detail">
                <p>
                  人の役に立つことが好きです。<br />
                  継続的に自己研鑽に励み、守備範囲を広げていくことで、より良いサービス提供ができるよう努めて参ります。
                </p>
              </dd>
            </dl>
          </div>
        </div>
        <div class="p-top-promise__scroll">
          <div class="p-top-promise__img">
            <figure>
              <img src="/img/promise1.png" alt="責任感" width="1000" height="933" loading="lazy" />
              <figcaption>
                <div class="p-top-promise__title">
                  <span>お約束1</span>
                  <div>責任感を持って仕事に取り組みます</div>
                </div>
                <div class="p-top-promise__detail">
                  フリーランスとして組織から独立してはいるものの、社員と同様の熱意と責任感を持って仕事に取り組みます。
                </div>
              </figcaption>
            </figure>
          </div>
          <div class="p-top-promise__img">
            <figure>
              <img src="/img/promise2.png" alt="迅速な対応" width="1000" height="933" loading="lazy" />
              <figcaption>
                <div class="p-top-promise__title">
                  <span>お約束2</span>
                  <div>迅速な対応でリモートの不便を感じさせません</div>
                </div>
                <div class="p-top-promise__detail">
                  迅速な対応を心がけ、距離によって生じるご不便をカバーします。また、丁寧なやりとりを意識し、コミュニケーションコストの無駄を省きます。
                </div>
              </figcaption>
            </figure>
          </div>
          <div class="p-top-promise__img">
            <figure>
              <img src="/img/promise3.png" alt="思いやり" width="1000" height="933" loading="lazy" />
              <figcaption>
                <div class="p-top-promise__title">
                  <span>お約束3</span>
                  <div>思いやりの気持ちを大切にします</div>
                </div>
                <div class="p-top-promise__detail">
                  「この人と働きたい」と思ってもらえるような、誠実な態度と思いやりの気持ちを何よりも大切にします。
                </div>
              </figcaption>
            </figure>
          </div>
          <div class="p-top-promise__img u-mb0">
            <figure>
              <img src="/img/promise4.png" alt="自己研鑽" width="1000" height="933" loading="lazy" />
              <figcaption>
                <div class="p-top-promise__title">
                  <span>お約束4</span>
                  <div>継続的に自己研鑽に努めます</div>
                </div>
                <div class="p-top-promise__detail">
                  人の役に立つことが好きです。<br />
                  継続的に自己研鑽に励み、守備範囲を広げていくことで、より良いサービス提供ができるよう努めて参ります。
                </div>
              </figcaption>
            </figure>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="p-top-price l-sectionPadding">
    <div class="l-container p-top-price__inner">
      <h2 class="c-title1">料金プラン</h2>
      <div class="p-top-price__plans">
        <div class="p-top-price__plan p-top-price__plan--coding">
          <div class="p-top-price__planUpper">
            <div class="u-text--center">
              <h3 class="p-top-price__planTitle">新規コーディングプラン</h3>
            </div>
            <p class="p-top-price__firstText u-text--center">
              <span class="u-inline-block">高品質なコーデイングを</span><span class="u-inline-block">プロジェクト単位で</span><span class="u-inline-block">依頼したい方向け</span>
            </p>
            <dl class="p-top-price__samples">
              <div class="p-top-price__sample">
                <dt class="p-top-price__sampleTitle">LP・トップページ</dt>
                <dd class="p-top-price__sampleDetail">44.000円〜</dd>
              </div>
              <div class="p-top-price__sample">
                <dt class="p-top-price__sampleTitle">下層ページ</dt>
                <dd class="p-top-price__sampleDetail">16.500円〜</dd>
              </div>
            </dl>

            <p class="p-top-price__hosoku">
              ※消費税込みの料金です。
            </p>
          </div>
          <div class="p-top-price__planLower">
            <a href="<?php echo esc_url(home_url('price/#coding-plan')); ?>" class="c-button2">詳細はこちら</a>
          </div>
        </div>
        <div class="p-top-price__plan p-top-price__plan--maintenance">
          <div class="p-top-price__planUpper">
            <div class="u-text--center">
              <h3 class="p-top-price__planTitle">保守・管理プラン</h3>
            </div>
            <p class="p-top-price__firstText u-text--center">
              <span class="u-inline-block">細かな運用・保守業務を</span><span class="u-inline-block">月額契約で外注したい方向け</span>
            </p>
            <dl class="p-top-price__samples">
              <div class="p-top-price__sample">
                <dt class="p-top-price__sampleTitle">ライト（月20時間）</dt>
                <dd class="p-top-price__sampleDetail">52,800円</dd>
              </div>
            </dl>
            <p class="p-top-price__hosoku">
              ※消費税込みの料金です。<br />※日給契約も可能です。
            </p>
          </div>
          <div class="p-top-price__planLower">
            <a href="<?php echo esc_url(home_url('price/#maintenance-plan')); ?>" class="c-button2">詳細はこちら</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="p-top-flow l-sectionPadding">
    <div class="l-container">
      <div class="p-top-flow__header">
        <h2 class="c-title1">サービスご利用の流れ</h2>
        <p>わかりやすい5 STEP。まずはお気軽にお問い合わせ下さい！</p>
      </div>
      <div class="p-top-flow__steps">
        <div class="p-top-flow__step p-top-flow__step1">
          <div class="p-top-flow__icon p-top-flow__icon1">
            <div><i class="fa-regular fa-envelope"></i></div>
          </div>
          <div class="p-top-flow__title">お問い合わせ</div>
          <div class="p-top-flow__text">
            <p>
              まずはお問い合わせフォーム、Chatworkよりプロジェクトの詳細を簡単にお聞かせ下さい。
            </p>
            <p>2~3営業日以内にご連絡差し上げます。</p>
          </div>
        </div>
        <div class="p-top-flow__step p-top-flow__step2">
          <div class="p-top-flow__icon p-top-flow__icon2">
            <div><i class="fa-regular fa-handshake"></i></div>
          </div>
          <div class="p-top-flow__title">ヒアリング</div>
          <div class="p-top-flow__text">
            <p>
              日程を調整し、オンラインにてプロジェクトの詳細を詳しくお伺いいたします。
            </p>

            <p>お見積りをお出ししますので、ご依頼頂くかご検討下さい。</p>
          </div>
        </div>

        <div class="p-top-flow__step p-top-flow__step3">
          <div class="p-top-flow__icon p-top-flow__icon3">
            <div><i class="fa-solid fa-pen-nib"></i></div>
          </div>
          <div class="p-top-flow__title">デザイン入稿</div>
          <div class="p-top-flow__text">
            <p>デザインデータの入稿をお願いします。</p>
          </div>
        </div>

        <div class="p-top-flow__step p-top-flow__step4">
          <div class="p-top-flow__icon p-top-flow__icon4">
            <div><i class="fa-solid fa-code"></i></div>
          </div>
          <div class="p-top-flow__title">コーディング</div>
          <div class="p-top-flow__text">
            <p>デザインデータを基に、コーディングを開始します。</p>
            <p>
              お客様のご要望に沿った機能やデザインを忠実に再現しつつ、サイトパフォーマンスにもこだわります。
            </p>
          </div>
        </div>

        <div class="p-top-flow__step p-top-flow__step5">
          <div class="p-top-flow__icon p-top-flow__icon5">
            <div><i class="fa-solid fa-server"></i></div>
          </div>
          <div class="p-top-flow__title">納品・公開</div>
          <div class="p-top-flow__text">
            <p>
              完成したWebサイトをお客様にご確認いただきます。
              問題がなければ、正式に納品し、公開手続きを行います。
            </p>
            <p>
              「保守・管理プラン」をお申し込みのお客様には、公開後の運用サポートやメンテナンスもさせて頂きます。
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="p-top-faq l-sectionPadding">
    <div class="l-container">
      <h2 class="c-title1">よくある質問</h2>
      <div class="p-top-faq__inner">
        <div class="p-top-faq__left">
          <img src="/img/man-with-green-tie.png" alt="緑色のネクタイをした男性のイラスト" width="629" height="867" loading="lazy" />
        </div>
        <div class="p-top-faq_right">
          <dl class="p-top-faq__list p-top-faq__list1 is-open">
            <dt class="p-top-faq__question">
              対応ブラウザを教えて下さい。<i
                class="fa-solid fa-chevron-down"></i>
            </dt>
            <dd class="p-top-faq__answer">
              <p>
                <span class="u-inline-block">Google Chrome</span> /
                <span class="u-inline-block">Safari（macOS）</span> /
                <span class="u-inline-block">Microsoft Edge</span> /
                <span class="u-inline-block">Mozilla Firefox</span> /
                <span class="u-inline-block">Google Chrome（iOS）</span> /
                <span class="u-inline-block">Safari（iOS）</span>の最新バージョンの表示確認をします。<br>また、<span class="u-inline-block">Mac OS</span> / <span class="u-inline-block">Windows</span> / <span class="u-inline-block">iOS</span> / <span class="u-inline-block">Android</span>の実機による表示確認を行います。
            </dd>
          </dl>
          <dl class="p-top-faq__list p-top-faq__list2">
            <dt class="p-top-faq__question">
              スマホデザイン（あるいはPCデザイン）のみでも、レスポンシブにコーディングしてもらえますか？<i
                class="fa-solid fa-chevron-down"></i>
            </dt>
            <dd class="p-top-faq__answer">
              <p>
                はい。ただし、その場合は弊所の一任で進めさせて頂くため、後から修正ができなくなる点ご了承お願い致します。
              </p>
            </dd>
          </dl>

          <dl class="p-top-faq__list p-top-faq__list3">
            <dt class="p-top-faq__question">
              対面でのお打ち合わせは可能ですか？<i
                class="fa-solid fa-chevron-down"></i>
            </dt>
            <dd class="p-top-faq__answer">
              <p>
                大阪府内であれば、対面でのお打ち合わせが可能です。大阪府外の場合は、オンラインでの対応とさせていただいております。
              </p>
            </dd>
          </dl>
          <dl class="p-top-faq__list p-top-faq__list4">
            <dt class="p-top-faq__question">
              テストサーバー・開発サーバーは用意してもらえますか？<i
                class="fa-solid fa-chevron-down"></i>
            </dt>
            <dd class="p-top-faq__answer">
              <p>
                はい。制作中の表示確認を行なって頂けるよう、テストサーバーを無償でご用意させて頂きます。
              </p>
            </dd>
          </dl>

          <dl class="p-top-faq__list p-top-faq__list6">
            <dt class="p-top-faq__question">
              コーディングが終わった後の運用サポートもお願いできますか？<i
                class="fa-solid fa-chevron-down"></i>
            </dt>
            <dd class="p-top-faq__answer">
              <p>
                はい。弊所では、月額契約でWebサイトの運用保守をさせて頂く「保守・管理プラン」をご用意しています。
              </p>
            </dd>
          </dl>
        </div>
      </div>
    </div>
  </section>

  <section class="p-top-contact" id="contact">
    <h2 class="c-title1">
      <span class="u-inline-block">無料相談・お問い合わせは</span><span class="u-inline-block">こちら</span>
    </h2>
    <div class="p-top-contact__inner">
      <div class="l-slim-container">
        <?php echo do_shortcode('[contact-form-7 id="e0fded1" title="コンタクトフォーム" html_class="p-contactForm"]'); ?>
      </div>
    </div>
  </section>
  <?php get_template_part('template-parts/fixcta'); ?>

</main>

<?php get_footer(); ?>