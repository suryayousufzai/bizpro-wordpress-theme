<?php
/**
 * BizPro Theme Functions - FINAL FIX
 *
 * @package BizPro
 */

// Theme setup
function bizpro_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
    
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'bizpro' ),
        'footer'  => __( 'Footer Menu', 'bizpro' ),
    ) );
    
    add_image_size( 'service-icon', 100, 100, true );
    add_image_size( 'service-thumbnail', 150, 150, true );
    add_image_size( 'portfolio-thumbnail', 600, 400, true );
    add_image_size( 'portfolio-large', 1200, 800, true );
}
add_action( 'after_setup_theme', 'bizpro_theme_setup' );

// Enqueue styles and scripts
function bizpro_enqueue_assets() {
    wp_enqueue_style( 'bizpro-style', get_stylesheet_uri(), array(), '2.1.1' ); // ← Changed
    wp_enqueue_style( 'bizpro-main', get_template_directory_uri() . '/assets/css/main.css', array(), '2.1.1' ); // ← Changed
    wp_enqueue_style( 'bizpro-services-wave', get_template_directory_uri() . '/assets/css/services-wave.css', array( 'bizpro-main' ), '1.0.3' );
    wp_enqueue_style( 'bizpro-preloader', get_template_directory_uri() . '/assets/css/preloader.css', array(), '1.0.0' );
    wp_enqueue_script( 'bizpro-script', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0.2', true );
}
add_action( 'wp_enqueue_scripts', 'bizpro_enqueue_assets' );

function force_clear_all_cache() {
    wp_cache_flush();
}
add_action('init', 'force_clear_all_cache');

function bizpro_responsive_text_fix() {
    ?>
    <style id="bizpro-responsive-fix">
/* Portfolio Premium Grid - SMALLER mobile (14px instead of 18px) */
.portfolio-title-premium,
html .portfolio-title-premium,
body .portfolio-title-premium {
    font-size: clamp(14px, 3.5vw, 26px) !important;  /* ← Changed 18px to 14px */
}

.portfolio-client-premium,
html .portfolio-client-premium {
    font-size: clamp(9px, 1.5vw, 13px) !important;  /* ← Changed 10px to 9px */
}

.portfolio-excerpt-premium,
html .portfolio-excerpt-premium {
    font-size: clamp(11px, 1.8vw, 15px) !important;  /* ← Changed 12px to 11px */
}

.portfolio-link-premium span,
html .portfolio-link-premium span {
    font-size: clamp(11px, 1.6vw, 14px) !important;
}

/* Portfolio Hero */
.portfolio-hero-title,
html .portfolio-hero-title {
    font-size: clamp(28px, 7vw, 80px) !important;  /* ← Changed 32px to 28px */
}

.portfolio-hero-description,
html .portfolio-hero-description {
    font-size: clamp(14px, 2.5vw, 20px) !important;  /* ← Changed 16px to 14px */
}

.hero-badge,
html .hero-badge {
    font-size: clamp(12px, 1.8vw, 15px) !important;
}

/* Homepage Portfolio */
.portfolio-client,
html .portfolio-client {
    font-size: clamp(9px, 1.5vw, 12px) !important;
}

.portfolio-info h3,
html .portfolio-info h3 {
    font-size: clamp(16px, 3vw, 24px) !important;  /* ← Changed 18px to 16px */
}

.portfolio-category,
html .portfolio-category {
    font-size: clamp(11px, 1.8vw, 14px) !important;
}
    </style>
    <?php
}
add_action( 'wp_head', 'bizpro_responsive_text_fix', 999 );

// Include custom post types
require_once get_template_directory() . '/inc/custom-post-types.php';

// Cache buster
function bizpro_add_cache_buster() {
    echo '<!-- Cache: ' . time() . ' -->';
}
add_action( 'wp_head', 'bizpro_add_cache_buster' );
?>