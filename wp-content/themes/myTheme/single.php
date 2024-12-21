<?php get_header(); ?>
<main class="main">
  <div class="wrapper">
    <div class="container">
      <div class="contents">
        <?php if (have_posts()): the_post(); ?>
          <article <?php post_class('article'); ?>>
            <div class="article__header">
              <div class="article__thumbnail-wrapper">
                <?php if (has_category()): ?>
                  <span class="article__category-tag"><?php echo get_the_category()[0]->name ?></span>
                <?php endif; ?>
                <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail('large');
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
              if ($prevPost || $nextPost): ?>
                <div class="article__post-link-wrapper">
                  <?php if ($prevPost): ?>
                    <a class="article__post-link prev" href="<?php echo get_permalink($prevPost->ID) ?>">
                      <div class="article__post-thumbnail-wrapper"><?php echo get_the_post_thumbnail($prevPost->ID, 'thumbnail') ?></div>
                      <span class="article__post-title"><?php echo get_the_title($prevPost->ID) ?></span>
                    </a>
                  <?php endif; ?>
                  <?php if ($nextPost): ?>
                    <a class="article__post-link next" href="<?php echo get_permalink($nextPost->ID) ?>">
                      <span class="article__post-title"><?php echo get_the_title($nextPost->ID) ?></span>
                      <div class="article__post-thumbnail-wrapper"><?php echo get_the_post_thumbnail($nextPost->ID, 'thumbnail') ?></div>
                    </a>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
              <span class="article__recommend-text">RECOMMEND</span>
              <?php
              $posts = get_posts(array("numberposts" => 4, "category" => get_the_category()[0]->ID, "exclude" => get_the_ID()));
              if (!$posts):
              ?>
                <span class="article__no-text">関連記事はありません</span>
              <?php else: ?>
                <ul class="article__recommend-list-wrapper">
                  <?php for ($i = 0; $i < count($posts); $i++): ?>
                    <li class="article__recommend-list">
                      <a href="<?php echo get_permalink($posts[$i]->ID) ?>" class="article__recommend-link">
                        <div class="article__recommend-image-wrapper">
                          <?php echo get_the_post_thumbnail($posts[$i]->ID, 'thumbnail') ?>
                        </div>
                        <span class="article__recommend-title"><?php echo get_the_title($posts[$i]->ID) ?></span>
                      </a>
                    </li>
                  <?php endfor; ?>
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
<?php get_footer(); ?>