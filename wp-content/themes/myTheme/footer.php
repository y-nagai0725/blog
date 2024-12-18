<footer id="footer" class="footer">
  <div class="footer__inner">
    <a class="footer__title-link" href="<?php echo home_url() ?>">
      <img class="footer__title-image" src="<?php echo get_template_directory_uri() ?>/images/title-logo-white.svg" alt="<?php echo bloginfo("name") ?>">
    </a>
    <?php
    wp_nav_menu(array(
      'theme_location' => 'footer_nav',
      'container' => 'nav',
      'container_class' => 'footer__nav',
    ));
    ?>
    <p class="footer__copyright">&copy; 2024 <?php echo bloginfo("name") ?>.</p>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>