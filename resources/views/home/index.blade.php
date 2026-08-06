<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ env('APP_NAME') }} | Financial & Consulting Services</title>

  <!-- Meta tags -->
  <meta name="description" content="Trade smarter with zero commissions on stocks, ETFs, and crypto. Access lightning-fast execution, AI insights, and 24/7 markets.">
  <meta name="keywords" content="online trading, zero commission broker, invest in stocks, crypto trading, ETF investing, trading platform">
  <meta property="og:title" content="{{ env('APP_NAME') }} – Financial & Investment Solutions">
  <meta property="og:description" content="Institutional-grade execution, real-time data, and wealth management services.">
  <meta property="og:type" content="website">

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('home-assets/assets/img/forex-logo.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('home-assets/assets/img/forex-logo.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('home-assets/assets/img/forex-logo.png') }}">
  <link rel="shortcut icon" href="{{ asset('home-assets/assets/img/forex-logo.png') }}">

  <!-- Font Awesome for Financo Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            financo: {
              blue: '#002e5b',       // Deep Navy Corporate Blue
              gold: '#fdb813',       // Bright Gold Accent
              hover: '#001e3d',
              lightGray: '#f8fafc',
              border: '#e2e8f0',
              heading: '#0f172a',
              body: '#475569'
            }
          },
          fontFamily: {
            sans: ['Inter', 'Roboto', 'sans-serif'],
          }
        }
      }
    }
  </script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

    body {
      font-family: 'Inter', sans-serif;
      color: #475569;
      background: #ffffff;
      -webkit-font-smoothing: antialiased;
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: #f1f5f9; }
    ::-webkit-scrollbar-thumb { background: #002e5b; border-radius: 4px; }

    /* Card Hover Transitions */
    .financo-card {
      transition: all 0.3s ease-in-out;
    }
    .financo-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 35px -10px rgba(0, 46, 91, 0.08);
    }

    #preloader {
      transition: opacity 0.4s ease;
    }
  </style>
</head>
<body class="overflow-x-hidden">

  <!-- PRELOADER -->
  <div id="preloader" class="fixed inset-0 z-50 flex items-center justify-center bg-white">
    <div class="flex flex-col items-center gap-3">
      <div class="w-12 h-12 border-4 border-slate-200 border-t-financo-gold rounded-full animate-spin"></div>
      <p class="text-xs font-bold text-financo-blue tracking-widest uppercase">{{ env('APP_NAME') }}</p>
    </div>
  </div>

  <!-- HEADER / NAVIGATION (Financo Light Style) -->
  <header class="w-full">
    <!-- Top Contact Bar (Light) -->
    <div class="bg-slate-100 text-financo-body text-xs py-2.5 border-b border-slate-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-2">
        <div class="flex items-center gap-6 font-medium">
          <div class="flex items-center gap-2">
            <i class="fa-solid fa-envelope text-financo-blue"></i>
            <span>{{ config('app.Admin_email') }}</span>
          </div>
          <div class="flex items-center gap-2">
            <i class="fa-solid fa-location-dot text-financo-blue"></i>
            <span>Marina Bay, Singapore</span>
          </div>
        </div>
        <div class="flex items-center gap-4">
          <span class="text-slate-400 font-semibold">Follow Us:</span>
          <a href="#" class="text-slate-500 hover:text-financo-blue transition"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" class="text-slate-500 hover:text-financo-blue transition"><i class="fa-brands fa-twitter"></i></a>
          <a href="#" class="text-slate-500 hover:text-financo-blue transition"><i class="fa-brands fa-linkedin-in"></i></a>
          <a href="#" class="text-slate-500 hover:text-financo-blue transition"><i class="fa-brands fa-instagram"></i></a>
        </div>
      </div>
    </div>

    <!-- Main Navigation Bar -->
    <nav class="bg-white shadow-sm sticky top-0 z-40 border-b border-slate-100">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
        <!-- Brand Logo -->
        <a href="#" class="flex items-center gap-3">
          <img src="{{ asset('home-assets/assets/img/forex-logo.png') }}" alt="{{ env('APP_NAME') }}" class="w-9 h-9 object-contain" />
          <span class="text-2xl font-black text-financo-blue tracking-tight uppercase">{{ env('APP_NAME') }}</span>
        </a>

        <!-- Desktop Navigation Links -->
        <div class="hidden md:flex items-center gap-8 font-semibold text-xs text-slate-700 uppercase tracking-wider">
          <a href="#hero" class="hover:text-financo-blue transition">Home</a>
          <a href="#about" class="hover:text-financo-blue transition">About Us</a>
          <a href="#services" class="hover:text-financo-blue transition">Services</a>
          <a href="#market" class="hover:text-financo-blue transition">Live Terminal</a>
          <a href="#testimonials" class="hover:text-financo-blue transition">Reviews</a>
          <a href="#contact" class="hover:text-financo-blue transition">Contact</a>
        </div>

        <!-- Action Buttons -->
        <div class="hidden sm:flex items-center gap-3">
          <a href="/login" class="text-xs uppercase font-bold text-financo-blue hover:text-financo-hover transition px-3 py-2">Sign In</a>
          <a href="/register" class="bg-financo-gold hover:bg-yellow-500 text-financo-blue font-bold text-xs uppercase px-6 py-3 rounded shadow-sm transition transform hover:-translate-y-0.5">
            Get Started
          </a>
        </div>

        <!-- Mobile Menu Toggle -->
        <button id="menu-toggle" class="md:hidden p-2 text-financo-blue focus:outline-none" aria-label="Toggle Menu">
          <i class="fa-solid fa-bars text-2xl"></i>
        </button>
      </div>

      <!-- Mobile Navigation Drawer -->
      <div id="mobile-menu" class="hidden md:hidden bg-white text-slate-800 px-6 py-6 border-t border-slate-200 shadow-xl">
        <div class="flex flex-col gap-4 font-semibold text-xs uppercase">
          <a href="#hero" class="mobile-link hover:text-financo-blue">Home</a>
          <a href="#about" class="mobile-link hover:text-financo-blue">About Us</a>
          <a href="#services" class="mobile-link hover:text-financo-blue">Services</a>
          <a href="#market" class="mobile-link hover:text-financo-blue">Live Terminal</a>
          <a href="#testimonials" class="mobile-link hover:text-financo-blue">Reviews</a>
          <a href="#contact" class="mobile-link hover:text-financo-blue">Contact</a>
          <hr class="border-slate-200 my-2" />
          <div class="flex flex-col gap-3">
            <a href="/login" class="mobile-link text-center border border-slate-300 py-2.5 rounded text-financo-blue font-bold">Sign In</a>
            <a href="/register" class="mobile-link text-center bg-financo-gold text-financo-blue font-bold py-2.5 rounded">Get Started</a>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <!-- ===== HERO SECTION (Bright White Theme with Human Focus) ===== -->
    <section id="hero" class="relative bg-white text-slate-900 py-16 lg:py-24 overflow-hidden border-b border-slate-100">
      <!-- Subtle Ambient Background Accents -->
      <div class="absolute -top-32 -right-32 w-96 h-96 bg-blue-50 rounded-full blur-3xl pointer-events-none"></div>
      <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-amber-50 rounded-full blur-3xl pointer-events-none"></div>

      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-12 gap-12 items-center">
          <!-- Text Content (7 Cols) -->
          <div class="lg:col-span-7">
            <div class="inline-flex items-center gap-2 bg-blue-50 text-financo-blue border border-blue-100 text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-wider mb-6">
              <span class="w-2 h-2 rounded-full bg-financo-gold animate-pulse"></span>
              Human-Centered Financial Consulting
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-financo-heading leading-[1.15] uppercase">
              Empowering Your <br />
              <span class="text-financo-blue">Financial Future</span>
            </h1>
            <p class="mt-6 text-slate-600 text-base sm:text-lg leading-relaxed max-w-xl">
              Partner with experienced advisors to build, protect, and grow your wealth. Institutional-grade execution combined with dedicated personal support.
            </p>

            <div class="mt-8 flex flex-wrap items-center gap-4">
              <a href="/register" class="bg-financo-blue hover:bg-financo-hover text-white font-bold uppercase text-xs px-8 py-4 rounded shadow-md transition transform hover:-translate-y-0.5">
                Open Free Account
              </a>
              <a href="#about" class="bg-slate-100 hover:bg-slate-200 text-financo-heading font-bold uppercase text-xs px-8 py-4 rounded transition border border-slate-200">
                Meet Advisors
              </a>
            </div>

            <!-- Human Social Proof Avatar Stack -->
            <div class="mt-10 pt-8 border-t border-slate-100 flex items-center gap-4">
              <div class="flex -space-x-3">
                <img class="w-11 h-11 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=150&q=80" alt="Advisor" />
                <img class="w-11 h-11 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=150&q=80" alt="Advisor" />
                <img class="w-11 h-11 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=150&q=80" alt="Advisor" />
                <img class="w-11 h-11 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=150&q=80" alt="Advisor" />
              </div>
              <div>
                <div class="flex text-financo-gold text-xs gap-1">
                  <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-xs font-bold text-financo-heading mt-0.5">Trusted by 200,000+ Investors</p>
              </div>
            </div>
          </div>

          <!-- Hero Image & Floating Cards (5 Cols) -->
          <div class="lg:col-span-5 relative">
            <div class="relative mx-auto max-w-md lg:max-w-none">
              <!-- Main Human Advisor Image -->
              <div class="rounded-2xl overflow-hidden shadow-2xl border-4 border-white bg-slate-100">
                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=800&q=80" alt="Financial Advisor" class="w-full h-[480px] object-cover" />
              </div>

              <!-- Floating Stat Card Overlay Bottom Left -->
              <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-xl shadow-xl border border-slate-100 flex items-center gap-4 max-w-xs">
                <div class="w-12 h-12 rounded-lg bg-blue-50 text-financo-blue flex items-center justify-center text-xl flex-shrink-0">
                  <i class="fa-solid fa-chart-line"></i>
                </div>
                <div>
                  <p class="text-xs text-slate-400 font-semibold uppercase">Avg Growth</p>
                  <p class="text-base font-black text-financo-heading">+24.8% <span class="text-xs text-emerald-600 font-bold">This Year</span></p>
                </div>
              </div>

              <!-- Floating Stat Card Overlay Top Right -->
              <div class="absolute -top-6 -right-4 bg-white px-4 py-3 rounded-xl shadow-lg border border-slate-100 flex items-center gap-3">
                <div class="w-3 h-3 rounded-full bg-emerald-500 animate-ping"></div>
                <span class="text-xs font-bold text-financo-heading uppercase">Live Advisory Desk Active</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ===== ABOUT SECTION (Light & Human Focused) ===== -->
    <section id="about" class="py-20 bg-slate-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
          <!-- Image Layering -->
          <div class="relative">
            <div class="grid grid-cols-2 gap-4">
              <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=600&q=80" alt="Consulting Team" class="rounded-xl shadow-md object-cover h-64 w-full" />
              <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=600&q=80" alt="Client Advisor" class="rounded-xl shadow-md object-cover h-64 w-full mt-6" />
            </div>
            <div class="absolute -bottom-6 left-1/2 -translate-x-1/2 bg-white text-financo-blue p-5 rounded-xl shadow-xl border border-slate-100 text-center w-3/4">
              <span class="text-3xl font-extrabold text-financo-blue block">15+ Years</span>
              <span class="text-xs uppercase font-bold text-slate-500 tracking-wider">Of Client Satisfaction</span>
            </div>
          </div>

          <!-- Content -->
          <div class="mt-8 lg:mt-0">
            <span class="text-xs font-bold text-financo-gold uppercase tracking-widest block mb-2">About Our Firm</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-financo-heading uppercase tracking-tight mb-6">
              Human Expertise Powered By Modern Technology
            </h2>
            <p class="text-slate-600 text-sm leading-relaxed mb-6">
              At {{ env('APP_NAME') }}, we believe technology alone is not enough. Our team of seasoned financial advisors works directly with you to craft transparent, zero-commission strategies for wealth creation.
            </p>

            <div class="space-y-4 mb-8">
              <div class="flex items-start gap-4">
                <div class="w-8 h-8 rounded-full bg-blue-100 text-financo-blue flex items-center justify-center font-bold flex-shrink-0">
                  <i class="fa-solid fa-user-check text-xs"></i>
                </div>
                <div>
                  <h4 class="text-sm font-bold text-financo-heading uppercase">Dedicated Personal Advisors</h4>
                  <p class="text-xs text-slate-500 mt-1">Direct access to experienced wealth managers 24/7.</p>
                </div>
              </div>
              <div class="flex items-start gap-4">
                <div class="w-8 h-8 rounded-full bg-blue-100 text-financo-blue flex items-center justify-center font-bold flex-shrink-0">
                  <i class="fa-solid fa-shield-halved text-xs"></i>
                </div>
                <div>
                  <h4 class="text-sm font-bold text-financo-heading uppercase">Institutional Risk Custody</h4>
                  <p class="text-xs text-slate-500 mt-1">Fully transparent proof of reserves and insured client assets.</p>
                </div>
              </div>
            </div>

            <a href="/register" class="bg-financo-blue hover:bg-financo-hover text-white font-bold text-xs uppercase px-8 py-3.5 rounded shadow transition inline-block">
              Get Started Today
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- ===== SERVICES SECTION (Light Cards with Human Visuals) ===== -->
    <section id="services" class="py-20 bg-white border-y border-slate-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
          <span class="text-xs font-bold text-financo-gold uppercase tracking-widest">Our Expertise</span>
          <h2 class="text-3xl sm:text-4xl font-extrabold text-financo-heading uppercase mt-1">Tailored Financial Solutions</h2>
          <div class="w-16 h-1 bg-financo-gold mx-auto mt-4"></div>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
          <!-- Service 1 -->
          <div class="bg-slate-50 rounded-xl overflow-hidden border border-slate-200 financo-card">
            <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=600&q=80" alt="Wealth Management" class="w-full h-52 object-cover" />
            <div class="p-6">
              <h3 class="text-lg font-bold text-financo-heading uppercase mb-2">Wealth Management</h3>
              <p class="text-xs text-slate-500 leading-relaxed mb-4">Personalized portfolio design for long-term growth and capital protection.</p>
              <a href="/register" class="text-xs font-bold text-financo-blue hover:text-financo-gold uppercase transition flex items-center gap-1">
                Explore Strategy <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

          <!-- Service 2 -->
          <div class="bg-slate-50 rounded-xl overflow-hidden border border-slate-200 financo-card">
            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80" alt="Trading Advisory" class="w-full h-52 object-cover" />
            <div class="p-6">
              <h3 class="text-lg font-bold text-financo-heading uppercase mb-2">Multi-Asset Brokerage</h3>
              <p class="text-xs text-slate-500 leading-relaxed mb-4">Zero-commission access to FX, stocks, options, and global crypto liquidity.</p>
              <a href="/register" class="text-xs font-bold text-financo-blue hover:text-financo-gold uppercase transition flex items-center gap-1">
                Explore Markets <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

          <!-- Service 3 -->
          <div class="bg-slate-50 rounded-xl overflow-hidden border border-slate-200 financo-card">
            <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=600&q=80" alt="Corporate Consulting" class="w-full h-52 object-cover" />
            <div class="p-6">
              <h3 class="text-lg font-bold text-financo-heading uppercase mb-2">Corporate Advisory</h3>
              <p class="text-xs text-slate-500 leading-relaxed mb-4">Corporate restructuring, treasury liquidity, and institutional risk management.</p>
              <a href="/register" class="text-xs font-bold text-financo-blue hover:text-financo-gold uppercase transition flex items-center gap-1">
                Explore Solutions <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ===== LIVE TRADING TERMINAL SECTION ===== -->
    <section id="market" class="py-20 bg-slate-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
          <span class="text-xs font-bold text-financo-gold uppercase tracking-widest">Real-Time Data</span>
          <h2 class="text-3xl sm:text-4xl font-extrabold text-financo-heading uppercase mt-1">Live Financial Terminal</h2>
          <p class="text-slate-500 text-sm mt-2">Institutional execution feeds powered by TradingView.</p>
        </div>

        <div class="bg-white border border-slate-200 rounded-xl p-3 shadow-sm">
          <div id="tv-chart" class="h-[460px] w-full rounded overflow-hidden"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/tv.js" defer></script>
          <script>
            document.addEventListener("DOMContentLoaded", function() {
              function loadChart() {
                if (typeof TradingView !== 'undefined') {
                  new TradingView.widget({
                    "autosize": true,
                    "symbol": "BINANCE:BTCUSDT",
                    "interval": "D",
                    "timezone": "Etc/UTC",
                    "theme": "light",
                    "style": "1",
                    "locale": "en",
                    "enable_publishing": false,
                    "hide_side_toolbar": false,
                    "allow_symbol_change": true,
                    "container_id": "tv-chart"
                  });
                } else { setTimeout(loadChart, 200); }
              }
              loadChart();
            });
          </script>
        </div>
      </div>
    </section>

    <!-- ===== STATS BANNER (Soft Light Style) ===== -->
    <section class="py-16 bg-blue-50 border-y border-blue-100">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
          <div>
            <span class="text-4xl sm:text-5xl font-black text-financo-blue block">200K+</span>
            <span class="text-xs uppercase font-bold text-slate-500 tracking-wider mt-2 block">Active Investors</span>
          </div>
          <div>
            <span class="text-4xl sm:text-5xl font-black text-financo-blue block">$18B+</span>
            <span class="text-xs uppercase font-bold text-slate-500 tracking-wider mt-2 block">Assets Under Advisory</span>
          </div>
          <div>
            <span class="text-4xl sm:text-5xl font-black text-financo-blue block">&lt; 4ms</span>
            <span class="text-xs uppercase font-bold text-slate-500 tracking-wider mt-2 block">Execution Latency</span>
          </div>
          <div>
            <span class="text-4xl sm:text-5xl font-black text-financo-blue block">99.9%</span>
            <span class="text-xs uppercase font-bold text-slate-500 tracking-wider mt-2 block">Platform Uptime</span>
          </div>
        </div>
      </div>
    </section>

    <!-- ===== TESTIMONIALS SECTION (People Focused) ===== -->
    <section id="testimonials" class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
          <span class="text-xs font-bold text-financo-gold uppercase tracking-widest">Client Feedback</span>
          <h2 class="text-3xl sm:text-4xl font-extrabold text-financo-heading uppercase mt-1">What Traders &amp; Partners Say</h2>
          <div class="w-16 h-1 bg-financo-gold mx-auto mt-4"></div>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
          <!-- Card 1 -->
          <div class="bg-slate-50 p-8 rounded-xl border border-slate-200 shadow-sm flex flex-col justify-between">
            <p class="text-xs text-slate-600 italic leading-relaxed">
              "The latency performance on {{ env('APP_NAME') }} is outstanding. Having a dedicated advisor ready to assist makes all the difference."
            </p>
            <div class="flex items-center gap-4 mt-6 pt-4 border-t border-slate-200">
              <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=150&q=80" class="w-12 h-12 rounded-full object-cover" alt="Client" />
              <div>
                <h4 class="text-sm font-bold text-financo-heading uppercase">Marcus Vance</h4>
                <p class="text-xs text-slate-400">Algorithmic Trader</p>
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="bg-slate-50 p-8 rounded-xl border border-slate-200 shadow-sm flex flex-col justify-between">
            <p class="text-xs text-slate-600 italic leading-relaxed">
              "Managing both multi-asset stocks and crypto under one compliant platform with total transparency gives us peace of mind."
            </p>
            <div class="flex items-center gap-4 mt-6 pt-4 border-t border-slate-200">
              <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=150&q=80" class="w-12 h-12 rounded-full object-cover" alt="Client" />
              <div>
                <h4 class="text-sm font-bold text-financo-heading uppercase">Elena Rostova</h4>
                <p class="text-xs text-slate-400">Portfolio Manager</p>
              </div>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="bg-slate-50 p-8 rounded-xl border border-slate-200 shadow-sm flex flex-col justify-between">
            <p class="text-xs text-slate-600 italic leading-relaxed">
              "Clean interface, fast execution, and zero hidden fees. Highly recommended for modern institutional investors."
            </p>
            <div class="flex items-center gap-4 mt-6 pt-4 border-t border-slate-200">
              <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=150&q=80" class="w-12 h-12 rounded-full object-cover" alt="Client" />
              <div>
                <h4 class="text-sm font-bold text-financo-heading uppercase">David Koenig</h4>
                <p class="text-xs text-slate-400">Derivatives Specialist</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ===== CONTACT SECTION ===== -->
    <section id="contact" class="py-20 bg-slate-50 border-t border-slate-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-5 gap-12">
          <div class="lg:col-span-2">
            <span class="text-xs font-bold text-financo-gold uppercase tracking-widest">Get In Touch</span>
            <h2 class="text-3xl font-extrabold text-financo-heading uppercase mt-1 mb-4">Connect With Our Team</h2>
            <p class="text-xs text-slate-500 leading-relaxed mb-8">
              Our specialists are ready 24/7 to help with account onboarding, institutional desks, or platform enquiries.
            </p>

            <div class="space-y-4 text-xs">
              <div class="flex items-center gap-4 p-4 bg-white rounded-lg border border-slate-200 shadow-sm">
                <i class="fa-solid fa-envelope text-lg text-financo-blue"></i>
                <div>
                  <span class="text-slate-400 block font-semibold uppercase">Email Us</span>
                  <span class="font-bold text-financo-heading">{{ config('app.Admin_email') }}</span>
                </div>
              </div>
              <div class="flex items-center gap-4 p-4 bg-white rounded-lg border border-slate-200 shadow-sm">
                <i class="fa-solid fa-location-dot text-lg text-financo-blue"></i>
                <div>
                  <span class="text-slate-400 block font-semibold uppercase">Headquarters</span>
                  <span class="font-bold text-financo-heading">Marina Bay Financial Centre, Singapore</span>
                </div>
              </div>
            </div>
          </div>

          <div class="lg:col-span-3">
            <form id="contact-form" class="p-8 bg-white border border-slate-200 rounded-xl space-y-4 shadow-sm">
              <div class="grid sm:grid-cols-2 gap-4">
                <div>
                  <label class="text-xs font-bold text-financo-heading uppercase block mb-1">First Name</label>
                  <input type="text" required class="w-full bg-slate-50 border border-slate-200 rounded px-4 py-3 text-xs focus:border-financo-blue outline-none" placeholder="John" />
                </div>
                <div>
                  <label class="text-xs font-bold text-financo-heading uppercase block mb-1">Email</label>
                  <input type="email" required class="w-full bg-slate-50 border border-slate-200 rounded px-4 py-3 text-xs focus:border-financo-blue outline-none" placeholder="john@example.com" />
                </div>
              </div>
              <div>
                <label class="text-xs font-bold text-financo-heading uppercase block mb-1">Subject</label>
                <select class="w-full bg-slate-50 border border-slate-200 rounded px-4 py-3 text-xs focus:border-financo-blue outline-none">
                  <option>Account Onboarding</option>
                  <option>Institutional Desk</option>
                  <option>API & Execution</option>
                  <option>General Enquiry</option>
                </select>
              </div>
              <div>
                <label class="text-xs font-bold text-financo-heading uppercase block mb-1">Message</label>
                <textarea rows="4" required class="w-full bg-slate-50 border border-slate-200 rounded px-4 py-3 text-xs focus:border-financo-blue outline-none resize-none" placeholder="How can we assist you?"></textarea>
              </div>
              <button type="submit" class="w-full bg-financo-blue hover:bg-financo-hover text-white font-bold text-xs uppercase py-4 rounded transition shadow">
                Send Message
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- ===== FOOTER (Clean Corporate Navy Footer) ===== -->
  <footer class="bg-financo-blue text-white pt-16 pb-8 text-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
        <!-- Col 1 -->
        <div>
          <div class="flex items-center gap-2 mb-4">
            <img src="{{ asset('home-assets/assets/img/forex-logo.png') }}" alt="{{ env('APP_NAME') }}" class="w-7 h-7 object-contain" />
            <span class="text-lg font-black tracking-tight text-white uppercase">{{ env('APP_NAME') }}</span>
          </div>
          <p class="text-slate-300 leading-relaxed mb-4">
            Institutional quality execution, modern portfolio tools, and dedicated advisory services.
          </p>
          <div class="flex items-center gap-3">
            <a href="#" class="w-8 h-8 rounded bg-white/10 flex items-center justify-center hover:bg-financo-gold hover:text-financo-blue transition"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" class="w-8 h-8 rounded bg-white/10 flex items-center justify-center hover:bg-financo-gold hover:text-financo-blue transition"><i class="fa-brands fa-twitter"></i></a>
            <a href="#" class="w-8 h-8 rounded bg-white/10 flex items-center justify-center hover:bg-financo-gold hover:text-financo-blue transition"><i class="fa-brands fa-linkedin-in"></i></a>
          </div>
        </div>

        <!-- Col 2 -->
        <div>
          <h4 class="text-sm font-bold text-financo-gold uppercase mb-4">Quick Links</h4>
          <ul class="space-y-2 text-slate-300">
            <li><a href="#about" class="hover:text-financo-gold transition">About Firm</a></li>
            <li><a href="#services" class="hover:text-financo-gold transition">Our Services</a></li>
            <li><a href="#market" class="hover:text-financo-gold transition">Live Terminal</a></li>
            <li><a href="/login" class="hover:text-financo-gold transition">Client Portal</a></li>
            <li><a href="/register" class="hover:text-financo-gold transition">Create Account</a></li>
          </ul>
        </div>

        <!-- Col 3 -->
        <div>
          <h4 class="text-sm font-bold text-financo-gold uppercase mb-4">Services</h4>
          <ul class="space-y-2 text-slate-300">
            <li><a href="#" class="hover:text-financo-gold transition">Wealth Management</a></li>
            <li><a href="#" class="hover:text-financo-gold transition">Zero-Commission Brokerage</a></li>
            <li><a href="#" class="hover:text-financo-gold transition">Corporate Consulting</a></li>
            <li><a href="#" class="hover:text-financo-gold transition">Multi-Asset Custody</a></li>
          </ul>
        </div>

        <!-- Col 4 -->
        <div>
          <h4 class="text-sm font-bold text-financo-gold uppercase mb-4">Newsletter</h4>
          <p class="text-slate-300 mb-4">Subscribe for market intelligence updates.</p>
          <form class="flex flex-col gap-2" onsubmit="event.preventDefault(); alert('Subscribed successfully!');">
            <input type="email" required placeholder="Enter your email" class="bg-white/10 border border-white/20 text-white rounded px-3 py-2 outline-none text-xs focus:border-financo-gold" />
            <button type="submit" class="bg-financo-gold text-financo-blue font-bold uppercase py-2.5 rounded hover:bg-yellow-500 transition">
              Subscribe
            </button>
          </form>
        </div>
      </div>

      <div class="border-t border-white/10 pt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-slate-400 text-xs">
        <p>&copy; 2026 {{ env('APP_NAME') }}. All rights reserved.</p>
        <p class="max-w-md text-center sm:text-right">Trading involves financial risk. Please consult disclosures prior to investing.</p>
      </div>
    </div>
  </footer>

  <!-- SUCCESS MODAL -->
  <div id="success-modal" class="hidden fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-xl max-w-sm w-full p-6 text-center shadow-2xl border border-slate-200">
      <div class="w-12 h-12 mx-auto rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mb-4">
        <i class="fa-solid fa-check text-xl"></i>
      </div>
      <h3 class="text-lg font-bold text-financo-heading uppercase">Message Sent</h3>
      <p class="text-xs text-slate-500 mt-2">Our team will reach out to you within 24 hours.</p>
      <button id="close-modal" class="mt-6 w-full bg-financo-blue hover:bg-financo-hover text-white font-bold text-xs uppercase py-3 rounded transition">
        Close
      </button>
    </div>
  </div>

  <!-- SCRIPTS -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Preloader Handler
      const preloader = document.getElementById('preloader');
      if (preloader) {
        setTimeout(() => { 
          preloader.style.opacity = '0'; 
          setTimeout(() => preloader.style.display = 'none', 300); 
        }, 200);
      }

      // Mobile Menu Toggle
      const toggle = document.getElementById('menu-toggle');
      const menu = document.getElementById('mobile-menu');
      if (toggle && menu) {
        toggle.addEventListener('click', () => menu.classList.toggle('hidden'));
        document.querySelectorAll('.mobile-link').forEach(link => {
          link.addEventListener('click', () => menu.classList.add('hidden'));
        });
      }

      // Contact Form Modal
      const form = document.getElementById('contact-form');
      const modal = document.getElementById('success-modal');
      const close = document.getElementById('close-modal');
      if (form && modal && close) {
        form.addEventListener('submit', (e) => { 
          e.preventDefault(); 
          modal.classList.remove('hidden'); 
          form.reset(); 
        });
        close.addEventListener('click', () => modal.classList.add('hidden'));
        modal.addEventListener('click', (e) => { 
          if (e.target === modal) modal.classList.add('hidden'); 
        });
      }
    });
  </script>
</body>
</html>