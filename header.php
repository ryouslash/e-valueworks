<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/dist/css/style.css" />
<?php
wp_enqueue_script('jquery'); // jQuery のエンキュー
wp_enqueue_script('main', esc_url(get_template_directory_uri()) . '/dist/js/main.js', array('jquery'), '1.0.0', true); // 共通スクリプト
wp_enqueue_script('top', esc_url(get_template_directory_uri()) . '/dist/js/top.js', array('common'), '1.0.0', true); // トップページ用スクリプト
wp_head(); ?>