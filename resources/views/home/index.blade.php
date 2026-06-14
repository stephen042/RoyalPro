<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} | Next-Gen Crypto & Forex Trading Platform</title>

    <meta name="description"
        content="Unlock your trading potential with our comprehensive solutions designed to support traders. Explore our expert guidance and lucrative opportunities to propel your trading career.">
    <meta name="keywords" content="{{ env('APP_NAME') }} ">
    <meta property="og:title" content="{{ env('APP_NAME') }}   Forex Trading">
    <meta property="og:description"
        content="Unlock your trading potential with our comprehensive solutions designed to support traders. Explore our expert guidance and lucrative opportunities to propel your trading career.">
    <meta property="og:type" content="website">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('home-assets/assets/img/forex-logo.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('home-assets/assets/img/forex-logo.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('home-assets/assets/img/forex-logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('home-assets/assets/img/forex-logo.png') }}">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            dark: '#0B0F19',
                            card: '#151B2C',
                            primary: '#6366F1', // Indigo
                            accent: '#10B981', // Emerald Green
                            crypto: '#F59E0B' // Amber
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom scrollbar for premium feel */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #0B0F19;
        }

        ::-webkit-scrollbar-thumb {
            background: #1E293B;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #334155;
        }
    </style>
</head>

<body class="bg-brand-dark text-gray-100 font-sans antialiased overflow-x-hidden">

    <!-- JS Preloader Screen -->
    <div id="preloader"
        class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-brand-dark transition-opacity duration-500">
        <div class="relative w-16 h-16">
            <div class="absolute inset-0 border-4 border-brand-primary/20 rounded-full"></div>
            <div class="absolute inset-0 border-4 border-t-brand-accent rounded-full animate-spin"></div>
        </div>
        <p class="mt-4 text-sm font-semibold tracking-widest text-gray-400 uppercase animate-pulse">
            {{ env('APP_NAME') }} Securing
            Connection...</p>
    </div>

    <!-- Navigation Header -->
    <header class="sticky top-0 z-40 backdrop-blur-md bg-brand-dark/80 border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <!-- Logo Image -->
                <img src="{{ asset('home-assets/assets/img/forex-logo.png') }}" alt="{{ env('APP_NAME') }} Logo"
                    class="w-8 h-8 object-contain">

                <!-- Brand Name -->
                <span
                    class="text-xl font-bold tracking-tight bg-gradient-to-r from-white to-gray-400 bg-clip-text text-transparent">
                    {{ env('APP_NAME') }}
                </span>
            </div>
            <!-- Desktop Navbar -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-gray-400">
                <a href="#markets" class="hover:text-white transition-colors">Markets</a>
                <a href="#features" class="hover:text-white transition-colors">Features</a>
                <a href="#about" class="hover:text-white transition-colors">About Us</a>
                <a href="#testimonials" class="hover:text-white transition-colors">Testimonials</a>
                <a href="#contact" class="hover:text-white transition-colors">Contact</a>
            </nav>

            <div class="flex items-center gap-4">
                <a href="/login" class="text-sm font-medium hover:text-white transition-colors hidden sm:block">Sign
                    In</a>
                <a href="/register"
                    class="bg-gradient-to-r from-brand-primary to-indigo-700 hover:opacity-90 text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-lg shadow-brand-primary/20 transition-all transform hover:-translate-y-0.5">Start
                    Trading</a>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden text-gray-400 hover:text-white focus:outline-none"
                    aria-label="Toggle Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Dropdown -->
        <div id="mobile-menu"
            class="hidden md:hidden bg-brand-dark/95 border-b border-gray-800 px-4 pt-2 pb-6 absolute w-full left-0 transition-all duration-300">
            <nav class="flex flex-col gap-4 text-base font-medium text-gray-400">
                <a href="#markets" class="mobile-link hover:text-white transition-colors py-2">Markets</a>
                <a href="#features" class="mobile-link hover:text-white transition-colors py-2">Features</a>
                <a href="#about" class="mobile-link hover:text-white transition-colors py-2">About Us</a>
                <a href="#testimonials" class="mobile-link hover:text-white transition-colors py-2">Testimonials</a>
                <a href="#contact" class="mobile-link hover:text-white transition-colors py-2">Contact</a>
                <hr class="border-gray-800 my-2">
                <a href="/login" class="mobile-link hover:text-white transition-colors py-2">Sign In</a>
                <a href="/register" class="mobile-link hover:text-white transition-colors py-2">Create Account</a>
            </nav>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="relative pt-8 pb-16 lg:pt-20 lg:pb-28 overflow-hidden">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-full pointer-events-none">
                <div
                    class="absolute top-[-10%] left-[-10%] w-[300px] sm:w-[500px] h-[300px] sm:h-[500px] bg-brand-primary/10 rounded-full blur-[120px]">
                </div>
                <div
                    class="absolute bottom-[10%] right-[-10%] w-[250px] sm:w-[400px] h-[250px] sm:h-[400px] bg-brand-accent/10 rounded-full blur-[100px]">
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    <div class="lg:col-span-6 text-center lg:text-left">
                        <span
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-brand-accent/10 text-brand-accent mb-6 border border-brand-accent/20">
                            <span class="w-2 h-2 rounded-full bg-brand-accent animate-ping"></span>
                            New: Zero-fee Crypto Deposits
                        </span>
                        <h1
                            class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-tight">
                            Trade Forex & Crypto <br class="hidden sm:inline">
                            <span
                                class="bg-gradient-to-r from-brand-accent via-brand-primary to-brand-crypto bg-clip-text text-transparent">With
                                Institutional Power</span>
                        </h1>
                        <p class="mt-6 text-base sm:text-lg text-gray-400 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                            Access global markets effortlessly. Trade over 90+ FX pairs and major digital assets with
                            ultra-low latency execution, deep liquidity, and military-grade encryption.
                        </p>
                        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                            <a href="/register"
                                class="w-full sm:w-auto bg-brand-accent hover:bg-emerald-600 text-brand-dark font-bold px-8 py-4 rounded-xl shadow-lg shadow-brand-accent/20 transition-all text-center">Create
                                Free Account</a>
                            <a href="#markets"
                                class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 text-white font-medium px-8 py-4 rounded-xl transition-all border border-gray-700 text-center flex items-center justify-center gap-2">
                                View Live Charts
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Hero Visual (TradingView Advanced Chart Widget) -->
                    <div class="lg:col-span-6 w-full">
                        <div class="bg-brand-card border border-gray-800 rounded-2xl p-3 sm:p-4 shadow-2xl relative">
                            <div class="flex items-center justify-between border-b border-gray-800 pb-3 mb-3">
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-red-500"></span>
                                    <span class="w-2.5 h-2.5 rounded-full bg-yellow-500"></span>
                                    <span class="w-2.5 h-2.5 rounded-full bg-green-500"></span>
                                    <span class="text-[10px] font-mono text-gray-500 ml-1">terminal_core.io</span>
                                </div>
                                <span
                                    class="text-[10px] font-semibold text-brand-accent bg-brand-accent/10 px-2 py-0.5 rounded animate-pulse">Live
                                    Feed</span>
                            </div>

                            <!-- TradingView Widget Container -->
                            <div class="w-full h-[320px] sm:h-[400px] rounded-lg overflow-hidden bg-[#131722]">
                                <!-- TradingView Widget BEGIN -->
                                <div class="tradingview-widget-container" style="height:100%;width:100%;">
                                    <div id="tradingview_advanced_chart" style="height:100%;width:100%;"></div>
                                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                                    <script type="text/javascript">
                                        new TradingView.widget({
                                            "autosize": true,
                                            "symbol": "BINANCE:BTCUSDT",
                                            "interval": "D",
                                            "timezone": "Etc/UTC",
                                            "theme": "dark",
                                            "style": "1",
                                            "locale": "en",
                                            "enable_publishing": false,
                                            "hide_side_toolbar": true,
                                            "allow_symbol_change": true,
                                            "container_id": "tradingview_advanced_chart"
                                        });
                                    </script>
                                </div>
                                <!-- TradingView Widget END -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Markets Live Ticker Section (TradingView Ticker Widget) -->
        <section id="markets" class="py-4 border-y border-gray-800 bg-brand-card/30">
            <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-tickers.js" async>
                        {
                            "symbols": [{
                                    "proName": "FOREXCOM:SPX500",
                                    "title": "S&P 500 Index"
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
                            "colorTheme": "dark",
                            "isTransparent": true,
                            "showSymbolLogo": true,
                            "locale": "en"
                        }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-16 lg:py-28">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
                    <h2 class="text-2xl sm:text-4xl font-bold tracking-tight">Engineered for Elite Performance</h2>
                    <p class="mt-4 text-gray-400 text-sm sm:text-base">Skip the middlemen. Experience clean,
                        institutional trading infrastructure designed for retail investors.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                    <!-- Feature 1 -->
                    <div
                        class="p-6 sm:p-8 bg-brand-card rounded-2xl border border-gray-800 hover:border-gray-700 transition-all group">
                        <div
                            class="w-12 h-12 rounded-xl bg-brand-primary/10 flex items-center justify-center text-brand-primary mb-6 group-hover:bg-brand-primary group-hover:text-white transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold mb-3 text-white">Ultra-Fast Execution</h3>
                        <p class="text-gray-400 text-sm leading-relaxed">Trades processed under 4ms within global data
                            hubs, minimizing slippage to ensure accurate pricing.</p>
                    </div>

                    <!-- Feature 2 -->
                    <div
                        class="p-6 sm:p-8 bg-brand-card rounded-2xl border border-gray-800 hover:border-gray-700 transition-all group">
                        <div
                            class="w-12 h-12 rounded-xl bg-brand-accent/10 flex items-center justify-center text-brand-accent mb-6 group-hover:bg-brand-accent group-hover:text-brand-dark transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold mb-3 text-white">Advanced Data Feed</h3>
                        <p class="text-gray-400 text-sm leading-relaxed">Over 100+ native indicators, customizable
                            order flow layouts, and native high-speed engine modules.</p>
                    </div>

                    <!-- Feature 3 -->
                    <div
                        class="p-6 sm:p-8 bg-brand-card rounded-2xl border border-gray-800 hover:border-gray-700 transition-all group">
                        <div
                            class="w-12 h-12 rounded-xl bg-brand-crypto/10 flex items-center justify-center text-brand-crypto mb-6 group-hover:bg-brand-crypto group-hover:text-brand-dark transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold mb-3 text-white">Multi-Asset Wallet</h3>
                        <p class="text-gray-400 text-sm leading-relaxed">Safely store fiat capital and crypto holdings
                            concurrently in an isolated multi-sig secure environment.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Us Section -->
        <section id="about" class="py-16 bg-brand-card/20 border-t border-gray-800 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div
                        class="relative rounded-2xl overflow-hidden shadow-2xl border border-gray-800 h-64 sm:h-96 order-last lg:order-first">
                        <img id="about-img"
                            data-src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=800&q=80"
                            alt="{{ env('APP_NAME') }} Global Team Office"
                            class="w-full h-full object-cover opacity-0 transition-opacity duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-brand-dark to-transparent"></div>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-brand-primary uppercase tracking-widest">Who We Are</span>
                        <h2 class="text-2xl sm:text-4xl font-bold tracking-tight text-white mt-2">Pioneering Financial
                            Freedom Since 2018</h2>
                        <p class="mt-4 text-gray-400 text-sm sm:text-base leading-relaxed">
                            {{ env('APP_NAME') }} was built by a coalition of quantitative traders, cybersecurity
                            researchers, and
                            blockchain engineers. Our goal is simple: eliminate unequal access to financial tools by
                            bringing professional, low-latency market infrastructure right to your screen.
                        </p>
                        <div class="grid grid-cols-3 gap-4 mt-8 border-t border-gray-800 pt-6">
                            <div>
                                <h4 class="text-xl sm:text-2xl font-bold text-white">$4.2B+</h4>
                                <p class="text-xs text-gray-500 mt-1">Quarterly Volume</p>
                            </div>
                            <div>
                                <h4 class="text-xl sm:text-2xl font-bold text-brand-accent">99.99%</h4>
                                <p class="text-xs text-gray-500 mt-1">System Uptime</p>
                            </div>
                            <div>
                                <h4 class="text-xl sm:text-2xl font-bold text-brand-crypto">200k+</h4>
                                <p class="text-xs text-gray-500 mt-1">Active Accounts</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Security Spotlight (Split Image Content) -->
        <section id="security" class="py-16 border-y border-gray-800 bg-brand-card/40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-2xl sm:text-4xl font-bold tracking-tight text-white">Your Funds, Protected
                            Tier-1 Style.</h2>
                        <p class="mt-4 text-gray-400 text-sm sm:text-base leading-relaxed">
                            Security isn't an added feature; it's our foundational metric. We preserve strict 1:1 asset
                            backing ratios on all client assets, stored safely within multi-sig ledger structures.
                        </p>
                        <ul class="mt-6 space-y-4 text-sm text-gray-300">
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-brand-accent flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Multi-Signature Cold Vault Operations
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-brand-accent flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Full SAFU Coverage Policy Protections
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-brand-accent flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Real-Time Cryptographic Proof of Reserves
                            </li>
                        </ul>
                    </div>
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-gray-800 h-64 sm:h-96">
                        <img id="security-img"
                            data-src="https://images.unsplash.com/photo-1639762681485-074b7f938ba0?auto=format&fit=crop&w=800&q=80"
                            alt="Cybersecurity Cryptographic Key Network"
                            class="w-full h-full object-cover opacity-0 transition-opacity duration-700">
                        <div class="absolute inset-0 bg-gradient-to-r from-brand-dark to-transparent"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section id="testimonials" class="py-16 lg:py-28">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
                    <span class="text-xs font-bold text-brand-crypto uppercase tracking-widest">Global Feedback</span>
                    <h2 class="text-2xl sm:text-4xl font-bold tracking-tight text-white mt-2">Trusted by Traders
                        Worldwide</h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                    <!-- Card 1 -->
                    <div
                        class="p-6 sm:p-8 bg-brand-card rounded-2xl border border-gray-800 flex flex-col justify-between">
                        <p class="text-gray-300 text-sm leading-relaxed italic">"The latency scaling here is
                            incomparable. I run high-frequency intra-day forex strategies and slippage is virtually
                            nonexistent. Best institutional terminal layout for retail accounts."</p>
                        <div class="flex items-center gap-4 mt-6 border-t border-gray-800 pt-4">
                            <div class="w-10 h-10 rounded-full bg-gray-700 overflow-hidden">
                                <img id="user1-img"
                                    data-src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=150&q=80"
                                    alt="User Marcus V."
                                    class="w-full h-full object-cover opacity-0 transition-opacity duration-700">
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-white">Marcus V.</h4>
                                <p class="text-xs text-brand-accent">Algo-Trader & Quant</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div
                        class="p-6 sm:p-8 bg-brand-card rounded-2xl border border-gray-800 flex flex-col justify-between">
                        <p class="text-gray-300 text-sm leading-relaxed italic">"Managing cross-asset liquidity across
                            physical FX setups and on-chain decentralized vaults was a mess until
                            {{ env('APP_NAME') }}.
                            The unified
                            wallet dashboard is remarkably intuitive and responsive."</p>
                        <div class="flex items-center gap-4 mt-6 border-t border-gray-800 pt-4">
                            <div class="w-10 h-10 rounded-full bg-gray-700 overflow-hidden">
                                <img id="user2-img"
                                    data-src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=150&q=80"
                                    alt="User Elena R."
                                    class="w-full h-full object-cover opacity-0 transition-opacity duration-700">
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-white">Elena R.</h4>
                                <p class="text-xs text-brand-primary">Portfolio Manager</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div
                        class="p-6 sm:p-8 bg-brand-card rounded-2xl border border-gray-800 flex flex-col justify-between md:col-span-2 lg:col-span-1">
                        <p class="text-gray-300 text-sm leading-relaxed italic">"What stood out to me most was the
                            transparent Proof of Reserves asset confirmation model. It gives you immediate peace of mind
                            knowing your margin requirements are backed 1:1."</p>
                        <div class="flex items-center gap-4 mt-6 border-t border-gray-800 pt-4">
                            <div class="w-10 h-10 rounded-full bg-gray-700 overflow-hidden">
                                <img id="user3-img"
                                    data-src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=150&q=80"
                                    alt="User David K."
                                    class="w-full h-full object-cover opacity-0 transition-opacity duration-700">
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-white">David K.</h4>
                                <p class="text-xs text-brand-crypto">Crypto Derivatives Specialist</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Us Section -->
        <section id="contact" class="py-16 bg-brand-card/30 border-y border-gray-800 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-12 gap-12">
                    <div class="lg:col-span-5 flex flex-col justify-between">
                        <div>
                            <span class="text-xs font-bold text-brand-accent uppercase tracking-widest">Connect With
                                Us</span>
                            <h2 class="text-2xl sm:text-4xl font-bold tracking-tight text-white mt-2">Have questions?
                                Get in touch.</h2>
                            <p class="mt-4 text-gray-400 text-sm sm:text-base leading-relaxed"> Our engineering and
                                financial desks operate 24/7/365 to handle client onboarding queries, account
                                verifications, or premium infrastructure configurations.</p>
                        </div>

                        <div class="mt-8 space-y-4">
                            <div class="flex items-center gap-4 p-4 bg-brand-card rounded-xl border border-gray-800">
                                <div class="text-brand-accent">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L22 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xs text-gray-500">Corporate Inquiries</h4>
                                    <p class="text-sm font-semibold text-white">{{ config('app.Admin_email') }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 p-4 bg-brand-card rounded-xl border border-gray-800">
                                <div class="text-brand-primary">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xs text-gray-500">Global Hub Location</h4>
                                    <p class="text-sm font-semibold text-white">Marina Bay Sands Tower 3, Singapore</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-7">
                        <form id="apex-contact-form"
                            class="p-6 sm:p-8 bg-brand-card rounded-2xl border border-gray-800 space-y-4">
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div class="flex flex-col gap-1.5">
                                    <label class="text-xs font-semibold text-gray-400">First Name</label>
                                    <input type="text" required placeholder="John"
                                        class="bg-brand-dark border border-gray-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-brand-primary transition-colors">
                                </div>
                                <div class="flex flex-col gap-1.5">
                                    <label class="text-xs font-semibold text-gray-400">Email Address</label>
                                    <input type="email" required placeholder="john@example.com"
                                        class="bg-brand-dark border border-gray-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-brand-primary transition-colors">
                                </div>
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label class="text-xs font-semibold text-gray-400">Subject Area</label>
                                <select
                                    class="bg-brand-dark border border-gray-800 rounded-xl px-4 py-3 text-sm text-gray-400 focus:outline-none focus:border-brand-primary transition-colors">
                                    <option>Account Onboarding & KYC</option>
                                    <option>Institutional OTC Desk</option>
                                    <option>API Connection Integration</option>
                                    <option>Other / General Inquiry</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label class="text-xs font-semibold text-gray-400">Message Content</label>
                                <textarea rows="4" required placeholder="How can our trading desks assist you?"
                                    class="bg-brand-dark border border-gray-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-brand-primary transition-colors resize-none"></textarea>
                            </div>
                            <button type="submit"
                                class="w-full bg-brand-primary hover:bg-indigo-600 text-white font-bold py-3.5 rounded-xl transition-all shadow-lg shadow-brand-primary/10">Dispatch
                                Transmission</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        {{-- the contact success modal --}}
        <div id="contact-success-modal"
            class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-brand-dark/80 backdrop-blur-sm transition-opacity duration-300">
            <div
                class="bg-brand-card border border-gray-800 rounded-2xl max-w-md w-full p-6 text-center shadow-2xl transform scale-95 transition-transform duration-300">
                <div
                    class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-brand-accent/10 text-brand-accent mb-4">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                        </path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">Message Dispatched Successfully</h3>
                <p class="text-sm text-gray-400 mb-6 leading-relaxed">
                    We have received your message! For a faster response, please chat with our <span
                        class="text-brand-accent font-semibold">Live Chat</span> team directly on the site.
                </p>
                <button id="close-modal-btn"
                    class="w-full bg-gray-800 hover:bg-gray-700 text-white font-semibold py-2.5 rounded-xl transition-all border border-gray-700">
                    Acknowledge
                </button>
            </div>
        </div>


        <!-- Final CTA conversion section -->
        <section class="py-16 sm:py-24 relative">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
                <h2 class="text-3xl sm:text-5xl font-extrabold tracking-tight">Ready to Master the Markets?</h2>
                <p class="mt-4 text-gray-400 max-w-xl mx-auto text-sm sm:text-base">Join 400,000+ active global traders
                    maximizing performance margins daily.</p>
                <div class="mt-8">
                    <a href="/register"
                        class="inline-block bg-gradient-to-r from-brand-accent to-emerald-500 text-brand-dark font-bold px-8 py-4 rounded-xl shadow-xl shadow-brand-accent/10 hover:opacity-90 transition-all transform hover:-translate-y-0.5">Open
                        Your Account Now</a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="border-t border-gray-800 bg-brand-dark py-12 text-sm text-gray-500">
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-6">
            <p>&copy; 2026 {{ env('APP_NAME') }} Technologies Inc. All rights reserved.</p>
            <p class="max-w-md text-center md:text-right text-xs leading-relaxed">
                Risk Warning: Trading derivative contracts carries extreme levels of portfolio risk. Ensure your
                objectives align with financial realities before engaging.
            </p>
        </div>
    </footer>

    <!-- Smart JS Navigation & Preloader Logic -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Mobile Menu Toggle Execution
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuIcon = document.getElementById('menu-icon');

            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');

                // Swap icon outlines depending on state
                if (mobileMenu.classList.contains('hidden')) {
                    menuIcon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
                } else {
                    menuIcon.setAttribute('d', 'M6 18L18 6M6 6l12 12');
                }
            });

            // Close mobile layout menu on click of dropdown items
            document.querySelectorAll('.mobile-link').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    menuIcon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
                });
            });

            // Preloader Image Asset Management Code
            const preloader = document.getElementById('preloader');
            const imagesToLoad = document.querySelectorAll('img[data-src]');
            let loadedCount = 0;

            if (imagesToLoad.length === 0) {
                hidePreloader();
            }

            imagesToLoad.forEach((img) => {
                const src = img.getAttribute('data-src');
                if (!src) return;

                const tempImg = new Image();
                tempImg.src = src;
                tempImg.onload = () => {
                    img.src = src;
                    img.classList.remove('opacity-0');
                    img.classList.add('opacity-100');

                    loadedCount++;
                    if (loadedCount === imagesToLoad.length) {
                        hidePreloader();
                    }
                };
                tempImg.onerror = () => {
                    img.src = src;
                    hidePreloader();
                };
            });

            function hidePreloader() {
                setTimeout(() => {
                    preloader.classList.add('opacity-0');
                    setTimeout(() => {
                        preloader.style.display = 'none';
                    }, 500);
                }, 400);
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const contactForm = document.getElementById('apex-contact-form');
            const successModal = document.getElementById('contact-success-modal');
            const closeModalBtn = document.getElementById('close-modal-btn');

            if (contactForm && successModal && closeModalBtn) {
                // Handle Form Submission Interception
                contactForm.addEventListener('submit', (event) => {
                    event.preventDefault(); // Stop page from refreshing natively

                    // Reveal popup modal layer smoothly
                    successModal.classList.remove('hidden');

                    // Clear out text boxes upon transmission completion
                    contactForm.reset();
                });

                // Handle Closing Event
                closeModalBtn.addEventListener('click', () => {
                    successModal.classList.add('hidden');
                });

                // Optional: Close modal if background context overlay wrapper is clicked
                successModal.addEventListener('click', (e) => {
                    if (e.target === successModal) {
                        successModal.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</body>

</html>
