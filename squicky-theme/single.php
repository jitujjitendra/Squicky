<?php
/**
 * The template for displaying single blog posts
 *
 * @package Squicky_Theme
 */

get_header();
?>

<section class="single-post-section">
    <div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
            <article class="single-post reveal">
                <div class="section-header">
                    <div class="blog-meta" style="margin-bottom: 16px;">
                        <?php squicky_post_category(); ?>
                        <span style="margin-left: 12px;"><?php echo esc_html( squicky_reading_time() ); ?></span>
                        <span>&bull;</span>
                        <span><?php echo get_the_date( 'M j, Y' ); ?></span>
                    </div>
                    <h1 class="section-title"><?php the_title(); ?></h1>
                    <div class="blog-meta" style="margin-top: 12px;">
                        <span>By <?php the_author(); ?></span>
                    </div>
                </div>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="blog-thumb" style="margin: 32px 0; border-radius: var(--radius-lg); overflow: hidden;">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>

                <div class="about-content single-post-content">
                    <?php the_content(); ?>
                </div>

                <div class="post-navigation" style="margin-top: 48px; display: flex; justify-content: space-between; gap: 24px;">
                    <div class="nav-previous">
                        <?php previous_post_link( '%link', '&larr; %title' ); ?>
                    </div>
                    <div class="nav-next">
                        <?php next_post_link( '%link', '%title &rarr;' ); ?>
                    </div>
                </div>

                <?php
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
                ?>
            </article>
        <?php endwhile; ?>
    </div>
</section>

<?php
get_footer();
