'<?php

// Enqueue Google Fonts
function enqueue_google_fonts() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');
}
add_action('wp_enqueue_scripts', 'enqueue_google_fonts');

// Enqueue custom CSS and JS
function enqueue_custom_scripts() {
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/script.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

// WhatsApp integration - Add a button to the header
function add_whatsapp_button() {
    echo '<a href="https://api.whatsapp.com/send?text=Check%20this%20out" target="_blank" style="position:fixed;bottom:20px;right:20px;background:#25D366;color:white;padding:10px;border-radius:5px;">WhatsApp</a>';
}
add_action('wp_footer', 'add_whatsapp_button');

?>'