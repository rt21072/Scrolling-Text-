<?php
// Register settings
function scrolling_text_plugin_settings_init() {
    add_settings_section(
        'scrolling_text_plugin_settings_section',
        'Scrolling Text Settings',
        'scrolling_text_plugin_settings_section_callback',
        'general'
    );

    add_settings_field(
        'scrolling_text',
        'Scrolling Text',
        'scrolling_text_plugin_setting_callback',
        'general',
        'scrolling_text_plugin_settings_section'
    );

    add_settings_field(
        'scrolling_text_font_size',
        'Font Size',
        'scrolling_text_font_size_callback',
        'general',
        'scrolling_text_plugin_settings_section'
    );

    add_settings_field(
        'scrolling_text_color',
        'Text Color',
        'scrolling_text_color_callback',
        'general',
        'scrolling_text_plugin_settings_section'
    );

    register_setting('general', 'scrolling_text', 'sanitize_scroll_text');
    register_setting('general', 'scrolling_text_font_size', 'sanitize_font_size');
    register_setting('general', 'scrolling_text_color', 'sanitize_text_color');
}

function scrolling_text_plugin_settings_section_callback() {
    echo '<p>Enter the scrolling text and customize the appearance.</p>';
}

function scrolling_text_plugin_setting_callback() {
    $scrolling_text = get_option('scrolling_text', 'Your scrolling text goes here!');
    echo '<input type="text" id="scrolling_text" name="scrolling_text" value="' . esc_attr($scrolling_text) . '" />';
}

function scrolling_text_font_size_callback() {
    $font_size = get_option('scrolling_text_font_size', '16px');
    echo '<input type="text" id="scrolling_text_font_size" name="scrolling_text_font_size" value="' . esc_attr($font_size) . '" /> px';
}

function scrolling_text_color_callback() {
    $text_color = get_option('scrolling_text_color', '#333');
    echo '<input type="text" id="scrolling_text_color" name="scrolling_text_color" value="' . esc_attr($text_color) . '" />';
}

// Sanitize input for font size
function sanitize_font_size($input) {
    return sanitize_text_field($input);
}

// Sanitize input for text color
function sanitize_text_color($input) {
    return sanitize_hex_color($input);
}

add_action('admin_init', 'scrolling_text_plugin_settings_init');
?>
