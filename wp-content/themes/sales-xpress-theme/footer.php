<footer class="footer flex-center">
  <img class="dots-svg" src="<?php echo get_theme_file_uri('/images/dots.svg') ?>" alt="Dot Patterns">

  <img class="circles-svg" src="<?php echo get_theme_file_uri('/images/circles.svg') ?>" alt="Circles Pattern">

  <div class="container">
    <div class="cta-section flex-center">
      <h2 class="text-grey--600">
        Want to try our service?
      </h2>
      <p>Get control over your customer experience and satisfaction now! Use our services for free for the first month, we’re sure you’ll want to stay. Cancellation whenever.</p>
      <button class="cta--btn"><a href="#">Start A Free Trial</a></button>
    </div>
    <div class="footer-nav">
      <div class="footer-logo-box">
        <a href="#" class="logo">
          <img src="<?php echo get_theme_file_uri('/images/Logo.svg') ?>" alt="Logo">
        </a>
        <ul class="social-list">
          <li>
            <a href="https://www.facebook.com/">
              <img src="<?php echo get_theme_file_uri('/images/facebook-logo.svg') ?>" alt="Facebook Logo">
            </a>
          </li>
          <li>
            <a href="https://www.instagram.com/starter_code">
              <img src="<?php echo get_theme_file_uri('/images/instagram-logo.svg') ?>" alt="Instagram Logo">
            </a>
          </li>
          <li>
            <a href="https://twitter.com/starter_code">
              <img src="<?php echo get_theme_file_uri('/images/twitter-logo.svg') ?>" alt="Twitter Logo">
            </a>
          </li>
        </ul>
      </div>
      <div class="footer-menus">
        <div class="footer-menu">
          <h5 class="bold">Sitemap</h5>
          <?php
          wp_nav_menu(array(
            'theme_location' => 'footerLocationOne'
          ));
          ?>
        </div>
        <div class="footer-menu">
          <h5 class="bold">About Us</h5>
          <?php
          wp_nav_menu(array(
            'theme_location' => 'footerLocationTwo'
          ));
          ?>
        </div>
        <div class="footer-menu">
          <h5 class="bold">Resources</h5>
          <?php
          wp_nav_menu(array(
            'theme_location' => 'footerLocationThree'
          ));
          ?>
        </div>
      </div>
    </div>
    <div class="divider mb"></div>
    <p class="copyright">Copyright @ Sales Xpress 2023&nbsp;&nbsp;<a class="copyright" href="#">Terms of Service</a>&nbsp;|&nbsp;<a class="copyright" href="#">Privacy Policy</a></p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>