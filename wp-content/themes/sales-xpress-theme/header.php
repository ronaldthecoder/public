<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="overlay hidden"></div>
  <header class="header flex-center">
    <div class="container">
      <a href="/" class="logo">
        <img src="<?php echo get_theme_file_uri('/images/Logo.svg') ?>" alt="Logo">
      </a>
      <nav>
        <?php
        wp_nav_menu(array(
          'theme_location' => 'headerMenuLocation'
        ))
        ?>
        <div class="cta-item flex-col">
          <?php if (is_user_logged_in()) {
          ?>
            <a class="hover" href="<?php echo wp_logout_url(); ?>">Logout</a>
            <div class="user-avatar">
              <?php echo get_avatar(get_current_user_id(), 50); ?>
            </div>
          <?php
          } else {
          ?>
            <a class="hover" href="<?php echo wp_login_url(); ?>">Login</a>
            <Button class="cta--btn"><a href="<?php echo wp_registration_url(); ?>">Start A Free Trial</a></Button>
          <?php
          } ?>
        </div>
      </nav>
      <div class="header--btn">
        <?php if (is_user_logged_in()) {
        ?>
          <a class="hover" href="<?php echo wp_logout_url(); ?>">Logout</a>
          <div class="user-avatar">
            <?php echo get_avatar(get_current_user_id(), 50); ?>
          </div>
        <?php
        } else {
        ?>
          <a class="hover" href="<?php echo wp_login_url(); ?>">Login</a>
          <Button class="cta--btn"><a href="<?php echo wp_registration_url(); ?>">Start A Free Trial</a></Button>
        <?php
        } ?>
      </div>
      <div class="mobile-menu">
        <img class="menu" src="<?php echo get_theme_file_uri('/images/mobile-menu-hamburger.svg') ?>" alt="Hamburger Svg">
        <img class="close" src="<?php echo get_theme_file_uri('/images/mobile-menu-close.svg') ?>" alt="Close Svg">
      </div>
    </div>
  </header>