<?php
/**
 * Template part: Blog Preview Section (for front-page)
 *
 * @package Squicky_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$blog_query = new WP_Query( array(
    'posts_per_page' => 3,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
) );
?>

<!-- Blog Section -->
<section id="blog">
    <div class="container">
        <div class="section-header reveal">
            <span class="section-label">Blog</span>
            <h2 class="section-title">Latest Articles</h2>
            <p class="section-desc">
                Insights, tutorials, and updates from the Squicky team.
            </p>
        </div>
        <div class="blog-grid">
            <?php if ( $blog_query->have_posts() ) : ?>
                <?php $delay = 1; ?>
                <?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
                    <article class="blog-card reveal reveal-delay-<?php echo $delay; ?>">
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
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <!-- Fallback: Static placeholder blog cards -->
                <article class="blog-card reveal reveal-delay-1">
                    <div class="blog-thumb">
                        <span class="blog-category">Engineering</span>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title">Building a Zero-Upload PDF Tool for the Modern Web</h3>
                        <p class="blog-excerpt">
                            How we built Squicky PDF to process everything client-side using WebAssembly
                            and modern browser APIs, keeping your documents completely private.
                        </p>
                        <div class="blog-meta">
                            <span>5 min read</span>
                            <span>&bull;</span>
                            <span>Jun 15, 2025</span>
                        </div>
                    </div>
                </article>
                <article class="blog-card reveal reveal-delay-2">
                    <div class="blog-thumb">
                        <span class="blog-category">Product</span>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title">Squicky Player v0.3: HLS, DASH, and Beyond</h3>
                        <p class="blog-excerpt">
                            Our latest release adds adaptive streaming support, chapter markers,
                            subtitle management, and a completely redesigned player UI.
                        </p>
                        <div class="blog-meta">
                            <span>4 min read</span>
                            <span>&bull;</span>
                            <span>Jun 10, 2025</span>
                        </div>
                    </div>
                </article>
                <article class="blog-card reveal reveal-delay-3">
                    <div class="blog-thumb">
                        <span class="blog-category">Privacy</span>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title">Why Privacy-First Tools Matter in 2025</h3>
                        <p class="blog-excerpt">
                            A deep dive into our philosophy: no trackers, no analytics, no server uploads.
                            Your data stays yours, always. Here is why that matters more than ever.
                        </p>
                        <div class="blog-meta">
                            <span>6 min read</span>
                            <span>&bull;</span>
                            <span>Jun 5, 2025</span>
                        </div>
                    </div>
                </article>
            <?php endif; ?>
        </div>
    </div>
</section>
