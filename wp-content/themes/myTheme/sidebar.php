<?php
$categories = get_categories();
$posts = get_posts(array("numberposts" => 5,));
?>
<aside id="sidebar" class="sidebar">
  <div class="sidebar__inner">
    <div class="sidebar__author-area">
      <div class="sidebar__author-bg-wrapper">
        <div class="sidebar__author-bg"></div>
        <div class="sidebar__author-image-wrapper">
          <img src="<?php echo get_template_directory_uri() ?>/images/sidebar_profile.png" alt="プロフィール画像" class="sidebar__author-image">
        </div>
      </div>
      <div class="sidebar__author-information">
        <span class="sidebar__author-name">みかん箱</span>
        <span class="sidebar__author-text">サンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプル</span>
        <ul class="sidebar__sns-wrapper">
          <li class="sidebar__sns-list">
            <a href="https://github.com/y-nagai0725" class="sidebar__sns-link" title="github" target="_blank">
              <img src="<?php echo get_template_directory_uri() ?>/images/github.svg" alt="github" class="sidebar__sns-link-image">
            </a>
          </li>
          <li class="sidebar__sns-list">
            <a href="https://portfolio.mikanbako.jp/" class="sidebar__sns-link" title="ポートフォリオ" target="_blank">
              <img src="<?php echo get_template_directory_uri() ?>/images/website.svg" alt="" class="sidebar__sns-link-image">
            </a>
          </li>
        </ul>
      </div>
    </div>
    <h5 class="sidebar__heading">カテゴリー</h5>
    <?php
    wp_nav_menu(array(
      'theme_location' => 'sidebar_nav',
      'container' => false,
      'menu_class' => 'sidebar__category-list',
    ));
    ?>
    <h5 class="sidebar__heading">最新の投稿</h5>
    <ul class="sidebar__post-list">
      <?php foreach ($posts as $post): ?>
        <li class="sidebar__post">
          <a class="sidebar__post-link" href="<?php echo get_permalink($post->ID) ?>">
            <div class="sidebar__post-image-wrapper">
              <?php echo get_the_post_thumbnail($post->ID, 'medium') ?>
            </div>
            <span class="sidebar__post-title"><?php echo get_the_title($post->ID) ?></span>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="sidebar__contents-table-wrapper <?php if (!is_single()): echo "no-display";
                                              endif; ?>">
    <div class="sidebar__close-button-wrapper">
      <button class="sidebar__close-button"><span class="close-button-icon"></span></button>
    </div>
    <div class="sidebar__table-outer">
      <span class="sidebar__table-title">目次</span>
      <ul class="sidebar__contents-table">
      </ul>
    </div>
  </div>
</aside>