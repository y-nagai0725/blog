<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <a href="<?php echo home_url() ?>">
          <img src="<?php echo get_template_directory_uri() ?>/images/logo_black.svg" alt="<?php echo bloginfo("name") ?>">
        </a>
      </<?php echo $title_tag ?>>
    </div>
  </header>