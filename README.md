# E-VALUE WORKS CSS設計

## CSS 設計：ベースとして基本は FLOCSS を採用（各フォルダの意味は以下の通り。）

### foundation

リセット系 CSS やベース CSS、変数やブレイクポイントなどを設定しているファイル類。

### layout

header、footer などレイアウトに関連するもの。container などは common.scss に記述。 例）l-header、l-footer

### object ＞ component

2 ページ以上で共通のコンポーネント要素を格納。 例）c-button1、c-title1

### object ＞ project

2 ページ以上で共通のプロジェクト要素を格納。 例）p-gnav、p-postList

### object ＞ utility

utility 要素。

### pages > ページ名 > project

各ページでしか使わないプロジェクト要素を格納。クラス名は「p-ページ名-プロジェクト名」とする。 例）p-top-about、p-about-profile

### pages > ページ名 > \_style.scss

そのページのみのスタイルを記述。

### templates > テンプレート名 > project

固定ページ、投稿、カスタム投稿でしか使わないプロジェクト要素を格納。

テンプレート名の付け方は以下の通り。

- 投稿ページ「single」
- 固定ページ「page」
- アーカイブページ「archive」（タクソノミー毎に分ける場合は、「タクソノミー名-archive」）
- Blog Posts Index ページ「index」
- カスタム投稿ページ「single-カスタム投稿名」
- カスタム投稿アーカイブページ「archive-カスタム投稿名」
- カスタムタクソノミーアーカイブページ「カスタムタクソノミー名-archive-カスタム投稿名」

### templates > テンプレート名 > \_style.scss

そのページのみのスタイルを記述。

※ページ共通のコンポーネント要素やプロジェクト要素で、ページのみのスタイルを追加したい場合、スタイル変更を加えた親コンテンツのいずれかに「page-ページ名」「t-テンプレート名」をつけて\_style.scss にスタイルを記述する。

## クラス名の付与ルール

クラス名は以下のルールで接頭辞を付与するものとする。

- 固定ページ「p-page-プロジェクト名」
- 投稿詳細ページ「p-single-プロジェクト名」
- 投稿アーカイブ「p-archive-プロジェクト名」（Date、Category、Tag、Author を分けない場合）、「p-タクソノミー名-archive-プロジェクト名」（Date、Category、Tag、Author を分ける場合）
- Blog Posts Index ページ「p-index-archive」
- カスタム投稿詳細ページ「p-single-カスタム投稿名-プロジェクト名」
- カスタム投稿アーカイブページ「p-archive-カスタム投稿名-プロジェクト名」
- カスタムタクソノミーアーカイブページ「p-カスタムタクソノミー名-archive-カスタム投稿名-プロジェクト名」

※「p-archve-work-work」（カスタム投稿「work」アーカイブテンプレート内の実績セクションの場合） などになる場合は、2 回繰り返さず「p-archive-work」で OK。

※カスタムタクソノミーが 1 つの場合は、「p-taxonomy-archive-カスタム投稿名-プロジェクト名」で OK。
