<?php
/**
 * Squicky Theme Customizer
 *
 * @package Squicky_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add customizer sections, settings, and controls
 */
function squicky_customize_register( $wp_customize ) {

    // Squicky Player Section
    $wp_customize->add_section( 'squicky_player_section', array(
        'title'    => __( 'Squicky Player Settings', 'squicky-theme' ),
        'priority' => 30,
    ) );

    // Player Mode Setting
    $wp_customize->add_setting( 'squicky_player_mode', array(
        'default'           => 'player',
        'sanitize_callback' => 'squicky_sanitize_player_mode',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'squicky_player_mode', array(
        'label'   => __( 'Player Mode', 'squicky-theme' ),
        'section' => 'squicky_player_section',
        'type'    => 'select',
        'choices' => array(
            'player' => __( 'Player Mode', 'squicky-theme' ),
            'ad'     => __( 'Ad Slides Mode', 'squicky-theme' ),
        ),
    ) );

    // Auto-play Setting
    $wp_customize->add_setting( 'squicky_auto_play', array(
        'default'           => false,
        'sanitize_callback' => 'squicky_sanitize_checkbox',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'squicky_auto_play', array(
        'label'   => __( 'Auto-play on Page Load', 'squicky-theme' ),
        'section' => 'squicky_player_section',
        'type'    => 'checkbox',
    ) );

    // Loop Ads Setting
    $wp_customize->add_setting( 'squicky_loop_ads', array(
        'default'           => true,
        'sanitize_callback' => 'squicky_sanitize_checkbox',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'squicky_loop_ads', array(
        'label'   => __( 'Loop Ad Slides', 'squicky-theme' ),
        'section' => 'squicky_player_section',
        'type'    => 'checkbox',
    ) );

    // Ad Toggle (show ads)
    $wp_customize->add_setting( 'squicky_show_ads', array(
        'default'           => false,
        'sanitize_callback' => 'squicky_sanitize_checkbox',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'squicky_show_ads', array(
        'label'   => __( 'Show Advertisement Slides', 'squicky-theme' ),
        'section' => 'squicky_player_section',
        'type'    => 'checkbox',
    ) );

    // Logo Upload Section
    $wp_customize->add_section( 'squicky_logo_section', array(
        'title'    => __( 'Squicky Logo', 'squicky-theme' ),
        'priority' => 25,
    ) );

    $wp_customize->add_setting( 'squicky_logo_upload', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'squicky_logo_upload', array(
        'label'   => __( 'Upload Logo', 'squicky-theme' ),
        'section' => 'squicky_logo_section',
    ) ) );
}
add_action( 'customize_register', 'squicky_customize_register' );

/**
 * Sanitize player mode
 */
function squicky_sanitize_player_mode( $input ) {
    $valid = array( 'player', 'ad' );
    if ( in_array( $input, $valid, true ) ) {
        return $input;
    }
    return 'player';
}

/**
 * Sanitize checkbox
 */
function squicky_sanitize_checkbox( $input ) {
    return ( isset( $input ) && true == $input ) ? true : false;
}
