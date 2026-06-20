<?php
/**
 * The front page template
 *
 * This is the static front page that displays the homepage with all sections.
 *
 * @package Squicky_Theme
 */

get_header();

// Player/Hero section
get_template_part( 'template-parts/player' );

// Tools section
get_template_part( 'template-parts/tools' );

// Games section
get_template_part( 'template-parts/games' );

// Blog preview section
get_template_part( 'template-parts/blog-section' );

// About section
get_template_part( 'template-parts/about' );

get_footer();
