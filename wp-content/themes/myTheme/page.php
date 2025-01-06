<?php get_header(); ?>
<main class="main">
  <div class="wrapper">
    <div class="title-area">
      <div class="title-wrapper">
        <h1 class="title">
          <span class="title-en"><?php echo ucwords(get_post(get_the_ID())->post_name); ?></span>
          <span class="title-jp"><?php the_title(); ?></span>
        </h1>
      </div>
    </div>
    <?php echo breadcrumb(); ?>
    <div class="container">
      <div class="contents">
        <?php if (have_posts()): the_post(); ?>
          <div class="page-wrapper">
            <?php the_content(); ?>
          </div>
        <?php endif; ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>