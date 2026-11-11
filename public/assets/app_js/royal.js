(function () {
    'use strict';

    var root = document.documentElement;
    var body = document.body;

    function currentTheme() {
        return body && body.classList.contains('dark-mode') ? 'dark' : 'light';
    }

    function syncTheme() {
        if (!body) return;
        var theme = currentTheme();
        root.dataset.rxTheme = theme;
        root.style.colorScheme = theme;
    }

    function hideLoader() {
        var loader = document.getElementById('global-loader');
        if (!loader || loader.classList.contains('is-hidden')) return;
        loader.classList.add('is-hidden');
        window.setTimeout(function () {
            loader.style.display = 'none';
        }, 320);
    }

    /* ------------------------------------------------------------------
     * Active navigation state (server-side already marks most links;
     * this covers the mobile bottom bar and nested items reliably).
     * ---------------------------------------------------------------- */
    function normalize(path) {
        return (path || '/').replace(/\/+$/, '') || '/';
    }

    function markActiveLinks() {
        var path = normalize(window.location.pathname);

        document.querySelectorAll('.rx-nav__link[href], .rx-nav__sublink[href]').forEach(function (link) {
            var href = link.getAttribute('href');
            if (!href || href.indexOf('javascript:') === 0 || href.charAt(0) === '#') return;
            try {
                var target = normalize(new URL(href, window.location.origin).pathname);
                if (target === path) link.classList.add('is-active');
            } catch (error) {
                /* ignore invalid hrefs */
            }
        });

        document.querySelectorAll('.rx-bottomnav a[href]').forEach(function (link) {
            var href = link.getAttribute('href');
            if (!href || href.indexOf('javascript:') === 0) return;
            try {
                var target = normalize(new URL(href, window.location.origin).pathname);
                if (target === path) link.classList.add('is-active');
            } catch (error) {
                /* ignore */
            }
        });
    }

    /* ------------------------------------------------------------------
     * Sidebar (off-canvas on mobile, collapsible groups everywhere)
     * ---------------------------------------------------------------- */
    function isDesktop() {
        return window.innerWidth >= 1200;
    }

    function closeSidebar() {
        if (body) body.classList.remove('rx-sidebar-open');
    }

    function initSidebar() {
        document.querySelectorAll('[data-rx-sidebar-toggle]').forEach(function (toggle) {
            toggle.addEventListener('click', function (event) {
                event.preventDefault();
                if (!body) return;
                body.classList.toggle('rx-sidebar-open');
            });
        });

        var overlay = document.querySelector('.rx-rail__overlay');
        if (overlay) {
            overlay.addEventListener('click', closeSidebar);
        }

        document.querySelectorAll('[data-rx-slide]').forEach(function (trigger) {
            trigger.addEventListener('click', function (event) {
                event.preventDefault();
                var item = trigger.closest('.rx-nav__item');
                if (!item) return;
                var open = item.classList.contains('is-open');
                item.parentElement.querySelectorAll('.rx-nav__item.is-open').forEach(function (sibling) {
                    if (sibling !== item) sibling.classList.remove('is-open');
                });
                item.classList.toggle('is-open', !open);
            });
        });

        document.querySelectorAll('.rx-nav__sublink').forEach(function (link) {
            link.addEventListener('click', function () {
                if (!isDesktop()) closeSidebar();
            });
        });

        document.querySelectorAll('.rx-nav__link[href]').forEach(function (link) {
            if (link.hasAttribute('data-rx-slide')) return;
            link.addEventListener('click', function () {
                if (!isDesktop()) closeSidebar();
            });
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') closeSidebar();
        });
    }

    /* ------------------------------------------------------------------
     * Dropdowns — click triggered, closes on outside click / Escape
     * (Bootstrap data-api also works; this keeps them consistent)
     * ---------------------------------------------------------------- */
    function closeDropdowns(except) {
        document.querySelectorAll('.rx-dropdown.show').forEach(function (menu) {
            if (menu === except) return;
            menu.classList.remove('show');
            var toggle = menu.previousElementSibling;
            if (toggle) toggle.setAttribute('aria-expanded', 'false');
        });
    }

    function initDropdowns() {
        document.querySelectorAll('[data-rx-dropdown]').forEach(function (toggle) {
            toggle.addEventListener('click', function (event) {
                event.preventDefault();
                event.stopPropagation();
                var menuId = toggle.getAttribute('data-rx-dropdown');
                var menu = menuId ? document.getElementById(menuId) : null;
                if (!menu) return;
                var willOpen = !menu.classList.contains('show');
                closeDropdowns(menu);
                menu.classList.toggle('show', willOpen);
                toggle.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
            });
        });

        document.addEventListener('click', function (event) {
            if (!event.target.closest('.rx-dropdown') && !event.target.closest('[data-rx-dropdown]')) {
                closeDropdowns();
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') closeDropdowns();
        });
    }

    /* ------------------------------------------------------------------
     * Tooltips (Bootstrap, when available)
     * ---------------------------------------------------------------- */
    function initTooltips() {
        if (!window.bootstrap || !bootstrap.Tooltip) return;
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function (element) {
            if (!bootstrap.Tooltip.getInstance(element)) {
                new bootstrap.Tooltip(element, { container: 'body', trigger: 'hover' });
            }
        });
    }

    /* ------------------------------------------------------------------
     * Tables
     * ---------------------------------------------------------------- */
    function initTables() {
        document.querySelectorAll('.table-responsive > .table, .rx-table-wrap > .table').forEach(function (table) {
            table.classList.add('align-middle');
        });
    }

    /* ------------------------------------------------------------------
     * Theme observer — keeps data attribute + chart widgets in sync
     * ---------------------------------------------------------------- */
    function watchTheme() {
        if (!body) return;
        var observed = currentTheme();

        var observer = new MutationObserver(function () {
            var theme = currentTheme();
            syncTheme();
            if (theme !== observed) {
                observed = theme;
                document.dispatchEvent(new CustomEvent('rx-theme-changed', {
                    detail: { theme: theme }
                }));
            }
        });

        observer.observe(body, { attributes: true, attributeFilter: ['class'] });
    }

    /* ------------------------------------------------------------------
     * Theme toggle — self-contained (no dependency on switcher scripts)
     * ---------------------------------------------------------------- */
    function applyTheme(dark) {
        body.classList.toggle('dark-mode', dark);
        body.classList.toggle('light-mode', !dark);
        body.classList.toggle('dark-menu', dark);
        body.classList.toggle('light-menu', !dark);
        body.classList.toggle('dark-header', dark);
        body.classList.toggle('light-header', !dark);

        try {
            if (dark) {
                localStorage.setItem('zanexdarkMode', 'true');
                localStorage.removeItem('zanexlightMode');
            } else {
                localStorage.setItem('zanexlightMode', 'true');
                localStorage.removeItem('zanexdarkMode');
            }
        } catch (error) {
            /* storage unavailable */
        }

        syncTheme();
    }

    function initThemeToggle() {
        /* detach the legacy jQuery handler so both don't fight each other */
        if (window.jQuery) {
            window.jQuery('.layout-setting').off('click');
        }

        document.addEventListener('click', function (event) {
            var button = event.target.closest('.layout-setting');
            if (!button) return;
            event.preventDefault();
            applyTheme(!body.classList.contains('dark-mode'));
        });
    }

    function boot() {
        syncTheme();
        hideLoader();
        markActiveLinks();
        initSidebar();
        initDropdowns();
        initTooltips();
        initTables();
        initThemeToggle();
        window.setTimeout(hideLoader, 2400);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', boot);
    } else {
        boot();
    }

    window.addEventListener('load', function () {
        syncTheme();
        hideLoader();
        markActiveLinks();
        initTooltips();
    });

    watchTheme();

    /* Public helpers used by page-level scripts */
    window.RoyalUI = {
        theme: currentTheme,
        closeSidebar: closeSidebar
    };

    window.copyAddress = function (elementId, message) {
        var node = typeof elementId === 'string' ? document.getElementById(elementId) : elementId;
        if (!node) return;

        var text = (node.textContent || '').trim();
        var done = function () {
            window.alert(message || 'Copied to clipboard.');
        };

        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(text).then(done).catch(function () {
                fallbackCopy(node, done);
            });
            return;
        }

        fallbackCopy(node, done);
    };

    function fallbackCopy(node, done) {
        var range = document.createRange();
        range.selectNode(node);
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
        try {
            document.execCommand('copy');
            done();
        } catch (error) {
            /* ignore */
        }
        window.getSelection().removeAllRanges();
    }
})();
