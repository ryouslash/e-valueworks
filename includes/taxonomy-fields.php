<?php

/**
 * 新規カテゴリー、タグ追加画面にカスタムフィールドを追加
 */
function add_term_thumbnail_field()
{
?>
  <div class="form-field term-thumbnail-wrap">
    <label for="term_thumbnail">ページヘッダー画像</label>
    <input type="text" name="term_thumbnail" id="term_thumbnail" value="" class="regular-text">
    <button class="button term-thumbnail-upload" type="button">画像を選択</button>
    <p id=" thumbanil-description">ここに設定した画像がカテゴリー一覧ページ、投稿ページのページヘッダー画像として表示されます。</p>
  </div>
<?php
}
add_action('category_add_form_fields', 'add_term_thumbnail_field'); // カテゴリーの追加画面用
add_action('post_tag_add_form_fields', 'add_term_thumbnail_field'); // タグの追加画面用

/**
 * カテゴリー、タグ編集画面にカスタムフィールドを追加
 */
function edit_term_thumbnail_field($term)
{
  $thumbnail_url = get_term_meta($term->term_id, 'term_thumbnail', true);
?>
  <tr class="form-field term-thumbnail-wrap">
    <th scope="row" valign="top"><label for="term_thumbnail">ページヘッダー画像</label></th>
    <td>
      <input type="text" name="term_thumbnail" id="term_thumbnail" value="<?php echo esc_attr($thumbnail_url); ?>" class="regular-text">
      <button class="button term-thumbnail-upload" type="button">画像を選択</button>
      <p id="thumbanil-description">ここに設定した画像がカテゴリー一覧ページ、投稿ページのページヘッダー画像として表示されます。</p>
    </td>
  </tr>
<?php
}
add_action('category_edit_form_fields', 'edit_term_thumbnail_field'); // カテゴリーの追加画面用
add_action('post_tag_edit_form_fields', 'edit_term_thumbnail_field'); // タグの編集画面用

/**
 * カテゴリーとタグのカスタムフィールドの値を保存
 */
function save_term_thumbnail($term_id)
{
  if (isset($_POST['term_thumbnail'])) {
    update_term_meta($term_id, 'term_thumbnail', esc_url($_POST['term_thumbnail']));
  }
}

add_action('created_category', 'save_term_thumbnail'); // 新しいカテゴリーが作成されたとき
add_action('edited_category', 'save_term_thumbnail'); // 既存のカテゴリーが編集されたとき
add_action('created_post_tag', 'save_term_thumbnail'); // 新しいタグが作成されたとき
add_action('edited_post_tag', 'save_term_thumbnail'); // 既存のタグが編集されたとき
