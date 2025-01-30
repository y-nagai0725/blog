<?php
$categories = get_categories(array("orderby" => "count", "order" => "DESC"));
$posts = get_posts(array("numberposts" => 5,));
?>
<aside id="sidebar" class="sidebar">
  <div class="sidebar__inner">
    <div class="sidebar__author-area">
      <div class="sidebar__author-bg-wrapper">
        <div class="sidebar__author-bg"></div>
        <div class="sidebar__author-image-wrapper">
          <img src="<?php echo get_template_directory_uri() ?>/images/sidebar_profile.png" alt="プロフィール画像" class="sidebar__author-image" width="90" height="70">
        </div>
      </div>
      <div class="sidebar__author-information">
        <span class="sidebar__author-name">管理者：みかん箱</span>
        <span class="sidebar__author-text">北海道札幌市在住。<br>web制作技術の定着の為、記事としてまとめアウトプットしていきます。最近はGSAPとWordPress勉強中です。</span>
        <ul class="sidebar__sns-wrapper">
          <li class="sidebar__sns-list">
            <a href="https://github.com/y-nagai0725" class="sidebar__sns-link" title="GitHub" target="_blank">
              <img src="<?php echo get_template_directory_uri() ?>/images/github-blue.svg" alt="github" class="sidebar__sns-link-image" width="26" height="26"><span class="sidebar__sns-link-text">GitHub</span>
            </a>
          </li>
          <li class="sidebar__sns-list">
            <a href="https://portfolio.mikanbako.jp/" class="sidebar__sns-link" title="ポートフォリオ" target="_blank">
              <img src="<?php echo get_template_directory_uri() ?>/images/website-blue.svg" alt="ポートフォリオ" class="sidebar__sns-link-image" width="26" height="26"><span class="sidebar__sns-link-text">Portfolio</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <h5 class="sidebar__heading">カテゴリー</h5>
    <ul class="sidebar__category-list">
      <?php foreach ($categories as $category): ?>
        <li><a href="<?php echo get_category_link($category) ?>" data-count="<?php echo $category->count ?>"><?php echo $category->name; ?></a></li>
      <?php endforeach; ?>
    </ul>
    <h5 class="sidebar__heading">最新の投稿</h5>
    <ul class="sidebar__post-list">
      <?php foreach ($posts as $post): ?>
        <li class="sidebar__post">
          <a class="sidebar__post-link" href="<?php echo get_permalink($post->ID) ?>">
            <div class="sidebar__post-image-wrapper">
              <?php if ($thumbnail = get_the_post_thumbnail($post->ID, 'medium')): ?>
                <?php echo $thumbnail ?>
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri() ?>/images/no-thumbnail.jpg" alt="no-thumbnail">
              <?php endif; ?>
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