E-VALUE WORKS Web サイト

CSS 設計：ベースとして FLOCSS を採用

◾️foundation→ リセット系 CSS やベース CSS、変数やブレイクポイントなどを設定しているファイル類。

◾️layout→header、footer などレイアウトに関連するもの。container などは common.scss に記述。ブロックエディターのコンテンツ部分の余白デザイン調整は、blockeditor.scss に記述。
例）l-header、l-footer

◾️object ＞ component→2 ページ以上で共通のコンポーネント要素を格納。
例）c-button1、c-title1

◾️object ＞ project→2 ページ以上で共通のプロジェクト要素を格納。
例）p-gnav、p-postList

◾️object ＞ utility→utility 要素。

◾️pages > ページ名 > project→ 各ページでしか使わないプロジェクト要素を格納。クラス名は「p-ページ名-セクション名」とする。
例）p-top-about、p-about-profile

◾️templates > テンプレート名 > project→ 固定ページ、投稿、カスタム投稿でしか使わないプロジェクト要素を格納。

クラス名は
・固定ページ「p-page-セクション名」
・投稿詳細ページ「p-single-セクション名」、投稿アーカイブ「p-archive-セクション名」（Date、Category、Tag、Author を分けない場合）、「p-タクソノミー名-archive-セクション名」（Date、Category、Tag、Author を分ける場合）Blog Posts Index ページ「p-index-archive」
・カスタム投稿詳細ページ「p-single-カスタム投稿名-セクション名」、カスタム投稿アーカイブページ「p-archive-カスタム投稿名-セクション名」、カスタムタクソノミーアーカイブページ「p-カスタムタクソノミー名-archive-カスタム投稿名-セクション名」
とする。

※SCSSファイル格納ディレクトリの「templates > テンプレート名 > project」のうち、テンプレート名の付け方は以下の通り。

・投稿ページ「single」
・固定ページ「page」
・アーカイブページ「archive」（タクソノミー毎に分ける場合は、「タクソノミー名-archive」）
・Blog Posts Indexページ「index」
・カスタム投稿ページ「single-カスタム投稿名」
・カスタム投稿アーカイブページ「archive-カスタム投稿名」
・カスタムタクソノミーアーカイブページ「カスタムタクソノミー名-archive-カスタム投稿名」

※SCSSファイル名はセクションの名前でOK。
※カスタムタクソノミーが1つの場合は、「p-taxonomy-archive-カスタム投稿名-セクション名」でOK。