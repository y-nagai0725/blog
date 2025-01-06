<?php get_header(); ?>
<main class="main">
  <div class="wrapper">
    <div class="title-area">
      <div class="title-wrapper">
        <h1 class="title"><?php the_title(); ?></h1>
      </div>
    </div>
    <?php echo breadcrumb(); ?>
    <div class="container">
      <div class="contents">
        <?php if (have_posts()): the_post(); ?>
          <div class="page">
            <?php the_content(); ?>
          </div>
        <?php endif; ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>