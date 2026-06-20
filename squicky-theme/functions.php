<?php
/**
 * Squicky Theme functions and definitions
 *
 * @package Squicky_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'SQUICKY_THEME_VERSION', '1.0.0' );

/**
 * Theme setup
 */
function squicky_theme_setup() {
    // Add title tag support
    add_theme_support( 'title-tag' );

    // Add custom logo support
    add_theme_support( 'custom-logo', array(
        'height'      => 58,
        'width'       => 58,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Add post thumbnails support
    add_theme_support( 'post-thumbnails' );

    // Add HTML5 support
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'squicky-theme' ),
        'mobile'  => __( 'Mobile Menu', 'squicky-theme' ),
        'footer'  => __( 'Footer Menu', 'squicky-theme' ),
    ) );

    // Add automatic feed links
    add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'squicky_theme_setup' );

/**
 * Enqueue styles and scripts
 */
function squicky_theme_scripts() {
    // Google Fonts - Inter + Space Grotesk
    wp_enqueue_style(
        'squicky-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Main theme stylesheet (WordPress required)
    wp_enqueue_style(
        'squicky-style',
        get_stylesheet_uri(),
        array(),
        SQUICKY_THEME_VERSION
    );

    // Main CSS (extracted from mockup)
    wp_enqueue_style(
        'squicky-main',
        get_theme_file_uri( 'assets/css/main.css' ),
        array( 'squicky-google-fonts' ),
        SQUICKY_THEME_VERSION
    );

    // Main JS (extracted from mockup)
    wp_enqueue_script(
        'squicky-main',
        get_theme_file_uri( 'assets/js/main.js' ),
        array(),
        SQUICKY_THEME_VERSION,
        true
    );

    // Pass customizer settings to JS
    wp_localize_script( 'squicky-main', 'squickySettings', array(
        'playerMode' => get_theme_mod( 'squicky_player_mode', 'player' ),
        'autoPlay'   => get_theme_mod( 'squicky_auto_play', false ),
        'loopAds'    => get_theme_mod( 'squicky_loop_ads', true ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'squicky_theme_scripts' );

/**
 * Register widget areas
 */
function squicky_theme_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Widget Area 1', 'squicky-theme' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here for footer column 1.', 'squicky-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget Area 2', 'squicky-theme' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here for footer column 2.', 'squicky-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget Area 3', 'squicky-theme' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here for footer column 3.', 'squicky-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'squicky_theme_widgets_init' );

/**
 * Include customizer settings
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Include template tags
 */
require get_template_directory() . '/inc/template-tags.php';
