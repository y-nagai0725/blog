<?php
//テーマのセットアップ
// HTML5でマークアップさせる
add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
// Feedのリンクを自動で生成する
add_theme_support('automatic-feed-links');
//アイキャッチ画像を使用する設定
add_theme_support('post-thumbnails');

function myTheme_enqueue_googleFont()
{

  echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . PHP_EOL;

  echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . PHP_EOL;

  echo '<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Roboto:wght@400;700&display=swap" rel="stylesheet">' . PHP_EOL;
}
add_action('wp_enqueue_scripts', 'myTheme_enqueue_googleFont');

function myTheme_enqueue_style_script()
{

  wp_enqueue_style('main_style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'myTheme_enqueue_style_script');
