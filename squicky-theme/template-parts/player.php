<?php
/**
 * Template part: Hero/Player Section
 *
 * @package Squicky_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$player_mode = get_theme_mod( 'squicky_player_mode', 'player' );
$auto_play   = get_theme_mod( 'squicky_auto_play', false );
$loop_ads    = get_theme_mod( 'squicky_loop_ads', true );
?>

<!-- Hero / Featured Player Section -->
<section class="hero-section">
    <div class="container">
        <div class="player-wrapper reveal">

            <!-- Top bar: label + Admin mode toggle -->
            <div class="player-topbar">
                <div class="player-topbar-label">
                    <span class="live-dot"></span>
                    Squicky Player
                </div>
                <div class="admin-toggle-wrap">
                    <span class="admin-toggle-label">Mode:</span>
                    <div class="mode-pill">
                        <button class="mode-btn <?php echo $player_mode === 'player' ? 'active' : ''; ?>" id="modePlayer" onclick="setPlayerMode('player')">
                            &#9654; Player
                        </button>
                        <button class="mode-btn <?php echo $player_mode === 'ad' ? 'active' : ''; ?>" id="modeAd" onclick="setPlayerMode('ad')">
                            &#128226; Ad Slides
                        </button>
                    </div>
                </div>
            </div>

            <!-- Squicky Player Shell -->
            <div class="squicky-player-shell">

                <!-- Window chrome bar -->
                <div class="player-chrome">
                    <div class="chrome-dots">
                        <span class="chrome-dot red"></span>
                        <span class="chrome-dot yellow"></span>
                        <span class="chrome-dot green"></span>
                    </div>
                    <span class="chrome-title">Squicky Player &mdash; squicky.in</span>
                </div>

                <!-- VIDEO AREA -->
                <div class="player-video-area" id="playerVideoArea">
                    <div class="player-video-inner">
                        <div class="player-poster"></div>
                        <div class="player-grid"></div>
                        <div class="player-bottom-fade"></div>

                        <!-- Play button -->
                        <div class="player-play-btn" id="playerPlayBtn" role="button" tabindex="0" aria-label="Play">
                            <svg viewBox="0 0 24 24"><polygon points="5,3 19,12 5,21"/></svg>
                        </div>

                        <!-- Badges -->
                        <span class="player-badge" id="playerBadge">Featured</span>

                        <!-- Mode indicator (top-right inside player) -->
                        <div class="player-mode-indicator" id="playerModeIndicator">
                            <span class="dot"></span>
                            <span id="modeIndicatorText">Player Mode</span>
                        </div>

                        <!-- Title + duration (bottom overlay) -->
                        <div class="player-title-bar">
                            <span class="player-video-title" id="playerVideoTitle">Squicky Player — Watch anything, anywhere</span>
                            <span class="player-video-duration">0:00 / 0:00</span>
                        </div>

                        <!-- AD SLIDES VIEW (shown when Ad mode is ON) -->
                        <div class="ad-slides-view" id="adSlidesView">
                            <div class="ad-slide-header">
                                <div class="ad-slide-title">
                                    <svg viewBox="0 0 24 24"><path d="M22 6 L2 6 L2 18 L22 18 Z M22 6 L12 13 L2 6"/></svg>
                                    Advertisement Slides
                                </div>
                                <span style="font-size:0.68rem;color:rgba(255,255,255,0.3);">3 slides configured</span>
                            </div>
                            <div class="ad-slides-grid">
                                <div class="ad-slide-card">
                                    <div class="ad-slide-thumb">&#128250;</div>
                                    <div class="ad-slide-info">
                                        <div class="ad-slide-name">Slide 1 — Product Launch</div>
                                        <div class="ad-slide-dur">15s &middot; Auto-play</div>
                                    </div>
                                </div>
                                <div class="ad-slide-card">
                                    <div class="ad-slide-thumb">&#127916;</div>
                                    <div class="ad-slide-info">
                                        <div class="ad-slide-name">Slide 2 — YouTube Promo</div>
                                        <div class="ad-slide-dur">30s &middot; YouTube embed</div>
                                    </div>
                                </div>
                                <div class="ad-slide-card" style="border-style:dashed;opacity:0.5;cursor:default;">
                                    <div class="ad-slide-thumb" style="opacity:0.4;">+</div>
                                    <div class="ad-slide-info">
                                        <div class="ad-slide-name">Add new slide</div>
                                        <div class="ad-slide-dur">Click to configure</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PLAYER TABS -->
                <div class="player-tabs-bar">
                    <button class="player-tab active">Playlist</button>
                    <button class="player-tab">Subtitles</button>
                    <button class="player-tab">Chapters</button>
                    <button class="player-tab">Analytics</button>
                    <div class="player-tab-spacer"></div>
                    <span class="player-format-badge">HLS</span>
                    <span class="player-format-badge">DASH</span>
                    <span class="player-format-badge">MP4</span>
                </div>

                <!-- CONTROLS BAR -->
                <div class="player-controls">
                    <!-- Progress bar -->
                    <div class="progress-track">
                        <div class="progress-fill"></div>
                    </div>
                    <!-- Buttons row -->
                    <div class="controls-row">
                        <div class="ctrl-group-left">
                            <!-- Skip back -->
                            <button class="ctrl-btn" title="Previous">
                                <svg viewBox="0 0 24 24"><polygon points="19,5 19,19 5,12"/><rect x="4" y="5" width="2" height="14" rx="1"/></svg>
                            </button>
                            <!-- Play/Pause -->
                            <button class="ctrl-btn play-pause" title="Play/Pause">
                                <svg viewBox="0 0 24 24"><polygon points="5,3 19,12 5,21"/></svg>
                            </button>
                            <!-- Skip forward -->
                            <button class="ctrl-btn" title="Next">
                                <svg viewBox="0 0 24 24"><polygon points="5,5 5,19 19,12"/><rect x="18" y="5" width="2" height="14" rx="1"/></svg>
                            </button>
                            <!-- Volume -->
                            <button class="ctrl-btn" title="Volume">
                                <svg viewBox="0 0 24 24"><polygon points="11,5 6,9 2,9 2,15 6,15 11,19"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07" stroke="currentColor" stroke-width="1.8" fill="none" stroke-linecap="round"/></svg>
                            </button>
                            <input type="range" class="volume-slider" min="0" max="100" value="75">
                            <span class="ctrl-time">0:00 / 0:00</span>
                        </div>
                        <div class="ctrl-group-right">
                            <span class="quality-badge">1080p</span>
                            <!-- Subtitles -->
                            <button class="ctrl-btn" title="Subtitles">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M6 13h12M6 17h8"/></svg>
                            </button>
                            <!-- Settings -->
                            <button class="ctrl-btn" title="Settings">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                            </button>
                            <!-- Fullscreen -->
                            <button class="ctrl-btn" title="Fullscreen">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><polyline points="15 3 21 3 21 9"/><polyline points="9 21 3 21 3 15"/><line x1="21" y1="3" x2="14" y2="10"/><line x1="3" y1="21" x2="10" y2="14"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Admin Settings Panel -->
            <div class="player-admin-panel reveal">
                <div class="admin-panel-header" onclick="toggleAdminPanel()" id="adminPanelHeader">
                    <div class="admin-panel-title">
                        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                        Player Settings &amp; Controls
                    </div>
                    <span class="admin-panel-toggle-icon" id="adminToggleIcon">&#9662;</span>
                </div>
                <div class="admin-panel-body" id="adminPanelBody">

                    <div class="admin-setting-row">
                        <div class="admin-setting-info">
                            <div class="admin-setting-name">Show Advertisement Slides</div>
                            <div class="admin-setting-desc">When enabled, the player area displays configured ad slides instead of the video player.</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="adToggle" onchange="handleAdToggle(this)" <?php checked( get_theme_mod( 'squicky_show_ads', false ) ); ?>>
                            <span class="toggle-track"></span>
                        </label>
                    </div>

                    <div class="admin-setting-row">
                        <div class="admin-setting-info">
                            <div class="admin-setting-name">Auto-play on Page Load</div>
                            <div class="admin-setting-desc">Automatically start playing the first video or ad slide when the page loads.</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="autoPlayToggle" <?php checked( $auto_play ); ?>>
                            <span class="toggle-track"></span>
                        </label>
                    </div>

                    <div class="admin-setting-row">
                        <div class="admin-setting-info">
                            <div class="admin-setting-name">Loop Ad Slides</div>
                            <div class="admin-setting-desc">Continuously loop through advertisement slides until the user dismisses.</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="loopAdsToggle" <?php checked( $loop_ads ); ?>>
                            <span class="toggle-track"></span>
                        </label>
                    </div>

                </div>
            </div>

        </div>
        <p class="hero-tagline reveal" style="margin-top:24px;">
            Universal web player — <strong>HLS, DASH, MP4, YouTube</strong> &amp; more. Embed anywhere.
        </p>
    </div>
</section>

<!-- Brand Statement Section -->
<section class="brand-section">
    <div class="container">
        <h1 class="brand-title reveal">Build. Play. Create.</h1>
        <p class="brand-subtitle reveal">
            Premium web tools and games crafted for speed, privacy, and elegance.
            No bloat. No tracking. Just pure performance.
        </p>
        <div class="stats-grid">
            <div class="stat-card reveal reveal-delay-1">
                <div class="stat-number">2</div>
                <div class="stat-label">Live Tools</div>
            </div>
            <div class="stat-card reveal reveal-delay-2">
                <div class="stat-number">100%</div>
                <div class="stat-label">Privacy First</div>
            </div>
            <div class="stat-card reveal reveal-delay-3">
                <div class="stat-number">&lt;50ms</div>
                <div class="stat-label">Load Time</div>
            </div>
        </div>
    </div>
</section>
