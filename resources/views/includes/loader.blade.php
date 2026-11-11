<script>
    (function () {
        try {
            var dark = localStorage.getItem('zanexdarkMode');
            var light = localStorage.getItem('zanexlightMode');
            var body = document.body;
            var useDark = Boolean(dark) && !light;
            body.classList.remove('dark-mode', 'dark-menu', 'dark-header', 'light-mode', 'light-menu', 'light-header');
            body.classList.add('rx-app');
            body.classList.add(useDark ? 'dark-mode' : 'light-mode');
            body.classList.add(useDark ? 'dark-menu' : 'light-menu');
            body.classList.add(useDark ? 'dark-header' : 'light-header');
            document.documentElement.dataset.rxTheme = useDark ? 'dark' : 'light';
            document.documentElement.style.colorScheme = useDark ? 'dark' : 'light';
        } catch (error) {}
    })();
</script>
<div id="global-loader" class="rx-loader">
    <div class="rx-loader__inner">
        <div class="rx-loader__mark">{{ strtoupper(substr(config('app.name'), 0, 1)) }}</div>
        <div class="rx-loader__bar"></div>
        <p class="rx-loader__text">Loading workspace</p>
    </div>
</div>
