<footer id="footer" class="footer">
  <div class="footer__inner">
    <div class="footer__box-wrapper">
      <div class="footer__left-box">
        <a class="footer__title-link" href="<?php echo home_url() ?>">
          <img class="footer__title-image" src="<?php echo get_template_directory_uri() ?>/images/title-logo-white.svg" alt="<?php echo bloginfo("name") ?>">
        </a>
        <span class="footer__sub-title">技術をアウトプットする為の備忘録ブログ</span>
      </div>
      <div class="footer__right-box">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'footer_nav',
          'container' => 'nav',
          'container_class' => 'footer__nav',
        ));
        ?>
        <ul class="footer__sns-wrapper">
          <li class="footer__sns-list">
            <a href="https://github.com/y-nagai0725" class="footer__sns-link" title="github" target="_blank">
              <img src="<?php echo get_template_directory_uri() ?>/images/github-white.svg" alt="github" class="footer__sns-link-image">
            </a>
          </li>
          <li class="footer__sns-list">
            <a href="https://portfolio.mikanbako.jp/" class="footer__sns-link" title="ポートフォリオ" target="_blank">
              <img src="<?php echo get_template_directory_uri() ?>/images/website-white.svg" alt="ポートフォリオ" class="footer__sns-link-image">
            </a>
          </li>
        </ul>
      </div>
    </div>
    <span class="footer__copyright">&copy; 2024 <?php echo bloginfo("name") ?>.</span>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>