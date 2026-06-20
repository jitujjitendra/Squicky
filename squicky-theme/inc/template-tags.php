<?php
/**
 * Custom template tags for Squicky Theme
 *
 * @package Squicky_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get the theme logo URL
 */
function squicky_get_logo_url() {
    $custom_logo = get_theme_mod( 'squicky_logo_upload' );
    if ( $custom_logo ) {
        return $custom_logo;
    }
    return get_theme_file_uri( 'assets/images/logo.png' );
}

/**
 * Display post date
 */
function squicky_posted_on() {
    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
    $time_string = sprintf(
        $time_string,
        esc_attr( get_the_date( DATE_W3C ) ),
        esc_html( get_the_date() )
    );
    echo '<span class="posted-on">' . $time_string . '</span>';
}

/**
 * Display post author
 */
function squicky_posted_by() {
    echo '<span class="byline"><span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span></span>';
}

/**
 * Get estimated reading time for a post
 */
function squicky_reading_time() {
    $content = get_post_field( 'post_content', get_the_ID() );
    $word_count = str_word_count( strip_tags( $content ) );
    $reading_time = ceil( $word_count / 200 );
    return $reading_time . ' min read';
}

/**
 * Display category list for blog cards
 */
function squicky_post_category() {
    $categories = get_the_category();
    if ( ! empty( $categories ) ) {
        echo '<span class="blog-category">' . esc_html( $categories[0]->name ) . '</span>';
    }
}
