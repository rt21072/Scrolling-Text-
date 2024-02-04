<?php
/*
Plugin Name: Scrolling Text 
Description: Adds a scrolling text under the theme header.
Version: 1.0
Author: Ezeditor
Author URI: https://ezeditor.art
Requires at least: 5.2
Requires PHP: 7.2*
 */

// Include settings functions
require_once plugin_dir_path(__FILE__) . 'includes/settings.php';

// Include activation functions
require_once plugin_dir_path(__FILE__) . 'includes/activation.php';

// Display scrolling text
function add_scrolling_text() {
    $scrolling_text = get_option('scrolling_text', 'Your scrolling text goes here!');
    $font_size = get_option('scrolling_text_font_size', '16px');
    $text_color = get_option('scrolling_text_color', '#333');

    echo '<div id="scrolling-text-container" style="font-size: ' . esc_attr($font_size) . '; color: ' . esc_attr($text_color) . ';">
              <marquee behavior="scroll" direction="left">
                  ' . esc_html($scrolling_text) . '
              </marquee>
          </div>';
}

add_action('wp_head', 'add_scrolling_text');


// Add the plugin to the admin menu
add_action('admin_menu', 'add_scrolling_text_plugin_menu');

function add_scrolling_text_plugin_menu() {
    add_menu_page(
        'Scrolling Text Plugin Settings',
        'Scrolling Text',
        'manage_options',
        'scrolling_text_settings',
        'scrolling_text_settings_page',
        'dashicons-admin-generic', // You can change the icon as needed
        90 // Adjust the menu position as needed
    );
}

function scrolling_text_settings_page() {
    ?>
    <div class="wrap">
        <h1>Scrolling Text Plugin Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('general');
            do_settings_sections('general');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
?>
