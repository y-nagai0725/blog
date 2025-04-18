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
add_action('pre_get_posts', 'custom_search_include_custom_post_type');
add_action('pre_get_posts', 'custom_get_posts');

register_nav_menu('header_nav', 'ヘッダー');
register_nav_menu('header_nav-sp', 'ヘッダーsp');
register_nav_menu('footer_nav', 'フッター');

add_shortcode("article_link", "article_link_shortcode");
add_shortcode("emphasis_area", "emphasis_area_shortcode");
add_shortcode("list_area", "list_area_shortcode");
add_shortcode("step_area", "step_area_shortcode");

add_filter('wp_img_tag_add_auto_sizes', '__return_false');

function myTheme_enqueue_googleFont()
{

  echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . PHP_EOL;

  echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . PHP_EOL;

  echo '<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Roboto:wght@400;700&family=Source+Code+Pro:wght@200..900&display=swap" rel="stylesheet">' . PHP_EOL;
}

function myTheme_enqueue_style_script()
{

  wp_enqueue_style('main_style', get_template_directory_uri() . '/style.css');
  wp_enqueue_script('header_script', get_template_directory_uri() . '/js/header.js', array(), '1.0.0', true);
  wp_enqueue_script('common_script', get_template_directory_uri() . '/js/common.js', array(), '1.0.0', true);

  if (is_single()) {
    wp_enqueue_script('contents_table_script', get_template_directory_uri() . '/js/contents-table.js', array(), '1.0.0', true);
  }
}

function breadcrumb()
{
  if (is_front_page() || is_home()) {
    // トップページの場合何も表示しない
    return;
  }

  $html = '<div class="breadcrumb"><ul>';
  $home = '<li><a href="' . home_url() . '">HOME</a></li>';
  $html .= $home;

  if (is_category() || is_tag()) {
    // カテゴリページ・タグページ
    $html .= '<li>' . get_queried_object()->name . '</li>';
  } else if (is_search()) {
    // 検索結果ページ
    if (get_search_query()) {
      $html .= '<li>' . get_search_query() . '</li>';
    } else {
      $html .= '<li>' . "キーワードなし" . '</li>';
    }
  } else if (is_single()) {
    // 投稿ページ
    $category = get_the_category();

    if ($category) {
      $html .= '<li><a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->name . '</a></li>';
    }

    $html .= '<li>' . get_the_title() . '</li>';
  } else if (is_page()) {
    // 固定ページ
    $html .= '<li>' . get_the_title() . '</li>';
  } else if (is_404()) {
    // 404ページ
    $html .= '<li>404</li>';
  }

  $html .= '</ul></div>';
  return $html;
}

function article_link_shortcode($atts)
{
  $atts = shortcode_atts(array(
    "id" => "",
    "hash" => "",
  ), $atts);

  $id = $atts["id"];
  $href = get_permalink($id);
  if (!empty($atts["hash"])) {
    $href .= $atts["hash"];
  }
  $title = get_the_title($id);
  $thumbnail = get_the_post_thumbnail($id, "medium");
  $postDate = get_the_date("Y.m.d", $id);
  $modifiedDate = get_the_modified_date("Y.m.d", $id);
  $html = <<< EOM
  <a href="{$href}" class="article-link">
    <div class="thumbnail-wrapper">{$thumbnail}</div>
    <div class="information">
      <span class="title">{$title}</span>
      <div class="date-wrapper">
        <span class="post-date">{$postDate}</span>
        <span class="modified-date">{$modifiedDate}</span>
      </div>
    </div>
  </a>
  EOM;

  return $html;
}

function emphasis_area_shortcode($atts)
{
  $atts = shortcode_atts(array(
    "text" => "",
    "list" => "",
    "list_mark" => "1",
    "mark" => "1",
    "type" => "1",
    "reverse" => "1",
    "link_text" => "",
    "link_text_link" => "",
    "link_text_description" => "",
  ), $atts);

  $textHtml = "";
  if (!empty($atts["text"])) {
    $textHtml = '<span class="text">' . $atts["text"] . '</span>';
  }
  if (!empty($atts["link_text"]) && !empty($atts["link_text_link"])) {
    $textHtml = '<p class="link-text"><a href="' . $atts["link_text_link"] . '" target="_blank">' . $atts["link_text"] . '</a>' . $atts["link_text_description"] . '</p>';
  }

  $listMark = "";
  if ($atts["list_mark"] === "1") {
    $listMark = "circle-mark";
  } else if ($atts["list_mark"] === "2") {
    $listMark = "check-mark";
  } else if ($atts["list_mark"] === "3") {
    $listMark = "number-mark";
  }

  $listHtml = "";
  if (!empty($atts["list"])) {
    $listHtml = '<ul class="list-area">';
    $list = explode(",", $atts["list"]);
    for ($i = 0; $i < count($list); $i++) {
      $listHtml .= '<li class="' . $listMark . '">' . $list[$i] . '</li>';
    }
    $listHtml .= '</ul>';
  }

  if ($atts["mark"] === "1") {
    $mark = " mark";
  } else {
    $mark = "";
  }

  $typeArray = array("1" => "emphasis", "2" => "check", "3" => "attention", "4" => "note", "5" => "hint", "0" => "normal");
  if (array_key_exists($atts["type"], $typeArray)) {
    $type = " " . $typeArray[$atts["type"]];
  } else {
    $type = "";
  }

  if ($atts["reverse"] === "1") {
    $reverse = false;
  } else {
    $reverse = true;
  }

  $html = '<div class="emphasis-area' . $mark . $type . '">';
  if ($reverse) {
    $html .= $listHtml;
    $html .= $textHtml;
  } else {
    $html .= $textHtml;
    $html .= $listHtml;
  }
  $html .= '</div>';

  return $html;
}

function list_area_shortcode($atts)
{
  $atts = shortcode_atts(array(
    "type" => "1",
    "items" => "",
  ), $atts);

  if ($atts["type"] === "1") {
    $type = "circle-mark";
  } else if ($atts["type"] === "2") {
    $type = "check-mark";
  } else if ($atts["type"] === "3") {
    $type = "number-mark";
  } else {
    $type = "no-mark";
  }

  $list = "";
  if (!empty($atts["items"])) {
    $list = explode(",", $atts["items"]);
  }

  $html = '<ul class="list-area">';
  if (!empty($list)) {
    for ($i = 0; $i < count($list); $i++) {
      $html .= '<li class="' . $type . '">' . $list[$i] . '</li>';
    }
  }
  $html .= '</ul>';

  return $html;
}

function step_area_shortcode($atts)
{
  $atts = shortcode_atts(array(
    "list" => "",
    "type" => "1",
  ), $atts);

  $list = "";
  if (!empty($atts["list"])) {
    $list = explode(",", $atts["list"]);
  } else {
    return;
  }

  if ($atts["type"] === "1") {
    $html = '<ul class="step-area-square">';
    for ($i = 0; $i < count($list); $i++) {
      $html .= '<li><div class="step-square"><span class="step">STEP</span><span class="number">' . ($i + 1) . '</span></div><span class="text">' . $list[$i] . '</span></li>';
    }
    $html .= '</ul>';
  } else if ($atts["type"] === "2") {
    $html = '<ul class="step-area-circle">';
    for ($i = 0; $i < count($list); $i++) {
      $html .= '<li><span class="step">STEP ' . ($i + 1) . '</span><span class="text">' . $list[$i] . '</span></li>';
    }
    $html .= '</ul>';
  }

  return $html;
}

function custom_search_include_custom_post_type($query)
{
  if (!is_admin() && $query->is_main_query() && $query->is_search()) {
    // 検索対象を投稿ページのみにする
    $query->set('post_type', 'post');
    $query->set('orderby', array("date" => "DESC", "ID" => "DESC"));
  }
}

function custom_get_posts($query)
{
  if (!is_admin() && $query->is_main_query() && (is_home() || is_archive())) {
    $query->set('orderby', array("date" => "DESC", "ID" => "DESC"));
  }
}
