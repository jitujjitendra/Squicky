<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Squicky_Theme
 */

get_header();
?>

<section class="error-404-section">
    <div class="container" style="text-align: center; padding: 120px 24px;">
        <div class="section-header reveal">
            <span class="section-label">404</span>
            <h1 class="section-title" style="font-size: clamp(3rem, 8vw, 6rem);">Page Not Found</h1>
            <p class="section-desc" style="max-width: 500px; margin: 0 auto;">
                The page you are looking for does not exist or has been moved.
                Let us get you back on track.
            </p>
        </div>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="about-cta reveal" style="display: inline-flex; margin-top: 32px;">
            Back to Home
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <line x1="5" y1="12" x2="19" y2="12"/>
                <polyline points="12 5 19 12 12 19"/>
            </svg>
        </a>
    </div>
</section>

<?php
get_footer();
