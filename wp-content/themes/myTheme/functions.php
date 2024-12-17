<?php
//テーマのセットアップ
// HTML5でマークアップさせる
add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
// Feedのリンクを自動で生成する
add_theme_support('automatic-feed-links');
//アイキャッチ画像を使用する設定
add_theme_support('post-thumbnails');

add_action('wp_enqueue_scripts', 'myTheme_enqueue_googleFont');
add_action('wp_enqueue_scripts', 'myTheme_enqueue_style_script');

register_nav_menu('header_nav', 'ヘッダー');
register_nav_menu('header_nav-sp', 'ヘッダーsp');
register_nav_menu('footer_nav', 'フッター');






function myTheme_enqueue_googleFont()
{

  echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . PHP_EOL;

  echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . PHP_EOL;

  echo '<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Roboto:wght@400;700&family=Source+Code+Pro:wght@200..900&display=swap" rel="stylesheet">' . PHP_EOL;
}


function myTheme_enqueue_style_script()
{

  wp_enqueue_style('main_style', get_template_directory_uri() . '/style.css');
  wp_enqueue_script('header_script', get_template_directory_uri() . '/js/header-script.js', array(), '1.0.0', true);
}
