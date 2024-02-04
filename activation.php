<?php
// Initialize default settings on activation
function scrolling_text_plugin_activate() {
    $default_settings = array(
        'scrolling_text' => 'Your scrolling text goes here!'
    );

    foreach ($default_settings as $key => $value) {
        if (get_option($key) === false) {
            update_option($key, $value);
        }
    }
}
register_activation_hook(__FILE__, 'scrolling_text_plugin_activate');
?>
