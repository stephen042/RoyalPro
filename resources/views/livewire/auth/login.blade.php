<div class="lf">
    <style>
        /* ============================================================
           LOGIN FORM — glass inputs on the auth card
           ============================================================ */
        .lf {
            --lf-accent: #05c3fb;
            --lf-accent-2: #7c5cff;
            --lf-text: #eef2f8;
            --lf-muted: #8e9bb0;
            --lf-line: rgba(255, 255, 255, 0.10);
            --lf-fill: rgba(255, 255, 255, 0.045);

            width: 100%;
            color: var(--lf-text);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", sans-serif;
        }

        .lf *,
        .lf *::before,
        .lf *::after { box-sizing: border-box; }

        /* ---------- Head ---------- */
        .lf-head {
            text-align: center;
            margin-bottom: 26px;
        }

        .lf-title {
            margin: 0 0 6px;
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: -0.01em;
            color: #ffffff;
        }

        .lf-sub {
            margin: 0;
            font-size: 0.86rem;
            color: var(--lf-muted);
        }

        /* ---------- Form ---------- */
        .lf-form {
            display: flex;
            flex-direction: column;
            gap: 18px;
            width: 100%;
        }

        .lf-field {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .lf-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .lf-label {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: #a9b5c6;
        }

        .lf-link {
            font-size: 0.76rem;
            font-weight: 600;
            color: #9fb0c6;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .lf-link:hover { color: var(--lf-accent); }

        /* ---------- Control ---------- */
        .lf-control {
            position: relative;
            display: flex;
            align-items: center;
            border-radius: 14px;
            background: var(--lf-fill);
            border: 1px solid var(--lf-line);
            transition: border-color 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
        }

        .lf-control:focus-within {
            border-color: rgba(5, 195, 251, 0.55);
            background: rgba(255, 255, 255, 0.07);
            box-shadow:
                0 0 0 3px rgba(5, 195, 251, 0.14),
                0 0 24px -8px rgba(5, 195, 251, 0.55);
        }

        .lf-control--error { border-color: rgba(239, 68, 68, 0.55); }

        .lf-control--error:focus-within {
            border-color: rgba(239, 68, 68, 0.75);
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.15);
        }

        .lf-icon {
            position: absolute;
            left: 15px;
            display: grid;
            place-items: center;
            color: #6f7d92;
            pointer-events: none;
            transition: color 0.2s ease;
        }

        .lf-control:focus-within .lf-icon { color: var(--lf-accent); }

        .lf-input {
            width: 100%;
            height: 52px;
            padding: 0 16px 0 44px;
            border: 0;
            border-radius: 14px;
            background: transparent;
            color: var(--lf-text);
            font-family: inherit;
            font-size: 0.94rem;
            line-height: 1;
            outline: none;
        }

        .lf-control--eye .lf-input { padding-right: 52px; }

        .lf-input::placeholder { color: #5f6c80; }

        .lf-input:-webkit-autofill,
        .lf-input:-webkit-autofill:hover,
        .lf-input:-webkit-autofill:focus {
            -webkit-text-fill-color: var(--lf-text);
            -webkit-box-shadow: 0 0 0 1000px rgba(20, 26, 40, 0.95) inset;
            transition: background-color 9999s ease-in-out 0s;
        }

        /* hide native password reveal (Edge / IE) */
        .lf-input::-ms-reveal,
        .lf-input::-ms-clear { display: none; }

        /* ---------- Eye toggle ---------- */
        .lf-eye {
            position: absolute;
            right: 8px;
            display: grid;
            place-items: center;
            width: 36px;
            height: 36px;
            padding: 0;
            border: 0;
            border-radius: 10px;
            background: transparent;
            color: #7d8ba1;
            cursor: pointer;
            transition: color 0.2s ease, background 0.2s ease;
        }

        .lf-eye:hover {
            color: #cfd8e6;
            background: rgba(255, 255, 255, 0.06);
        }

        .lf-eye:focus-visible {
            outline: 2px solid rgba(5, 195, 251, 0.8);
            outline-offset: 1px;
        }

        .lf-eye svg { display: block; }
        .lf-eye__hide { display: none; }
        .lf-eye.is-on .lf-eye__show { display: none; }
        .lf-eye.is-on .lf-eye__hide { display: block; }

        /* ---------- Errors ---------- */
        .lf-error {
            display: flex;
            align-items: flex-start;
            gap: 6px;
            margin: 0;
            font-size: 0.76rem;
            font-style: normal;
            line-height: 1.4;
            color: #fca5a5;
        }

        .lf-error svg {
            flex: 0 0 auto;
            margin-top: 1px;
        }

        /* ---------- Submit ---------- */
        .lf-btn {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            height: 52px;
            margin-top: 4px;
            padding: 0 20px;
            border: 0;
            border-radius: 14px;
            font-family: inherit;
            font-size: 0.95rem;
            font-weight: 700;
            letter-spacing: 0.02em;
            color: #04121a;
            cursor: pointer;
            background: linear-gradient(135deg, #05c3fb 0%, #37d6ff 45%, #7c5cff 100%);
            box-shadow:
                0 14px 32px -14px rgba(5, 195, 251, 0.85),
                inset 0 1px 0 rgba(255, 255, 255, 0.35);
            transition: transform 0.15s ease, box-shadow 0.2s ease, filter 0.2s ease;
            overflow: hidden;
        }

        /* light sweep on hover */
        .lf-btn::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(110deg, transparent 30%, rgba(255, 255, 255, 0.35) 50%, transparent 70%);
            transform: translateX(-120%);
            transition: transform 0.6s ease;
            pointer-events: none;
        }

        .lf-btn:hover {
            transform: translateY(-1px);
            filter: brightness(1.05);
            box-shadow:
                0 20px 42px -16px rgba(5, 195, 251, 0.95),
                inset 0 1px 0 rgba(255, 255, 255, 0.45);
        }

        .lf-btn:hover::after { transform: translateX(120%); }

        .lf-btn:active { transform: translateY(0) scale(0.995); }

        .lf-btn:focus-visible {
            outline: 2px solid rgba(5, 195, 251, 0.9);
            outline-offset: 3px;
        }

        .lf-btn:disabled {
            opacity: 0.72;
            cursor: not-allowed;
            transform: none;
            filter: none;
        }

        .lf-btn:disabled::after { display: none; }

        /* ---------- Footer ---------- */
        .lf-foot {
            margin: 22px 0 0;
            text-align: center;
            font-size: 0.85rem;
            color: var(--lf-muted);
        }

        .lf-foot a {
            margin-left: 4px;
            color: var(--lf-accent);
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .lf-foot a:hover {
            color: #7ee0ff;
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        /* ---------- Responsive ---------- */
        @media (max-width: 480px) {
            .lf-title { font-size: 1.35rem; }
            .lf-form  { gap: 16px; }
            .lf-input,
            .lf-btn   { height: 50px; }
        }

        @media (prefers-reduced-motion: reduce) {
            .lf *,
            .lf *::before,
            .lf *::after {
                transition: none !important;
                animation: none !important;
            }
        }
    </style>

    {{-- ---------- Heading ---------- --}}
    <header class="lf-head">
        <h2 class="lf-title">Welcome back</h2>
        <p class="lf-sub">Sign in to continue to your account</p>
    </header>

    <form class="lf-form" wire:submit="login">

        {{-- ---------- Email ---------- --}}
        <div class="lf-field">
            <label class="lf-label" for="lf-email">Email address</label>

            <div class="lf-control @error('email') lf-control--error @enderror">
                <span class="lf-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect x="2" y="4" width="20" height="16" rx="2.5"></rect>
                        <path d="m2.5 7.5 9.5 6.5 9.5-6.5"></path>
                    </svg>
                </span>

                <input id="lf-email" class="lf-input" wire:model="email" type="text" name="email"
                    placeholder="you@example.com" autocomplete="email" autocapitalize="none" spellcheck="false">
            </div>

            @error('email')
                <p class="lf-error">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        {{-- ---------- Password ---------- --}}
        <div class="lf-field">
            <div class="lf-row">
                <label class="lf-label" for="lf-password">Password</label>
                <a href="forgot-password" class="lf-link">Forgot password?</a>
            </div>

            <div class="lf-control lf-control--eye @error('password') lf-control--error @enderror">
                <span class="lf-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2.5"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                </span>

                <input id="lf-password" class="lf-input" wire:model="password" type="password" name="password"
                    placeholder="••••••••" autocomplete="current-password">

                <button type="button" class="lf-eye" aria-label="Show password"
                    onclick="var i=document.getElementById('lf-password');var s=i.type==='password';i.type=s?'text':'password';this.classList.toggle('is-on',s);this.setAttribute('aria-label',s?'Hide password':'Show password');">
                    <svg class="lf-eye__show" xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    <svg class="lf-eye__hide" xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10.6 5.2A9.9 9.9 0 0 1 12 5c6.4 0 10 7 10 7a17.6 17.6 0 0 1-3.4 4.5"></path>
                        <path d="M6.6 6.6A17.3 17.3 0 0 0 2 12s3.6 7 10 7a9.7 9.7 0 0 0 4.3-1"></path>
                        <path d="M2 2l20 20"></path>
                    </svg>
                </button>
            </div>

            @error('password')
                <p class="lf-error">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        {{-- ---------- Submit ---------- --}}
        <button class="lf-btn" type="submit" wire:loading.attr="disabled" wire:target="login">
            <span wire:loading.remove wire:target="login">Sign in</span>
            <span wire:loading wire:target="login">Signing in…</span>
            <x-spinner />
        </button>
    </form>

    {{-- ---------- Footer ---------- --}}
    <p class="lf-foot">
        Not a member?
        <a href="register">Create an account</a>
    </p>
</div>