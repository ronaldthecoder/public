<?php

/*
  Plugin Name: Blog Read Time
  Description: Returns the average read time for a blog post.
  Version: 1.0
  Author: Ronald Chan
*/

class blogReadTimePlugin
{
  function __construct()
  {
    add_action('admin_menu', array($this, 'adminPage'));
    add_action('admin_init', array($this, 'settings'));
    add_action('init', array($this, 'setFrontEndReadTime'));
  }

  function setFrontEndReadTime()
  {
    if (!is_admin() and get_option('brtp_active', '1') == 1 and get_option('brtp_class') != "" and get_option('brtp_data_attr') != "") {
      wp_enqueue_script('blogReadTimeScript', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-element'), false, true);
      wp_localize_script('blogReadTimeScript', 'blogReadTimeData', array(
        'className' => get_option('brtp_class'),
        'dataAttribute' => get_option('brtp_data_attr')
      ));
    }
  }

  //PLUGIN INPUT CONFIGURATION
  function settings()
  {
    add_settings_section('brtp_first_section', null, array($this, 'pluginDescription'), 'blog-read-time-settings-page');

    //Active Status
    add_settings_field('brtp_active', 'Active', array($this, 'activeHTML'), 'blog-read-time-settings-page', 'brtp_first_section');
    register_setting('blogReadTimePlugin', 'brtp_active', array('sanitize_callback' => array($this, 'sanitizeActiveStatus'), 'default' => '1'));
    //Element Class Name Input
    add_settings_field('brtp_class', 'Element Class Name', array($this, 'classHTML'), 'blog-read-time-settings-page', 'brtp_first_section');
    register_setting('blogReadTimePlugin', 'brtp_class', array('sanitize_callback' => 'sanitize_text_field', 'default' => ''));
    //Data Attribute Name
    add_settings_field('brtp_data_attr', 'Data Attribute Name', array($this, 'dataAttributeHTML'), 'blog-read-time-settings-page', 'brtp_first_section');
    register_setting('blogReadTimePlugin', 'brtp_data_attr', array('sanitize_callback' => 'sanitize_text_field', 'default' => ''));
  }

  //INPUT CONFIGURATION
  function activeHTML()
  { ?>
    <input name="brtp_active" type="checkbox" value="1" <?php checked(get_option('brtp_active'), '1'); ?>>
  <?php }
  function classHTML()
  { ?>
    <input name="brtp_class" type="text" placeholder="Enter Class Name" value="<?php echo esc_attr(get_option('brtp_class')); ?>">
  <?php }
  function dataAttributeHTML()
  { ?>
    <input name="brtp_data_attr" type="text" placeholder="Enter Data Attribute" value="<?php echo esc_attr(get_option('brtp_data_attr')); ?>">
  <?php }

  //SANITZATION
  function sanitizeActiveStatus($input)
  {
    if ($input !== null and $input !== '1') {
      add_settings_error('brtp_active', 'brtp_active_error', $input);
      return get_option('brtp_active');
    }
    return $input;
  }

  //PLUGIN CONFIGURATION
  function adminPage()
  {
    add_options_page('Blog Read Time Settings', 'Blog Read Time', 'manage_options', 'blog-read-time-settings-page', array($this, 'adminHTML'));
  }
  function pluginDescription()
  { ?>
    <p>Enter the class name that belongs to the elements you want to populate the read time info. Make sure the data attribute name contains the article.</p>
  <?php }
  function adminHTML()
  { ?>
    <div class="wrap">
      <h1>Blog Read Time Settings</h1>
      <form action="options.php" method="POST">
        <?php
        settings_fields('blogReadTimePlugin');
        do_settings_sections('blog-read-time-settings-page');
        submit_button();
        ?>
      </form>
    </div>
<?php }
}

$blogReadTimePlugin = new blogReadTimePlugin();
