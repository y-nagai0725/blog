<?php get_header(); ?>
<main class="main">
  <div class="wrapper">
    <?php echo breadcrumb(); ?>
    <div class="container">
      <div class="contents">
        <div class="page-404">
          <h1 class="page-404__title">
            <span class="page-404__title-404">404</span>
            <span class="page-404__title-text">Not Found</span>
          </h1>
          <span class="page-404__text">該当するページが見つかりませんでした。</span>
          <span class="page-404__sub-title">こちらの記事はいかがですか？</span>
          <?php
          $posts = get_posts(array("numberposts" => 4, "orderby" => "rand",));
          ?>
          <ul class="page-404__recommend-list-wrapper">
            <?php foreach ($posts as $post): ?>
              <li class="page-404__recommend-list">
                <a href="<?php echo get_permalink($post->ID) ?>" class="page-404__recommend-link">
                  <div class="page-404__recommend-image-wrapper">
                    <?php
                    $postThumbnail = get_the_post_thumbnail($post->ID, 'large');
                    if ($postThumbnail) {
                      echo $postThumbnail;
                    } else {
                      echo "<img src='" . get_template_directory_uri() . "/images/no-thumbnail.jpg' alt='no-thumbnail'>";
                    }
                    ?>
                  </div>
                  <span class="page-404__recommend-title"><?php echo get_the_title($post->ID) ?></span>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
          <span class="page-404__sub-title">タグからも記事を探していただけます。</span>
          <?php
          $tags = get_tags(array("orderby" => "count", "order" => "DESC"));
          ?>
          <ul class="page-404__tag-list-wrapper">
            <?php foreach ($tags as $tag): ?>
              <li class="page-404__tag-list">
                <a href="<?php echo get_tag_link($tag); ?>" class="page-404__tag-link"><?php echo $tag->name; ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>