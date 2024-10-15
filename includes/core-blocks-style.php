<?php
//コアブロックに独自スタイルの追加
function custom_block_styles()
{
  // 独自のブロックスタイルを登録する
  register_block_style(
    'core/image',
    array(
      'name'  => 'shadow', // スタイル名
      'label' => 'シャドウ', // スタイルの表示名
    )
  );
}
add_action('init', 'custom_block_styles');
