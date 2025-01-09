<form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="searchform">
  <input type="text" name="s" value="<?php the_search_query(); ?>" placeholder="記事検索キーワード" class="searchform-text-box">
  <button type="submit" class="searchform-button"><span class="searchform-button-icon"></span></button>
</form>