<!doctype html>
<html lang="en" dir="ltr">

<head>

    @include('includes.user-head')

    <style>
        /* ============================================================
           LOGIN PAGE — glass card over full-bleed photo
           ============================================================ */
        :root {
            --auth-accent: #05c3fb;
            --auth-accent-2: #7c5cff;
            --auth-text: #f8fafc;
            --auth-muted: #97a4b8;
            --auth-card-bg: rgba(12, 16, 28, 0.55);
            --auth-stroke: rgba(255, 255, 255, 0.10);
        }

        body.login-img {
            margin: 0;
            min-height: 100vh;
            background-color: #06080f;
            color: var(--auth-text);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", sans-serif;
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }

        /* ---------- Background layer ---------- */
        .auth-bg {
            position: fixed;
            inset: 0;
            z-index: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .auth-bg__image {
            position: absolute;
            inset: -3%;
            background-image: url('https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            transform: scale(1.05);
            animation: authDrift 28s ease-in-out infinite alternate;
        }

        /* darkening + colour wash + vignette */
        .auth-bg__overlay {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(120% 90% at 50% 0%, rgba(5, 195, 251, 0.10) 0%, transparent 55%),
                radial-gradient(100% 100% at 50% 100%, rgba(124, 92, 255, 0.12) 0%, transparent 60%),
                linear-gradient(180deg, rgba(6, 8, 15, 0.62) 0%, rgba(6, 8, 15, 0.80) 55%, rgba(6, 8, 15, 0.92) 100%);
        }

        /* soft glowing orbs */
        .auth-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(90px);
            opacity: 0.55;
            will-change: transform;
        }

        .auth-orb--1 {
            width: 380px;
            height: 380px;
            top: -120px;
            left: -100px;
            background: var(--auth-accent);
            opacity: 0.18;
            animation: authFloat 18s ease-in-out infinite alternate;
        }

        .auth-orb--2 {
            width: 460px;
            height: 460px;
            right: -160px;
            bottom: -180px;
            background: var(--auth-accent-2);
            opacity: 0.20;
            animation: authFloat 22s ease-in-out infinite alternate-reverse;
        }

        /* ---------- Layout shell ---------- */
        .auth-shell {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 26px;
            padding: 48px 20px;
        }

        /* ---------- Brand ---------- */
        .auth-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            animation: authFadeUp 0.6s ease-out both;
        }

        .auth-brand__mark {
            display: grid;
            place-items: center;
            width: 42px;
            height: 42px;
            border-radius: 13px;
            background: linear-gradient(145deg, rgba(5, 195, 251, 0.22), rgba(124, 92, 255, 0.18));
            border: 1px solid rgba(5, 195, 251, 0.35);
            box-shadow: 0 0 24px rgba(5, 195, 251, 0.28), inset 0 1px 0 rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .auth-brand__name {
            font-size: 1.2rem;
            font-weight: 800;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            background: linear-gradient(135deg, #ffffff 30%, #b9c6d8 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .auth-brand__name a {
            text-decoration: none;
            color: inherit;
            transition: opacity 0.2s ease;
        }

        .auth-brand__name a:hover {
            opacity: 0.75;
        }

        /* ---------- Card ---------- */
        .auth-card {
            position: relative;
            width: 100%;
            max-width: 440px;
            padding: 28px 26px 26px;
            border-radius: 24px;
            background: var(--auth-card-bg);
            border: 1px solid var(--auth-stroke);
            box-shadow:
                0 30px 70px -20px rgba(0, 0, 0, 0.75),
                0 0 0 1px rgba(255, 255, 255, 0.03),
                inset 0 1px 0 rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(22px) saturate(150%);
            -webkit-backdrop-filter: blur(22px) saturate(150%);
            animation: authFadeUp 0.7s 0.08s ease-out both;
            overflow: hidden;
        }

        /* thin accent line across the top edge */
        .auth-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 12%;
            right: 12%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(5, 195, 251, 0.85), transparent);
        }

        /* ---------- Alerts ---------- */
        .auth-alert {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            width: 100%;
            margin: 0 0 16px;
            padding: 13px 40px 13px 14px;
            border-radius: 12px;
            font-size: 0.85rem;
            line-height: 1.45;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .auth-alert--error {
            background: rgba(239, 68, 68, 0.12);
            border: 1px solid rgba(239, 68, 68, 0.28);
            color: #fca5a5;
        }

        .auth-alert--success {
            background: rgba(34, 197, 94, 0.12);
            border: 1px solid rgba(34, 197, 94, 0.28);
            color: #86efac;
        }

        .auth-alert__label {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-weight: 700;
            white-space: nowrap;
        }

        .auth-alert .btn-close {
            padding: 1.1rem 1rem;
            opacity: 0.5;
            font-size: 0.7rem;
            filter: invert(1) grayscale(1);
        }

        /* ---------- Footer ---------- */
        .auth-footer {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 6px 14px;
            font-size: 0.76rem;
            color: var(--auth-muted);
            text-align: center;
            animation: authFadeUp 0.8s 0.16s ease-out both;
        }

        .auth-footer a {
            color: rgba(226, 232, 240, 0.75);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .auth-footer a:hover {
            color: var(--auth-accent);
        }

        .auth-footer__dot {
            width: 3px;
            height: 3px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.25);
        }

        /* ---------- Animations ---------- */
        @keyframes authFadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes authDrift {
            from { transform: scale(1.05) translate3d(0, 0, 0); }
            to   { transform: scale(1.10) translate3d(-1.5%, -1.5%, 0); }
        }

        @keyframes authFloat {
            from { transform: translate3d(0, 0, 0); }
            to   { transform: translate3d(30px, 40px, 0); }
        }

        /* ---------- Responsive ---------- */
        @media (max-width: 480px) {
            .auth-shell { padding: 32px 16px; gap: 20px; }
            .auth-card  { padding: 22px 18px 20px; border-radius: 20px; }
            .auth-brand__name { font-size: 1.05rem; letter-spacing: 0.1em; }
            .auth-orb { filter: blur(70px); }
        }

        /* ---------- Accessibility ---------- */
        @media (prefers-reduced-motion: reduce) {
            .auth-bg__image,
            .auth-orb,
            .auth-brand,
            .auth-card,
            .auth-footer {
                animation: none !important;
            }
        }
    </style>

</head>

<body class="login-img">

    {{-- ================= Background ================= --}}
    <div class="auth-bg" aria-hidden="true">
        <div class="auth-bg__image"></div>
        <div class="auth-bg__overlay"></div>
        <span class="auth-orb auth-orb--1"></span>
        <span class="auth-orb auth-orb--2"></span>
    </div>

    @include('includes.loader')

    {{-- ================= Content ================= --}}
    <main class="auth-shell">

        {{-- Brand --}}
        <header class="auth-brand">
            <div class="auth-brand__mark">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="#05c3fb" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
            </div>

            <h1 class="auth-brand__name">
                <a href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
            </h1>
        </header>

        {{-- Card --}}
        <section class="auth-card" aria-label="Login form">

            @if (session()->has('error'))
                <div class="alert alert-dismissible fade show auth-alert auth-alert--error" role="alert">
                    <span class="auth-alert__label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                        Error:
                    </span>
                    <span>{{ session('error') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-dismissible fade show auth-alert auth-alert--success" role="alert">
                    <span class="auth-alert__label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                            stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Success:
                    </span>
                    <span>{{ session('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <livewire:auth.login />

        </section>

        {{-- Footer --}}
        <footer class="auth-footer">
            <span>&copy; {{ date('Y') }} {{ env('APP_NAME') }}</span>
            <span class="auth-footer__dot" aria-hidden="true"></span>
            <a href="{{ route('home') }}">Home</a>
            <span class="auth-footer__dot" aria-hidden="true"></span>
            <a href="#">Privacy</a>
            <span class="auth-footer__dot" aria-hidden="true"></span>
            <a href="#">Support</a>
        </footer>

    </main>

    @include('includes.user-scripts')

</body>

</html>
