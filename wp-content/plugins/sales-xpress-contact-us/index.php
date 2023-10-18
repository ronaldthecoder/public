<?php

/*
Plugin Name: Sales Xpress Contact Us Page
Description: A plugin that populates a contact us section into your page.
Version 1.0
Author: Ronald
*/

if (!defined('ABSPATH')) exit; //Exist i accessed directly

class salesXpressContactUs
{
  function __construct()
  {
    add_action('init', array($this, 'adminAssets'));
  }

  function adminAssets()
  {
    wp_register_style('contactUsCss', plugin_dir_url(__FILE__) . 'build/index.css');
    wp_register_script('ournewblocktypes', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks', 'wp-element', 'wp-editor'));
    register_block_type("ourplugin/sales-xpress-contact-us", array(
      'editor_script' => 'ournewblocktypes',
      'editor_style' => 'contactUsCss',
      'render_callback' => array($this, 'theHTML')
    ));
  }

  function theHTML($attributes)
  {
    wp_enqueue_script('contactFrontend', plugin_dir_url(__FILE__) . 'build/frontend.js', array('wp-element'));
    wp_enqueue_style('contactFrontendStyle', plugin_dir_url(__FILE__) . 'build/frontend.css');
    ob_start(); ?>
    <div class="sales-xpress-contact-us">
      <pre style="display:none;"><?php echo wp_json_encode($attributes); ?></pre>
    </div>
<?php return ob_get_clean();
  }
}

$areYouPayingAttention = new salesXpressContactUs();
