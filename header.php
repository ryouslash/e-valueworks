<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/dist/css/style.css" />
<?php
wp_enqueue_script('jquery'); // jQuery のエンキュー
wp_enqueue_script('common', esc_url(get_template_directory_uri()) . '/dist/js/common.js', array('jquery'), true); // 共通スクリプト
wp_enqueue_script('top', esc_url(get_template_directory_uri()) . '/dist/js/top.js', array('common'), true); // トップページ用スクリプト
wp_head(); ?>