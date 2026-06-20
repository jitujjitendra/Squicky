<?php
/**
 * The main template file (fallback / blog posts listing)
 *
 * @package Squicky_Theme
 */

get_header();
?>

<section class="blog-page-section">
    <div class="container">
        <div class="section-header reveal">
            <span class="section-label">Blog</span>
            <h2 class="section-title"><?php single_post_title(); ?></h2>
            <p class="section-desc">
                Insights, tutorials, and updates from the Squicky team.
            </p>
        </div>

        <div class="blog-grid">
            <?php if ( have_posts() ) : ?>
                <?php $delay = 1; ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="blog-card reveal reveal-delay-<?php echo ( ( $delay - 1 ) % 3 ) + 1; ?>">
                        <div class="blog-thumb">
                            <?php squicky_post_category(); ?>
                        </div>
                        <div class="blog-content">
                            <h3 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="blog-excerpt">
                                <?php echo wp_trim_words( get_the_excerpt(), 25, '...' ); ?>
                            </p>
                            <div class="blog-meta">
                                <span><?php echo esc_html( squicky_reading_time() ); ?></span>
                                <span>&bull;</span>
                                <span><?php echo get_the_date( 'M j, Y' ); ?></span>
                            </div>
                        </div>
                    </article>
                <?php $delay++; ?>
                <?php endwhile; ?>
            <?php else : ?>
                <p class="about-text">No posts found.</p>
            <?php endif; ?>
        </div>

        <?php if ( have_posts() ) : ?>
            <div class="pagination" style="margin-top: 48px; text-align: center;">
                <?php
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => '&larr; Previous',
                    'next_text' => 'Next &rarr;',
                ) );
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
