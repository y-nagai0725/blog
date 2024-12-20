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
            </div>
          </article>
        <?php endif; ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>