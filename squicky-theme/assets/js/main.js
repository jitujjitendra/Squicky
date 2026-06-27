    (function() {
        'use strict';

        /* ========================================
           THEME MANAGEMENT
           ======================================== */
        var root = document.documentElement;
        var themeBtns = document.querySelectorAll('.theme-btn');
        var savedTheme = localStorage.getItem('squicky-theme') || 'dark';

        function setTheme(theme) {
            root.setAttribute('data-theme', theme);
            localStorage.setItem('squicky-theme', theme);
            themeBtns.forEach(function(btn) {
                btn.classList.toggle('active', btn.dataset.theme === theme);
            });
        }

        setTheme(savedTheme);

        themeBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                setTheme(btn.dataset.theme);
            });
        });

        /* ========================================
           MOBILE NAVIGATION
           ======================================== */
        var hamburger = document.getElementById('hamburger');
        var mobileNav = document.getElementById('mobileNav');

        hamburger.addEventListener('click', function() {
            var isActive = hamburger.classList.toggle('active');
            mobileNav.classList.toggle('open');
            hamburger.setAttribute('aria-expanded', isActive.toString());
        });

        mobileNav.querySelectorAll('a').forEach(function(link) {
            link.addEventListener('click', function() {
                hamburger.classList.remove('active');
                mobileNav.classList.remove('open');
                hamburger.setAttribute('aria-expanded', 'false');
            });
        });

        document.addEventListener('click', function(e) {
            if (!hamburger.contains(e.target) && !mobileNav.contains(e.target)) {
                hamburger.classList.remove('active');
                mobileNav.classList.remove('open');
                hamburger.setAttribute('aria-expanded', 'false');
            }
        });

        /* ========================================
           PARTICLES
           ======================================== */
        var particlesContainer = document.getElementById('particles');
        var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        if (!prefersReducedMotion) {
            for (var i = 0; i < 35; i++) {
                var particle = document.createElement('div');
                particle.classList.add('particle');
                particle.style.left = (Math.random() * 100) + '%';
                particle.style.animationDuration = (Math.random() * 15 + 10) + 's';
                particle.style.animationDelay = (Math.random() * 15) + 's';
                var size = Math.random() * 3 + 1;
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';
                if (Math.random() > 0.5) particle.style.background = 'var(--accent-secondary)';
                particlesContainer.appendChild(particle);
            }
        }

        /* ========================================
           SCROLL REVEAL
           ======================================== */
        var revealEls = document.querySelectorAll('.reveal');
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -60px 0px' });

        revealEls.forEach(function(el) { observer.observe(el); });

        /* ========================================
           HEADER SCROLL
           ======================================== */
        var header = document.getElementById('mainHeader');
        window.addEventListener('scroll', function() {
            header.classList.toggle('scrolled', window.pageYOffset > 50);
        }, { passive: true });

        /* ========================================
           PLAYER MODE TOGGLE (Player ↔ Ad Slides)
           ======================================== */
        window.setPlayerMode = function(mode) {
            var adSlidesView  = document.getElementById('adSlidesView');
            var playerPlayBtn = document.getElementById('playerPlayBtn');
            var modeIndicator = document.getElementById('playerModeIndicator');
            var modeText      = document.getElementById('modeIndicatorText');
            var badge         = document.getElementById('playerBadge');
            var modeBtnPlayer = document.getElementById('modePlayer');
            var modeBtnAd     = document.getElementById('modeAd');
            var adToggle      = document.getElementById('adToggle');

            // Only run if player elements exist on this page
            if (!adSlidesView || !playerPlayBtn) return;

            if (mode === 'ad') {
                adSlidesView.classList.add('active');
                playerPlayBtn.style.display = 'none';
                modeIndicator.classList.add('ad-mode');
                modeText.textContent = 'Ad Slides Mode';
                badge.textContent = 'Advertisement';
                badge.style.background = 'linear-gradient(135deg,#f59e0b,#d97706)';
                modeBtnAd.classList.add('active');
                modeBtnPlayer.classList.remove('active');
                if (adToggle) adToggle.checked = true;
            } else {
                adSlidesView.classList.remove('active');
                playerPlayBtn.style.display = 'flex';
                modeIndicator.classList.remove('ad-mode');
                modeText.textContent = 'Player Mode';
                badge.textContent = 'Featured';
                badge.style.background = '';
                modeBtnPlayer.classList.add('active');
                modeBtnAd.classList.remove('active');
                if (adToggle) adToggle.checked = false;
            }

            // Persist
            localStorage.setItem('squicky-player-mode', mode);
        };

        /* Ad toggle (in settings panel) syncs with mode pill */
        window.handleAdToggle = function(checkbox) {
            setPlayerMode(checkbox.checked ? 'ad' : 'player');
        };

        // Admin panel accordion
        window.toggleAdminPanel = function() {
            var body = document.getElementById('adminPanelBody');
            var icon = document.getElementById('adminToggleIcon');
            if (!body || !icon) return;
            var isOpen = body.classList.toggle('open');
            icon.textContent = isOpen ? '\u25B4' : '\u25BE';
        };

        // Restore saved player mode
        var savedMode = localStorage.getItem('squicky-player-mode') || 'player';
        setPlayerMode(savedMode);

        /* ========================================
           PLAYER PLAY BUTTON TOGGLE
           ======================================== */
        var playerPlayBtn = document.getElementById('playerPlayBtn');
        var isPlaying = false;

        if (playerPlayBtn) {
            playerPlayBtn.addEventListener('click', function() {
                isPlaying = !isPlaying;
                playerPlayBtn.innerHTML = isPlaying
                    ? '<svg viewBox="0 0 24 24" width="28" height="28" fill="#fff"><rect x="6" y="4" width="4" height="16" rx="1"/><rect x="14" y="4" width="4" height="16" rx="1"/></svg>'
                    : '<svg viewBox="0 0 24 24" width="28" height="28" fill="#fff" style="margin-left:4px"><polygon points="5,3 19,12 5,21"/></svg>';
            });
            playerPlayBtn.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); playerPlayBtn.click(); }
            });
        }

        /* Player tab switching */
        document.querySelectorAll('.player-tab').forEach(function(tab) {
            tab.addEventListener('click', function() {
                document.querySelectorAll('.player-tab').forEach(function(t) { t.classList.remove('active'); });
                tab.classList.add('active');
            });
        });

        /* ========================================
           SMOOTH SCROLL
           ======================================== */
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                var href = this.getAttribute('href');
                if (href === '#') return;
                var target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    var top = target.getBoundingClientRect().top + window.pageYOffset - 80;
                    window.scrollTo({ top: top, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
                }
            });
        });

        /* ========================================
           NEWSLETTER FORM
           ======================================== */
        var newsletterForm = document.getElementById('newsletterForm');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                var btn = this.querySelector('.newsletter-btn');
                var input = this.querySelector('.newsletter-input');
                var orig = btn.textContent;
                btn.textContent = 'Subscribed!';
                btn.style.background = 'linear-gradient(135deg,#10b981,#059669)';
                input.value = '';
                setTimeout(function() { btn.textContent = orig; btn.style.background = ''; }, 3000);
            });
        }

    })();
