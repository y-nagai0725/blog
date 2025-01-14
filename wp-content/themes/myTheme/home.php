<?php get_header(); ?>
<main class="main">
  <div class="wrapper">
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