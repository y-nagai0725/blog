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
              $allPosts = get_posts(array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC',
              ));

              $postIdList = [];
              foreach ($allPosts as $p) {
                $postIdList[] = $p->ID;
              }

              $currentIndex = array_search($post->ID, $postIdList);
              if ($currentIndex === 0) {
                $prevPostId = $postIdList[$currentIndex + 1];
                $nextPostId = 0;
              } else if ($currentIndex === (count($postIdList) - 1)) {
                $prevPostId = 0;
                $nextPostId = $postIdList[$currentIndex - 1];
              } else {
                $prevPostId = $postIdList[$currentIndex + 1];
                $nextPostId = $postIdList[$currentIndex - 1];
              }

              if ($prevPostId) {
                $prevPostThumbnail = get_the_post_thumbnail($prevPostId, 'large');
                if (!$prevPostThumbnail) {
                  $prevPostThumbnail = "<img src='" . get_template_directory_uri() . "/images/no-thumbnail.jpg' alt='no-thumbnail'>";
                }
              }
              if ($nextPostId) {
                $nextPostThumbnail = get_the_post_thumbnail($nextPostId, 'large');
                if (!$nextPostThumbnail) {
                  $nextPostThumbnail = "<img src='" . get_template_directory_uri() . "/images/no-thumbnail.jpg' alt='no-thumbnail'>";
                }
              }
              if ($prevPostId || $nextPostId): ?>
                <div class="article__post-link-wrapper">
                  <?php if ($prevPostId): ?>
                    <a class="article__post-link prev" href="<?php echo get_permalink($prevPostId) ?>">
                      <div class="article__post-thumbnail-wrapper"><?php echo $prevPostThumbnail ?></div>
                      <span class="article__post-title"><?php echo get_the_title($prevPostId) ?></span>
                    </a>
                  <?php endif; ?>
                  <?php if ($nextPostId): ?>
                    <a class="article__post-link next" href="<?php echo get_permalink($nextPostId) ?>">
                      <div class="article__post-thumbnail-wrapper"><?php echo $nextPostThumbnail ?></div>
                      <span class="article__post-title"><?php echo get_the_title($nextPostId) ?></span>
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

                $recommendPosts = new WP_Query($args);
              }
              if (!$canSearch || !$recommendPosts->have_posts()):
              ?>
                <span class="article__no-text">関連記事はありません</span>
              <?php else: ?>
                <ul class="article__recommend-list-wrapper">
                  <?php while ($recommendPosts->have_posts()) : $recommendPosts->the_post(); ?>
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
                  <?php endwhile;
                  wp_reset_postdata(); ?>
                </ul>
              <?php endif; ?>
            </div>
          </article>
        <?php endif; ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</main>
<?php get_template_part('global-button'); ?>
<?php get_footer(); ?>