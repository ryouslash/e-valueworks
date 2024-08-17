E-VALUE WORKS Web サイト

構成ページ：トップページ / アバウトページ / サービスページ / お知らせ（カスタム投稿） / お知らせ一覧（カスタム投稿一覧） / カスタムタクソノミー一覧 / 実績（カスタム投稿） / 実績一覧（カスタム投稿一覧） / プライバシーポリシー / 404
サイト仕様：WordPress 導入 / レスポンシブ Web デザイン / 常時 SSL
技術スタック：HTML / CSS / FLOCSS / JavaScript / jQuery / PHP / WordPress / Webpack
CSS 設計：ベースとして FLOCSS を採用

◾️foundation→ リセット系 CSS やベース CSS、変数やブレイクポイントなどを設定しているファイル類。

◾️layout→header、footer などレイアウトに関連するもの。container などは common.scss に記述。ブロックエディターのコンテンツ部分の余白デザイン調整は、blockeditor.scss に記述。

◾️object ＞ component→2 ページ以上で共通のコンポーネント要素。

◾️object ＞ project→2 ページ以上で共通のプロジェクト要素。

◾️object ＞ utility→utility 要素。

◾️pages→ 各ページのみの要素。各ページフォルダには project フォルダも含み、各ページ固有のセクションに関してはこの中に SCSS ファイルを追加。

※異なるページ間で同じセクションが存在する場合、トップページでは「p-セクション名」、下層ページでは「p-ページ名-セクション名」とする。
