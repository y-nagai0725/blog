<?php
//検索結果件数
$count = $wp_query->found_posts;
?>
<?php get_header(); ?>
<main class="main">
  <div class="wrapper">
    <div class="title-area">
      <div class="title-wrapper">
        <h1 class="title">
          <span class="title-keyword"><?php echo get_search_query() ?></span>
          <span class="title-result">検索結果：<?php echo $count; ?>件</span>
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
          <p class="no-loop-text">該当する記事はありませんでした。</p>
        <?php endif; ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>