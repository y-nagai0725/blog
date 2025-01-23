<?php get_header(); ?>
<main class="main">
  <div class="wrapper">
    <?php echo breadcrumb(); ?>
    <div class="container">
      <div class="contents">
        <?php if (have_posts()): the_post(); ?>
          <article <?php post_class('article'); ?>>
            <div class="article__header">
              <div class="article__thumbnail-wrapper">
                <?php if (has_category()): ?>
                  <a class="article__category-tag" href="<?php echo get_category_link(get_the_category()[0]->term_id) ?>"><?php echo get_the_category()[0]->name ?></a>
                <?php endif; ?>
                <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail('large');
                } else {
                  echo "<img src='" . get_template_directory_uri() . "/images/no-thumbnail.jpg' alt='no-thumbnail'>";
                }
                ?>
              </div>
              <h1 class="article__title"><?php the_title(); ?></h1>
              <div class="article__date-wrapper">
                <span class="article__post-date"><?php echo get_the_date("Y.m.d") ?></span>
                <?php if (get_the_date("Y.m.d") !== get_the_modified_time("Y.m.d")): ?>
                  <span class="article__modified-date"><?php echo get_the_modified_time("Y.m.d") ?></span>
                <?php endif; ?>
              </div>
            </div>
            <div class="article__main">
              <?php the_content(); ?>
            </div>
            <div class="article__footer">
              <?php if (has_category()): ?>
                <div class="article__category-wrapper">
                  <?php the_category(); ?>
                </div>
              <?php endif; ?>
              <?php if (has_tag()): ?>
                <div class="article__tag-wrapper">
                  <?php the_tags('<ul><li>', '</li><li>', '</li></ul>'); ?>
                </div>
              <?php endif; ?>
              <?php
              $prevPost = get_adjacent_post(true, '', true);
              $nextPost = get_adjacent_post(true, '', false);
              if ($prevPost) {
                $prevPostThumbnail = get_the_post_thumbnail($prevPost->ID, 'large');
                if (!$prevPostThumbnail) {
                  $prevPostThumbnail = "<img src='" . get_template_directory_uri() . "/images/no-thumbnail.jpg' alt='no-thumbnail'>";
                }
              }
              if ($nextPost) {
                $nextPostThumbnail = get_the_post_thumbnail($nextPost->ID, 'large');
                if (!$nextPostThumbnail) {
                  $nextPostThumbnail = "<img src='" . get_template_directory_uri() . "/images/no-thumbnail.jpg' alt='no-thumbnail'>";
                }
              }
              if ($prevPost || $nextPost): ?>
                <div class="article__post-link-wrapper">
                  <?php if ($prevPost): ?>
                    <a class="article__post-link prev" href="<?php echo get_permalink($prevPost->ID) ?>">
                      <div class="article__post-thumbnail-wrapper"><?php echo $prevPostThumbnail ?></div>
                      <span class="article__post-title"><?php echo get_the_title($prevPost->ID) ?></span>
                    </a>
                  <?php endif; ?>
                  <?php if ($nextPost): ?>
                    <a class="article__post-link next" href="<?php echo get_permalink($nextPost->ID) ?>">
                      <div class="article__post-thumbnail-wrapper"><?php echo $nextPostThumbnail ?></div>
                      <span class="article__post-title"><?php echo get_the_title($nextPost->ID) ?></span>
                    </a>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
              <span class="article__recommend-text">関連記事</span>
              <?php
              $canSearch = false;
              if (has_category() && has_tag()) {
                $canSearch = true;
                $tagIdList = array();
                foreach (get_the_tags() as $tag) {
                  array_push($tagIdList, $tag->term_id);
                }
                $args = array(
                  'posts_per_page' => 4,
                  'cat' => get_the_category()[0]->cat_ID,
                  'tag__in' => $tagIdList,
                  'post__not_in' => array(get_the_ID()),
                  'order' => 'DESC',
                  'orderby' => 'ID'
                );

                $wp_query = new WP_Query($args);
              }
              if (!$canSearch || !$wp_query->have_posts()):
              ?>
                <span class="article__no-text">関連記事はありません</span>
              <?php else: ?>
                <ul class="article__recommend-list-wrapper">
                  <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                    <li class="article__recommend-list">
                      <a href="<?php echo the_permalink() ?>" class="article__recommend-link">
                        <div class="article__recommend-image-wrapper">
                          <?php
                          if (has_post_thumbnail()) {
                            the_post_thumbnail('large');
                          } else {
                            echo "<img src='" . get_template_directory_uri() . "/images/no-thumbnail.jpg' alt='no-thumbnail'>";
                          }
                          ?>
                        </div>
                        <span class="article__recommend-title"><?php echo the_title() ?></span>
                      </a>
                    </li>
                  <?php endwhile; ?>
                </ul>
              <?php endif;
              wp_reset_postdata(); ?>
            </div>
          </article>
        <?php endif; ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>