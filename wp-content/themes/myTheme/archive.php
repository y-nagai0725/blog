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
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>