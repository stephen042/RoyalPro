<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex align-items-center">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                href="javascript:void(0);"></a>
            <div class="responsive-logo">
                <a href="{{ route('user_dashboard') }}" class="header-logo"
                    style="display: flex; align-items: center; justify-content: center;">
                    {{-- <img src="{{ URL('home-assets/assets/img/forex-logo.png') }}" class="mobile-logo logo-1"
                        style="width: 60px; height: 40px; filter: brightness(0.5);margin: 0 2px" alt="logo">
                    <img src="{{ URL('home-assets/assets/img/forex-logo.png') }}" class="mobile-logo dark-logo-1"
                        style="width: 60px; height: 40px;margin: 0 2px" alt="logo"> --}}
                    <div
                        style="display: flex; align-items: center; justify-content: center; gap: 8px; padding: 0.5rem 0; width: 100%; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">

                        <span
                            style="width: 6px; height: 6px; background-color: #10b981; border-radius: 50%; margin-right: 6px; display: inline-block; animation: pulse 2s infinite;">
                        </span>


                        <span
                            style="font-size: 1.1rem; font-weight: 800; letter-spacing: 0.04em; text-transform: uppercase; background: linear-gradient(135deg, #ffffff 30%, #a0aec0 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; drop-shadow: 0px 2px 8px rgba(0,0,0,0.5);">
                            {{ env('APP_NAME') }}
                        </span>

                    </div>
                </a>
            </div>

            <!-- sidebar-toggle-->
            <a class="logo-horizontal " href="{{ route('user_dashboard') }}">
                <img src="{{ URL('home-assets/assets/img/forex-logo.png') }}" class="mobile-logo dark-logo-1"
                    alt="logo" style="width: 90px; height: 90px;">
                <img src="{{ URL('home-assets/assets/img/forex-logo.png') }}" class="mobile-logo logo-1"
                    style="filter: brightness(0.5);width: 90px; height: 90px;" alt="logo">
            </a>
            <!-- LOGO -->
            <div class="d-flex order-lg-2 ms-auto header-right-icons">

                <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical text-dark"></span>
                </button>
                <livewire:user.user-nav />
            </div>
        </div>
    </div>
</div>
<!-- <div class="app-header header sticky"> -->
<div class="container-fluid main-container">
    <div class="d-flex align-items-center">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                {
                    "symbols": [{
                            "proName": "FOREXCOM:SPXUSD",
                            "title": "S&P 500"
                        },
                        {
                            "proName": "FOREXCOM:NSXUSD",
                            "title": "US 100"
                        },
                        {
                            "proName": "FX_IDC:EURUSD",
                            "title": "EUR/USD"
                        },
                        {
                            "proName": "BITSTAMP:BTCUSD",
                            "title": "Bitcoin"
                        },
                        {
                            "proName": "BITSTAMP:ETHUSD",
                            "title": "Ethereum"
                        }
                    ],
                    "showSymbolLogo": true,
                    "colorTheme": "dark",
                    "isTransparent": false,
                    "displayMode": "adaptive",
                    "locale": "en"
                }
            </script>
        </div>
        <!-- TradingView Widget END -->
    </div>
</div>
<!-- </div> -->
