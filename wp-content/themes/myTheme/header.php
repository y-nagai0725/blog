<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php get_template_part('meta-data'); ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header id="header" class="header">
    <div class="header__inner">
      <?php
      if (is_home() || is_front_page()) {
        $title_tag = "h1";
      } else {
        $title_tag = "p";
      }
      ?>
      <<?php echo $title_tag ?> class="header__title">
        <a class="header__title-link" href="<?php echo home_url() ?>">
          <img class="header__title-image" src="<?php echo get_template_directory_uri() ?>/images/title-logo-black.svg" alt="<?php echo bloginfo("name") ?>" width="150" height="20">
        </a>
      </<?php echo $title_tag ?>>
      <div class="header__right-box">
        <div class="header__category-wrapper">
          <p class="header__category">カテゴリー</p>
          <?php
          wp_nav_menu(array(
            'theme_location' => 'header_nav',
            'container' => 'nav',
            'container_class' => 'header__nav',
          ));
          ?>
        </div>
        <div class="header__searchform-wrapper">
          <?php get_search_form(); ?>
        </div>
        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="header__contact-link">お問い合わせ</a>
        <button class="header__search-button"><span class="header__search-button-icon"></span></button>
        <button class="header__hamburger-menu-button"><span class="header__hamburger-menu-button-icon"></span></button>
      </div>
    </div>
    <div class="header__mask"></div>
    <div class="header__nav-sp-wrapper">
      <button class="header__close-button"><span class="header__close-button-icon"></span></button>
      <?php
      wp_nav_menu(array(
        'theme_location' => 'header_nav-sp',
        'container' => 'nav',
        'container_class' => 'header__nav-sp',
      ));
      ?>
    </div>
  </header>