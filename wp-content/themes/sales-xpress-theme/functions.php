<?php

require get_theme_file_path('/inc/search-route.php');

// CUSTOMIZE REST API
function salesXpress_custom_rest()
{
  register_rest_field('post', 'authorName', array(
    'get_callback' => function () {
      return get_the_author();
    }
  ));
  register_rest_field('post', 'blogCardImgUrl', array(
    'get_callback' => function () {
      return get_the_post_thumbnail_url(null, 'blogCardSize');
    }
  ));
}

add_action('rest_api_init', 'salesXpress_custom_rest');

function sales_xpress_files()
{
  wp_enqueue_style('custom-google-font-poppins', '//fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
  wp_enqueue_style('custom-google-fonts-lusitana', '//fonts.googleapis.com/css2?family=Lusitana:wght@400;700&');
  wp_enqueue_style('sales_xpress_main_styles', get_theme_file_uri("/build/style-index.css"));
  wp_enqueue_style('sales_xpress_extra_styles', get_theme_file_uri("/build/index.css"));
  wp_enqueue_script('main_sales_xpress_js', get_theme_file_uri("/build/index.js"), array('jquery'), '1.0', true);

  wp_localize_script('main_sales_xpress_js', 'salesXpressData', array(
    'root_url' => get_site_url()
  ));
}

add_action('wp_enqueue_scripts', 'sales_xpress_files');

function sales_xpress_features()
{
  register_nav_menu('headerMenuLocation', 'Header Menu Location');
  register_nav_menu('footerLocationOne', 'Footer Location One');
  register_nav_menu('footerLocationTwo', 'Footer Location Two');
  register_nav_menu('footerLocationThree', 'Footer Location Three');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('profileSize', 100, 100, true);
  add_image_size('featuredBlogSize', 630, 380, true);
  add_image_size('subFeaturedBlogSize', 212, 129, true);
  add_image_size('singleBlogSize', 950, 380, true);
  add_image_size('blogCardSize', 431, 227, true);
}

add_action('after_setup_theme', 'sales_xpress_features');


function noSubsAdminBar()
{
  $currentUser = wp_get_current_user();

  if (count($currentUser->roles) == 1 and $currentUser->roles[0] == 'subscriber') {
    show_admin_bar(false);
  }
}
add_action('wp_loaded', 'noSubsAdminBar');

function addPageClassName($classes)
{
  $nameToIdMatch = array(
    "page-id-124" => "blogs",
    "page-id-11" => "contact-us",
  );

  $pageClassName = array("");
  foreach ($classes as &$class) {
    if (array_key_exists($class, $nameToIdMatch)) {
      $pageClassName = array($nameToIdMatch[$class]);
    }
  }

  return array_merge($classes, $pageClassName);
}

add_filter('body_class', 'addPageClassName');

//Redirect subscriber accounts out of admin and onto homepage
function redirectSubsToFrontend()
{
  $currentUser = wp_get_current_user();

  if (count($currentUser->roles) == 1 and $currentUser->roles[0] == 'subscriber') {
    wp_redirect(site_url('/'));
    exit;
  }
}

add_action('admin_init', 'redirectSubsToFrontend');


function add_custom_classes($classes, $item)
{
  if ((is_single() or is_archive()) && $item->title == 'Blogs') {
    $classes[] = 'current-menu-item';
  }
  return $classes;
}

add_filter('nav_menu_css_class', 'add_custom_classes', 10, 2);


//CUSTOMIZE LOGIN LOGO URL
function ourHeaderUrl()
{
  return esc_url(site_url('/'));
}

add_filter('login_headerurl', 'ourHeaderURL');

//CUSTOMIZE LOGIN SCREEN CSS
function ourLoginCSS()
{
  wp_enqueue_style('custom-google-font-poppins', '//fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
  wp_enqueue_style('custom-google-fonts-lusitana', '//fonts.googleapis.com/css2?family=Lusitana:wght@400;700&');
  wp_enqueue_style('sales_xpress_main_styles', get_theme_file_uri("/build/style-index.css"));
  wp_enqueue_style('sales_xpress_extra_styles', get_theme_file_uri("/build/index.css"));
}
add_action('login_enqueue_scripts', 'ourLoginCSS');

function ourLoginTitle()
{
  return get_blogInfo('name');
}
add_filter('login_headertitle', 'ourLoginTitle');

add_filter('ai1wm_ecxclude_content_from_export', 'ignoreCertainFiles');

function ignoreCertainFiles($exclude_filters)
{
  $exclude_filters[] = 'themes/sales-xpress-theme/node_modules';
  return $exclude_filters;
}
