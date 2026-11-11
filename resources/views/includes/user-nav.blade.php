<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex align-items-center w-100 rg-topbar">
            <a aria-label="Toggle sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0);"></a>

            <a href="{{ route('user_dashboard') }}" class="rg-brand d-lg-none">
                <img src="{{ asset('home-assets/assets/img/forex-logo.png') }}" alt="{{ config('app.name') }}" class="rg-brand__logo">
            </a>

            <div class="rg-topbar__context d-none d-lg-flex">
                <span class="rg-status-dot"></span>
                <span>Markets live</span>
                <span class="rg-topbar__divider"></span>
                <span>Client workspace</span>
            </div>

            <div class="header-right-icons">
                <div class="dropdown d-flex">
                    <a class="nav-link icon theme-layout nav-link-bg layout-setting" href="javascript:void(0);" aria-label="Switch color theme" title="Switch color theme">
                        <span class="dark-layout"><i class="fe fe-moon"></i></span>
                        <span class="light-layout"><i class="fe fe-sun"></i></span>
                    </a>
                </div>

                <div class="dropdown d-none d-md-flex">
                    <a class="nav-link icon full-screen-link nav-link-bg" href="javascript:void(0);" aria-label="Toggle fullscreen" title="Toggle fullscreen">
                        <i class="fe fe-minimize fullscreen-button"></i>
                    </a>
                </div>

                <button class="navbar-toggler navresponsive-toggler d-lg-none" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>

                <livewire:user.user-nav />
            </div>
        </div>
    </div>
</div>

<div class="rg-market-strip">
    <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <div class="tradingview-widget-copyright"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
            {
                "symbols": [
                    { "proName": "FOREXCOM:SPXUSD", "title": "S&P 500" },
                    { "proName": "FOREXCOM:NSXUSD", "title": "US 100" },
                    { "proName": "FX_IDC:EURUSD", "title": "EUR/USD" },
                    { "proName": "BITSTAMP:BTCUSD", "title": "Bitcoin" },
                    { "proName": "BITSTAMP:ETHUSD", "title": "Ethereum" }
                ],
                "showSymbolLogo": true,
                "colorTheme": "dark",
                "isTransparent": true,
                "displayMode": "adaptive",
                "locale": "en"
            }
        </script>
    </div>
</div>
