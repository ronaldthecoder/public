<?php

function sales_xpress_post_types()
{
  register_post_type('testimonies', array(
    'public' => true,
    'supports' => array('title', 'custom-fields', 'thumbnail'),
    'labels' => array(
      'name' => 'Testimonies',
      'add_new_item' => 'Add New Testimony',
      'edit_item' => 'Edit Testimony',
      'all_items' => 'All Testimonies',
      'singular_name' => 'Testimony',
    ),
    'menu_icon' => 'dashicons-testimonial'
  ));
}
add_action('init', 'sales_xpress_post_types');

function change_default_title($title)
{
  $screen = get_current_screen();
  if ('testimonies' == $screen->post_type) {
    $title = 'Add Author';
  }

  return $title;
}

add_filter('enter_title_here', 'change_default_title');
