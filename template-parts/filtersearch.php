<?php
//どのテンプレートからでも呼び出せるようにグローバル変数を定義
global $search_args, $c_post, $tax_type01, $tax_type02, $tax_type03, $tax_type04, $param_page_terms, $param_price_terms, $param_language_terms, $param_specification_terms;

$c_post     = 'work'; // カスタム投稿【work】
$tax_type01 = 'page'; // タクソノミー【page】
$tax_type02 = 'price'; // タクソノミー【price】
$tax_type03 = 'language'; // タクソノミー【language】
$tax_type04 = 'specification'; // タクソノミー【specification】

$search_args = array(
  'post_type'      => $c_post, //カスタム投稿
  'post_status'    => 'publish',
  'posts_per_page' => -1,
);

//カスタムタクソノミー【 page 】部分にあるチェックボックスの内容を取得
$param_page_terms = array();
if (! empty($_GET[$tax_type01])) {
  foreach ($_GET[$tax_type01] as $value) {
    $param_page_terms[] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
  }
  $tax_query_args[] = array(
    'taxonomy'         => $tax_type01,
    'terms'            => $param_page_terms,
    'include_children' => true,
    'field'            => 'slug',
    'operator'         => 'IN',
  );
}

//カスタムタクソノミー【 price 】部分にあるチェックボックスの内容を取得
$param_price_terms = array();
if (! empty($_GET[$tax_type02])) {
  foreach ($_GET[$tax_type02] as $value) {
    $param_price_terms[] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
  }
  $tax_query_args[] = array(
    'taxonomy'         => $tax_type02,
    'terms'            => $param_price_terms,
    'include_children' => true,
    'field'            => 'slug',
    'operator'         => 'IN',
  );
}


//カスタムタクソノミー【 language 】部分にあるチェックボックスの内容を取得
$param_language_terms = array();
if (! empty($_GET[$tax_type03])) {
  foreach ($_GET[$tax_type03] as $value) {
    $param_language_terms[] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
  }
  $tax_query_args[] = array(
    'taxonomy'         => $tax_type03,
    'terms'            => $param_language_terms,
    'include_children' => true,
    'field'            => 'slug',
    'operator'         => 'IN',
  );
}

//カスタムタクソノミー【 specification 】部分にあるチェックボックスの内容を取得
$param_specification_terms = array();
if (! empty($_GET[$tax_type04])) {
  foreach ($_GET[$tax_type04] as $value) {
    $param_specification_terms[] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
  }
  $tax_query_args[] = array(
    'taxonomy'         => $tax_type04,
    'terms'            => $param_specification_terms,
    'include_children' => true,
    'field'            => 'slug',
    'operator'         => 'IN',
  );
}


//カスタムタクソノミーそれぞれの情報をセットする
if (! empty($_GET[$tax_type01]) || ! empty($_GET[$tax_type02]) || ! empty($_GET[$tax_type03]) || ! empty($_GET[$tax_type04])) {
  $search_args['tax_query'] = array_merge(
    array('relation' => 'AND'),
    $tax_query_args
  );
}
