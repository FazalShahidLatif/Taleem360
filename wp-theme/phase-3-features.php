<?php
/**
 * Phase 3 Features: Regional Features & Overlooked Additions
 * Subdomain Redirection, Madrasa Features, Prayer Times, Enhanced WhatsApp
 */

// 1. Subdomain Redirection Shortcode
function taleem360_school_login_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'school_name' => '',
    ), $atts );

    if ( empty( $atts['school_name'] ) ) {
        return '<p>Please provide a school name.</p>';
    }

    $school_subdomain = sanitize_text_field( $atts['school_name'] );
    $login_url = 'https://' . $school_subdomain . '.taleem360.com/login';

    return '<a href="' . esc_url( $login_url ) . '" class="school-login-btn btn-primary" target="_blank">Access ' . esc_html( ucwords( str_replace( '-', ' ', $school_subdomain ) ) ) . ' Dashboard</a>';
}
add_shortcode( 'school_login', 'taleem360_school_login_shortcode' );

// 2. Madrasa Specific Features - Register Islamic Subjects Taxonomy
function taleem360_register_islamic_subjects_taxonomy() {
    register_taxonomy( 'islamic_subject', 'post', array(
        'label'        => 'Islamic Subjects',
        'public'       => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite'      => array( 'slug' => 'islamic-subject' ),
    ) );
}
add_action( 'init', 'taleem360_register_islamic_subjects_taxonomy' );

// 3. Create Predefined Islamic Subject Terms
function taleem360_create_islamic_subject_terms() {
    $subjects = array(
        'quran'      => array( 'name' => 'Quran Studies', 'description' => 'Quranic recitation and memorization' ),
        'hadith'     => array( 'name' => 'Hadith', 'description' => 'Prophetic traditions and sayings' ),
        'fiqh'       => array( 'name' => 'Fiqh', 'description' => 'Islamic jurisprudence and rulings' ),
        'aqidah'     => array( 'name' => 'Aqidah', 'description' => 'Islamic theology and belief' ),
        'sirah'      => array( 'name' => 'Sirah', 'description' => 'Biography of Prophet Muhammad' ),
        'arabic'     => array( 'name' => 'Arabic Language', 'description' => 'Arabic language and grammar' ),
    );

    foreach ( $subjects as $slug => $subject_data ) {
        if ( ! term_exists( $slug, 'islamic_subject' ) ) {
            wp_insert_term( 
                $subject_data['name'], 
                'islamic_subject', 
                array( 
                    'slug'        => $slug,
                    'description' => $subject_data['description'],
                )
            );
        }
    }
}
add_action( 'init', 'taleem360_create_islamic_subject_terms', 20 );

// 4. Prayer Times Display Widget/Shortcode
function taleem360_prayer_times_shortcode( $atts ) {
    $prayer_times = array(
        'Fajr'   => '05:30 AM',
        'Dhuhr'  => '12:30 PM',
        'Asr'    => '03:45 PM',
        'Maghrib' => '06:45 PM',
        'Isha'   => '08:15 PM',
    );

    $output = '<div class="prayer-times-widget">';
    $output .= '<h3>Today\'s Prayer Times (Karachi)</h3>';
    $output .= '<ul class="prayer-list">';
    
    foreach ( $prayer_times as $prayer => $time ) {
        $output .= '<li><strong>' . esc_html( $prayer ) . ':</strong> ' . esc_html( $time ) . '</li>';
    }
    
    $output .= '</ul>';
    $output .= '</div>';

    return $output;
}
add_shortcode( 'prayer_times', 'taleem360_prayer_times_shortcode' );

// 5. Enhanced WhatsApp Integration with Dynamic Messaging
function taleem360_enhanced_whatsapp_integration() {
    $school_name = get_option( 'blogname' );
    $page_title = get_the_title();
    $message = sprintf(
        'Hello! I am interested in learning more about %s - %s. Can you provide more information?',
        $school_name,
        $page_title
    );
    
    $whatsapp_url = 'https://api.whatsapp.com/send?text=' . urlencode( $message );

    return '<a href="' . esc_url( $whatsapp_url ) . '" target="_blank" class="whatsapp-floating-btn" title="Contact us on WhatsApp">
        <span class="whatsapp-icon">💬</span>
        <span class="whatsapp-text">WhatsApp</span>
    </a>';
}
add_action( 'wp_footer', 'taleem360_enhanced_whatsapp_integration' );

// 6. Register Resource Categories
function taleem360_register_resource_categories() {
    $categories = array(
        'government-policies' => array(
            'name'        => 'Government Policies',
            'description' => 'Education policies and guidelines from government',
        ),
        'technology-trends' => array(
            'name'        => 'Technology Trends',
            'description' => 'Latest trends in educational technology',
        ),
        'success-stories' => array(
            'name'        => 'Success Stories',
            'description' => 'User success stories and case studies',
        ),
    );

    foreach ( $categories as $slug => $cat_data ) {
        if ( ! term_exists( $slug, 'category' ) ) {
            wp_insert_term( 
                $cat_data['name'], 
                'category', 
                array( 
                    'slug'        => $slug,
                    'description' => $cat_data['description'],
                )
            );
        }
    }
}
add_action( 'init', 'taleem360_register_resource_categories' );

// 7. Madrasa-specific Custom Post Type (Optional Enhancement)
function taleem360_register_madrasa_post_type() {
    register_post_type( 'madrasa_resource', array(
        'label'       => 'Madrasa Resources',
        'public'      => true,
        'supports'    => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'  => array( 'islamic_subject' ),
        'has_archive' => true,
        'rewrite'     => array( 'slug' => 'madrasa-resources' ),
    ) );
}
add_action( 'init', 'taleem360_register_madrasa_post_type' );

// 8. Subdomain Detection for School-specific Pages
function taleem360_get_current_school_subdomain() {
    $host = $_SERVER['HTTP_HOST'];
    $parts = explode( '.', $host );

    if ( count( $parts ) > 2 ) {
        return $parts[0]; // Return subdomain
    }

    return null;
}

// 9. School-specific Content Filter (Advanced Feature)
function taleem360_filter_content_by_school( $content ) {
    $school_subdomain = taleem360_get_current_school_subdomain();

    if ( $school_subdomain ) {
        $school_name = str_replace( '-', ' ', ucwords( $school_subdomain ) );
        $content = str_replace( '[SCHOOL_NAME]', $school_name, $content );
    }

    return $content;
}
add_filter( 'the_content', 'taleem360_filter_content_by_school' );

?>