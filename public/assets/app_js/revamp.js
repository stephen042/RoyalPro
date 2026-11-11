(function () {
    'use strict';

    const root = document.documentElement;
    const body = document.body;

    const currentTheme = () => body && body.classList.contains('dark-mode') ? 'dark' : 'light';

    const syncTheme = () => {
        if (!body) return;
        const theme = currentTheme();
        root.dataset.rgTheme = theme;
        root.style.colorScheme = theme;
    };

    const hideLoader = () => {
        const loader = document.getElementById('global-loader');
        if (!loader || loader.classList.contains('is-hidden')) return;
        loader.classList.add('is-hidden');
        window.setTimeout(() => {
            loader.style.display = 'none';
        }, 320);
    };

    const markActiveLinks = () => {
        const path = window.location.pathname.replace(/\/+$/, '') || '/';

        document.querySelectorAll('.side-menu__item[href]').forEach((link) => {
            const href = link.getAttribute('href');
            if (!href || href === 'javascript:void(0);' || href.charAt(0) === '#') return;
            try {
                const target = new URL(href, window.location.origin).pathname.replace(/\/+$/, '') || '/';
                if (target === path) link.classList.add('active');
            } catch (error) {
                link.classList.remove('active');
            }
        });

        document.querySelectorAll('.slide-item[href]').forEach((link) => {
            try {
                const target = new URL(link.getAttribute('href'), window.location.origin).pathname.replace(/\/+$/, '') || '/';
                if (target === path) {
                    link.classList.add('active');
                    const slide = link.closest('.slide');
                    if (slide) slide.classList.add('is-expanded');
                }
            } catch (error) {
                link.classList.remove('active');
            }
        });

        document.querySelectorAll('.bottom-navbar a[href]').forEach((link) => {
            try {
                const target = new URL(link.getAttribute('href'), window.location.origin).pathname.replace(/\/+$/, '') || '/';
                if (target === path) link.classList.add('active');
            } catch (error) {
                link.classList.remove('active');
            }
        });
    };

    const closeMobileSidebar = (event) => {
        if (window.innerWidth >= 992) return;
        if (!event.target.closest('.app-sidebar .side-menu__item, .app-sidebar .slide-item')) return;
        body.classList.remove('sidenav-toggled');
        body.classList.remove('sidebar-gone');
    };

    const initTooltips = () => {
        if (!window.bootstrap || !bootstrap.Tooltip) return;
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach((element) => {
            if (!bootstrap.Tooltip.getInstance(element)) {
                new bootstrap.Tooltip(element, { container: 'body', trigger: 'hover' });
            }
        });
    };

    const initTables = () => {
        document.querySelectorAll('.table-responsive > .table').forEach((table) => {
            table.classList.add('align-middle');
        });
    };

    document.addEventListener('DOMContentLoaded', () => {
        syncTheme();
        hideLoader();
        markActiveLinks();
        initTooltips();
        initTables();
        window.setTimeout(hideLoader, 2200);
    });

    window.addEventListener('load', () => {
        syncTheme();
        hideLoader();
        markActiveLinks();
        initTooltips();
    });

    document.addEventListener('click', closeMobileSidebar);

    if (body) {
        let observedTheme = currentTheme();
        const observer = new MutationObserver(() => {
            const theme = currentTheme();
            syncTheme();
            if (theme !== observedTheme) {
                observedTheme = theme;
                document.dispatchEvent(new CustomEvent('rg-theme-changed', {
                    detail: { theme: theme }
                }));
            }
        });

        observer.observe(body, { attributes: true, attributeFilter: ['class'] });
    }
})();
