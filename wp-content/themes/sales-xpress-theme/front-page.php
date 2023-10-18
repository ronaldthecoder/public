<?php get_header(); ?>

<img class="hero-pattern" src="<?php echo get_template_directory_uri(); ?>/images/hero-pattern.svg" alt="hero pattern">

<section class="hero-section flex-center">
  <div class="container grid grid--2cols">
    <div class="hero-description">
      <h1><?php the_field('overview_title'); ?></h1>
      <p><?php the_field('overview_description'); ?></p>
      <div class="cta-btns">
        <button class="cta--btn"><a href="
          <?php
          if (is_user_logged_in()) {
            '/';
          } else {
            echo wp_registration_url();
          }
          ?>">Start A Free Trial</a></button>
        <button class="side-cta--btn"><a href="
          <?php
          if (is_user_logged_in()) {
            '/';
          } else {
            echo wp_registration_url();
          }
          ?>
          ">Book A Demo</a></button>
      </div>
    </div>
    <img class="hero-img" src="<?php echo get_theme_file_uri('/images/hero-img.svg') ?>" alt="hero img">
  </div>
</section>
<section class="services-section flex-center">
  <img class="services-pattern" src="<?php echo get_template_directory_uri(); ?>/images/dots--2.svg" alt="hero img pattern">

  <div class="container">
    <div class="partners-sub-section">
      <p id="services-section">We care about the quality of service, here are popular brands we partnered with</p>
      <ul class="partners-list grid grid--5cols">
        <li>
          <img class="partners-img" src="<?php echo get_theme_file_uri('/images/stripe_logo.svg') ?>" alt="Stripe Logo">
        </li>
        <li>
          <img src="<?php echo get_theme_file_uri('/images/square_logo.svg') ?>" alt="Square Logo">
        </li>
        <li>
          <img src="<?php echo get_theme_file_uri('/images/oracle_logo.svg') ?>" alt="Oracle Logo">
        </li>
        <li>
          <img src="<?php echo get_theme_file_uri('/images/salesforce_logo.svg') ?>" alt="Salesforce Logo">
        </li>
        <li>
          <img src="<?php echo get_theme_file_uri('/images/shopify_logo.svg') ?>" alt="Shopify Logo">
        </li>
      </ul>
    </div>
    <div class="services-sub-section flex">
      <div class="service-description">
        <p class="title--1 bold">Services made just for your team</p>
        <p class="paragraph">A complete service solution you can count on. Our technology is made for all sizes of business operations and we focus on bringing customers to you.</p>
        <a class="title--2 text--primary bold" href="#"><span>
            Explore Our Services
          </span>&nbsp;&nbsp;<img src="<?php echo get_theme_file_uri('/images/ArrowRight.svg') ?>" alt="Arrow-Right">
        </a>
      </div>
      <ul class="services grid grid--3cols">
        <li class="bg-grey--100 rounded">
          <img src="<?php echo get_theme_file_uri('/images/small_business_icon.svg') ?>" alt="Small Business Icon">
          <p class="title--1 bold">
            Small Business
          </p>
          <p>Get off the right foot. &nbsp;Our solution has everything a small business owner needs.</p>
        </li>
        <li class="bg-grey--100 rounded">
          <img src="<?php echo get_theme_file_uri('/images/medium_size_icon.svg') ?>" alt="Medium Business Icon">
          <p class="title--1 bold">
            Medium Size
          </p>
          <p>Grow without the growing pains. &nbsp;Our technology makes scaling simple and worthwhile.</p>
        </li>
        <li class="bg-grey--100 rounded">
          <img src="<?php echo get_theme_file_uri('/images/enterprise_icon.svg') ?>" alt="Enterprise Icon">
          <p class="title--1 bold">
            Enterprise
          </p>
          <p>Customer service solution at scale. &nbsp;Manage your customer relations company wide.</p>
        </li>
      </ul>
    </div>
  </div>
</section>
<section class="testimony-section flex-center">
  <img class="testimony-pattern-top" src="<?php echo get_theme_file_uri('/images/testimony-pattern-top.svg') ?>" alt="testimony Pattern">

  <img class="testimony-pattern-bottom" src="<?php echo get_theme_file_uri('/images/testimony-pattern-bottom.svg') ?>" alt="testimony Pattern">

  <div class="container flex-center flex-col">
    <h3>What People Are Saying</h3>
    <div class="glide">
      <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides testimony-slides">
          <?php
          $testimonies = new WP_Query(array(
            'post_type' => 'testimonies',
            'orderby' => 'date',
            'order' => 'ASC',
          ));
          while ($testimonies->have_posts()) {
            $testimonies->the_post();
          ?>
            <li class="glide__slide testimony-slide flex-center">
              <?php
              get_template_part('template-parts/content-testimony-card');
              ?>
            </li>
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
    <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]">
    </div>
  </div>
</section>
<section class="blog-section flex-center">
  <img class="blog-post-pattern" src="<?php echo get_theme_file_uri('/images/blog-post-pattern.svg') ?>" alt="blog post pattern">
  <div class="container">
    <?php
    get_template_part('template-parts/content-latest-post');
    ?>
  </div>
</section>
<?php get_footer(); ?>