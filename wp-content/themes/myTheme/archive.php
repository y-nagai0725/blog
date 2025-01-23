<?php
$count = $wp_query->found_posts;

if (is_category()) {
  $archiveTitle = "カテゴリー：" . get_queried_object()->name;
} elseif (is_tag()) {
  $archiveTitle = "タグ：" . get_queried_object()->name;
} elseif (is_year()) {
  $archiveTitle = get_the_time("Y年");
} elseif (is_month()) {
  $archiveTitle = get_the_time("Y年n月");
} elseif (is_day()) {
  $archiveTitle = get_the_time("Y年n月j日");
} elseif (is_author()) {
  $authorId = get_query_var('author');
  $authorName = get_the_author_meta('display_name', $authorId);
  $archiveTitle = "投稿者:" . $authorName;
}
?>
<?php get_header(); ?>
<main class="main">
  <div class="wrapper">
    <div class="title-area">
      <div class="title-wrapper">
        <h1 class="title">
          <span class="title-keyword"><?php echo $archiveTitle ?></span>
          <span class="title-result">記事一覧：<?php echo $count . "件" ?></span>
        </h1>
      </div>
    </div>
    <?php echo breadcrumb(); ?>
    <div class="container">
      <div class="contents">
        <?php if ($count): ?>
          <ul class="loop-contents">
            <?php
            if (have_posts()) {
              while (have_posts()) {
                the_post();
                get_template_part('loop-content');
              }
            }
            ?>
          </ul>
          <div class="pagination">
            <?php
            echo paginate_links(
              array(
                'type' => 'list',
                'mid_size' => '1',
                'prev_text' => '',
                'next_text' => ''
              )
            );
            ?>
          </div>
        <?php else: ?>
          <div class="no-results">
            <span class="no-results__message">該当する記事はありませんでした。<br>別のキーワードで検索してみてください。</span>
            <span class="no-results__sub-title">こちらの記事はいかがですか？</span>
            <?php
            $posts = get_posts(array("numberposts" => 4, "orderby" => "rand",));
            ?>
            <ul class="no-results__recommend-list-wrapper">
              <?php foreach ($posts as $post): ?>
                <li class="no-results__recommend-list">
                  <a href="<?php echo get_permalink($post->ID) ?>" class="no-results__recommend-link">
                    <div class="no-results__recommend-image-wrapper">
                      <?php
                      $postThumbnail = get_the_post_thumbnail($post->ID, 'large');
                      if ($postThumbnail) {
                        echo $postThumbnail;
                      } else {
                        echo "<img src='" . get_template_directory_uri() . "/images/no-thumbnail.jpg' alt='no-thumbnail'>";
                      }
                      ?>
                    </div>
                    <span class="no-results__recommend-title"><?php echo get_the_title($post->ID) ?></span>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
            <span class="no-results__sub-title">タグからも記事を探していただけます。</span>
            <?php
            $tags = get_tags(array("orderby" => "count", "order" => "DESC"));
            ?>
            <ul class="no-results__tag-list-wrapper">
              <?php foreach ($tags as $tag): ?>
                <li class="no-results__tag-list">
                  <a href="<?php echo get_tag_link($tag); ?>" class="no-results__tag-link"><?php echo $tag->name; ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>