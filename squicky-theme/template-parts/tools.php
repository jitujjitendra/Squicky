<?php
/**
 * Template part: Tools Section
 *
 * @package Squicky_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<!-- Tools Section -->
<section id="tools">
    <div class="container">
        <div class="section-header reveal">
            <span class="section-label">Our Tools</span>
            <h2 class="section-title">Powerful Web Tools</h2>
            <p class="section-desc">
                Lightweight, blazing-fast tools that respect your privacy and get the job done.
                All processing happens in your browser.
            </p>
        </div>
        <div class="tools-grid">
            <!-- Tool 1: Squicky Player -->
            <div class="tool-card reveal reveal-delay-1">
                <span class="tool-badge live">Live</span>
                <div class="tool-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#fff">
                        <polygon points="5,3 19,12 5,21"/>
                    </svg>
                </div>
                <h3 class="tool-title">Squicky Player</h3>
                <p class="tool-desc">
                    A universal web media player supporting HLS, DASH, MP4, and more.
                    Lightweight, customizable, and embeddable anywhere with a single script tag.
                </p>
                <a href="#" class="tool-link">
                    Launch Player
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </a>
            </div>
            <!-- Tool 2: Squicky PDF -->
            <div class="tool-card reveal reveal-delay-2">
                <span class="tool-badge live">Live</span>
                <div class="tool-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#fff">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8" fill="none" stroke="#fff" stroke-width="1.5"/>
                    </svg>
                </div>
                <h3 class="tool-title">Squicky PDF</h3>
                <p class="tool-desc">
                    Fast, client-side PDF viewer and toolkit. Merge, split, compress, and annotate
                    PDFs without uploading to any server. Your files never leave your device.
                </p>
                <a href="#" class="tool-link">
                    Open PDF Tool
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </a>
            </div>
            <!-- Tool 3: Coming Soon -->
            <div class="tool-card reveal reveal-delay-3" style="opacity: 0.7;">
                <span class="tool-badge soon">Soon</span>
                <div class="tool-icon" style="background: var(--bg-tertiary); box-shadow: none;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--text-muted)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="8" x2="12" y2="12"/>
                        <line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                </div>
                <h3 class="tool-title" style="color: var(--text-muted);">Coming Soon</h3>
                <p class="tool-desc">
                    A new Squicky tool is under development. Stay tuned for the launch announcement.
                </p>
                <span style="font-size: 0.8rem; color: var(--text-muted); font-weight: 500;">In development</span>
            </div>
            <!-- Tool 4: Coming Soon -->
            <div class="tool-card reveal reveal-delay-4" style="opacity: 0.7;">
                <span class="tool-badge soon">Soon</span>
                <div class="tool-icon" style="background: var(--bg-tertiary); box-shadow: none;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--text-muted)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="8" x2="12" y2="12"/>
                        <line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                </div>
                <h3 class="tool-title" style="color: var(--text-muted);">Coming Soon</h3>
                <p class="tool-desc">
                    Another powerful Squicky tool is on the way. Follow us for updates and early access.
                </p>
                <span style="font-size: 0.8rem; color: var(--text-muted); font-weight: 500;">In development</span>
            </div>
        </div>
    </div>
</section>
