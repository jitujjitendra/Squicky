<?php
/**
 * The template for displaying all pages
 *
 * @package Squicky_Theme
 */

get_header();
?>

<section class="page-section">
    <div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="section-header reveal">
                <h2 class="section-title"><?php the_title(); ?></h2>
            </div>
            <div class="about-content reveal">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<?php
get_footer();
