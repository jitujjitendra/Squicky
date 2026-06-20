<!DOCTYPE html>
<html <?php language_attributes(); ?> data-theme="dark">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?>">
    <meta property="og:description" content="<?php bloginfo( 'description' ); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo esc_url( home_url( '/' ) ); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
?>

    <!-- Animated Background -->
    <div class="animated-bg">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>
        <div class="orb orb-4"></div>
        <div class="grid-overlay"></div>
        <div class="particles-container" id="particles"></div>
    </div>

    <!-- Header -->
    <header class="header" id="mainHeader">
        <div class="header-inner">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-link">
                <span class="logo-img" role="img" aria-label="<?php bloginfo( 'name' ); ?> Logo"></span>
                <span class="logo-text"><?php bloginfo( 'name' ); ?></span>
            </a>

            <nav class="nav-desktop">
                <?php
                if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'depth'          => 1,
                    ) );
                } else {
                    ?>
                    <a href="#tools">Tools</a>
                    <a href="#games">Games</a>
                    <a href="#blog">Blog</a>
                    <a href="#about">About</a>
                    <?php
                }
                ?>
            </nav>

            <div class="header-actions">
                <div class="theme-switcher">
                    <button class="theme-btn active" data-theme="dark" title="Dark Theme" aria-label="Switch to dark theme">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M21 12.79A9 9 0 1111.21 3a7 7 0 009.79 9.79z"/>
                        </svg>
                    </button>
                    <button class="theme-btn" data-theme="neon" title="Neon Theme" aria-label="Switch to neon theme">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
                        </svg>
                    </button>
                    <button class="theme-btn" data-theme="light" title="Light Theme" aria-label="Switch to light theme">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="5"/>
                            <line x1="12" y1="1" x2="12" y2="3"/>
                            <line x1="12" y1="21" x2="12" y2="23"/>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
                            <line x1="1" y1="12" x2="3" y2="12"/>
                            <line x1="21" y1="12" x2="23" y2="12"/>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
                        </svg>
                    </button>
                </div>
                <button class="hamburger" id="hamburger" aria-label="Toggle navigation menu" aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Navigation -->
    <nav class="mobile-nav" id="mobileNav" aria-label="Mobile navigation">
        <?php
        if ( has_nav_menu( 'mobile' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'mobile',
                'container'      => false,
                'items_wrap'     => '%3$s',
                'depth'          => 1,
            ) );
        } elseif ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'items_wrap'     => '%3$s',
                'depth'          => 1,
            ) );
        } else {
            ?>
            <a href="#tools">Tools</a>
            <a href="#games">Games</a>
            <a href="#blog">Blog</a>
            <a href="#about">About</a>
            <?php
        }
        ?>
    </nav>
