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

  register_block_style(
    'core/list',
    array(
      'name'  => 'borderBottom', // スタイル名
      'label' => '下線付き', // スタイルの表示名
    )
  );

  register_block_style(
    'core/paragraph',
    array(
      'name'  => 'point', // スタイル名
      'label' => 'ポイント', // スタイルの表示名
    )
  );
}
add_action('init', 'custom_block_styles');
