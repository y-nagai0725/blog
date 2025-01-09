<li class="loop-item">
  <a href="<?php the_permalink() ?>" class="article-link">
    <div class="article-thumbnail-wrapper">
      <?php if (has_category()): ?>
        <span class="article-category"><?php echo get_the_category()[0]->name ?></span>
      <?php endif; ?>
      <?php
      if (has_post_thumbnail()) {
        the_post_thumbnail('large');
      } else {
        echo "<img src='" . get_template_directory_uri() . "/images/no-thumbnail.jpg' alt='no-thumbnail'>";
      }
      ?>
    </div>
    <div class="article-text-wrapper">
      <h2 class="article-title"><?php the_title(); ?></h2>
      <div class="article-date-wrapper">
        <span class="post-date"><?php echo get_the_date("Y.m.d") ?></span>
        <?php if (get_the_date("Y.m.d") !== get_the_modified_time("Y.m.d")): ?>
          <span class="modified-date"><?php echo get_the_modified_time("Y.m.d") ?></span>
        <?php endif; ?>
      </div>
    </div>
  </a>
</li>