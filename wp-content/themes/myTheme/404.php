<?php get_header(); ?>
<main class="main">
  <div class="wrapper">
    <?php echo breadcrumb(); ?>
    <div class="container">
      <div class="contents">
        <div class="page-404-contents">
          <h1 class="title">
            <span class="title-404">404</span>
            <span class="title-text">Not Found</span>
          </h1>
          <p class="text">該当するページが見つかりませんでした。</p>
        </div>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>