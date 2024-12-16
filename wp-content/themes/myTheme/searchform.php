<form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="searchform">
  <input type="text" name="s" value="<?php the_search_query(); ?>" placeholder="記事検索キーワード" id="s" class="searchform-text-box">
  <button type="submit" id="s" class="searchform-button"></button>
</form>