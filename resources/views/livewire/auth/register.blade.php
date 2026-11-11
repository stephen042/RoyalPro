<div class="rg">
    <style>
        /* ============================================================
           REGISTER FORM — glass inputs on the auth card
           ============================================================ */
        .rg {
            --rg-accent: #05c3fb;
            --rg-text: #eef2f8;
            --rg-muted: #8e9bb0;
            --rg-line: rgba(255, 255, 255, 0.10);
            --rg-fill: rgba(255, 255, 255, 0.045);

            width: 100%;
            color: var(--rg-text);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", sans-serif;
        }

        .rg *,
        .rg *::before,
        .rg *::after { box-sizing: border-box; }

        /* ---------- Head ---------- */
        .rg-head {
            text-align: center;
            margin-bottom: 24px;
        }

        .rg-title {
            margin: 0 0 6px;
            font-size: 1.45rem;
            font-weight: 700;
            letter-spacing: -0.01em;
            color: #ffffff;
        }

        .rg-sub {
            margin: 0;
            font-size: 0.85rem;
            color: var(--rg-muted);
        }

        /* ---------- Form ---------- */
        .rg-form {
            display: flex;
            flex-direction: column;
            gap: 16px;
            width: 100%;
        }

        .rg-field {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        /* first name + last name side by side */
        .rg-grid2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .rg-label {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: #a9b5c6;
        }

        /* ---------- Control ---------- */
        .rg-control {
            position: relative;
            display: flex;
            align-items: center;
            border-radius: 14px;
            background: var(--rg-fill);
            border: 1px solid var(--rg-line);
            transition: border-color 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
        }

        .rg-control:focus-within {
            border-color: rgba(5, 195, 251, 0.55);
            background: rgba(255, 255, 255, 0.07);
            box-shadow:
                0 0 0 3px rgba(5, 195, 251, 0.14),
                0 0 24px -8px rgba(5, 195, 251, 0.55);
        }

        .rg-control--error { border-color: rgba(239, 68, 68, 0.55); }

        .rg-control--error:focus-within {
            border-color: rgba(239, 68, 68, 0.75);
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.15);
        }

        .rg-icon {
            position: absolute;
            left: 15px;
            display: grid;
            place-items: center;
            color: #6f7d92;
            pointer-events: none;
            transition: color 0.2s ease;
        }

        .rg-control:focus-within .rg-icon { color: var(--rg-accent); }

        .rg-input {
            width: 100%;
            height: 50px;
            padding: 0 16px 0 44px;
            border: 0;
            border-radius: 14px;
            background: transparent;
            color: var(--rg-text);
            font-family: inherit;
            font-size: 0.92rem;
            line-height: 1;
            outline: none;
        }

        .rg-control--eye .rg-input { padding-right: 50px; }

        .rg-input::placeholder { color: #5f6c80; }

        .rg-input:-webkit-autofill,
        .rg-input:-webkit-autofill:hover,
        .rg-input:-webkit-autofill:focus {
            -webkit-text-fill-color: var(--rg-text);
            -webkit-box-shadow: 0 0 0 1000px rgba(20, 26, 40, 0.95) inset;
            transition: background-color 9999s ease-in-out 0s;
        }

        .rg-input::-ms-reveal,
        .rg-input::-ms-clear { display: none; }

        /* ---------- Select ---------- */
        .rg-select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            cursor: pointer;
            padding-right: 44px;
            text-overflow: ellipsis;
        }

        /* grey out the placeholder state where supported */
        .rg-select:has(option[value=""]:checked) { color: #5f6c80; }

        .rg-select option {
            background-color: #10151f;
            color: var(--rg-text);
        }

        .rg-chevron {
            position: absolute;
            right: 15px;
            display: grid;
            place-items: center;
            color: #6f7d92;
            pointer-events: none;
            transition: color 0.2s ease, transform 0.2s ease;
        }

        .rg-control:focus-within .rg-chevron {
            color: var(--rg-accent);
            transform: translateY(1px);
        }

        /* ---------- Eye toggle ---------- */
        .rg-eye {
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

        .rg-eye:hover {
            color: #cfd8e6;
            background: rgba(255, 255, 255, 0.06);
        }

        .rg-eye:focus-visible {
            outline: 2px solid rgba(5, 195, 251, 0.8);
            outline-offset: 1px;
        }

        .rg-eye svg { display: block; }
        .rg-eye__hide { display: none; }
        .rg-eye.is-on .rg-eye__show { display: none; }
        .rg-eye.is-on .rg-eye__hide { display: block; }

        /* ---------- Errors ---------- */
        .rg-error {
            display: flex;
            align-items: flex-start;
            gap: 6px;
            margin: 0;
            font-size: 0.76rem;
            font-style: normal;
            line-height: 1.4;
            color: #fca5a5;
        }

        .rg-error svg {
            flex: 0 0 auto;
            margin-top: 1px;
        }

        /* ---------- Gender segmented control ---------- */
        .rg-seg {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6px;
            padding: 5px;
            border-radius: 14px;
            background: var(--rg-fill);
            border: 1px solid var(--rg-line);
        }

        .rg-seg__opt {
            position: relative;
            display: block;
            margin: 0;
        }

        .rg-seg__opt input {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            margin: 0;
            opacity: 0;
            cursor: pointer;
        }

        .rg-seg__label {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 40px;
            border-radius: 10px;
            font-size: 0.88rem;
            font-weight: 600;
            color: #9aa8bd;
            transition: background 0.2s ease, color 0.2s ease, box-shadow 0.2s ease;
        }

        .rg-seg__opt input:checked + .rg-seg__label {
            background: linear-gradient(135deg, rgba(5, 195, 251, 0.20), rgba(124, 92, 255, 0.20));
            color: #eaf6ff;
            box-shadow:
                inset 0 0 0 1px rgba(5, 195, 251, 0.38),
                0 4px 14px -8px rgba(5, 195, 251, 0.9);
        }

        .rg-seg__opt input:focus-visible + .rg-seg__label {
            outline: 2px solid rgba(5, 195, 251, 0.85);
            outline-offset: 2px;
        }

        /* ---------- Terms checkbox ---------- */
        .rg-check {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin: 2px 0 0;
            font-size: 0.82rem;
            line-height: 1.5;
            color: #a9b5c6;
            cursor: pointer;
            user-select: none;
        }

        .rg-check__input {
            position: absolute;
            width: 1px;
            height: 1px;
            margin: -1px;
            padding: 0;
            overflow: hidden;
            clip: rect(0 0 0 0);
            white-space: nowrap;
            border: 0;
        }

        .rg-check__box {
            flex: 0 0 auto;
            display: grid;
            place-items: center;
            width: 20px;
            height: 20px;
            margin-top: 1px;
            border-radius: 6px;
            background: var(--rg-fill);
            border: 1px solid rgba(255, 255, 255, 0.18);
            color: transparent;
            transition: background 0.2s ease, border-color 0.2s ease, color 0.2s ease, box-shadow 0.2s ease;
        }

        .rg-check__box svg { display: block; }

        .rg-check__input:checked + .rg-check__box {
            background: linear-gradient(135deg, #05c3fb, #7c5cff);
            border-color: transparent;
            color: #04121a;
            box-shadow: 0 0 16px -4px rgba(5, 195, 251, 0.85);
        }

        .rg-check__input:focus-visible + .rg-check__box {
            outline: 2px solid rgba(5, 195, 251, 0.85);
            outline-offset: 2px;
        }

        .rg-check a {
            color: var(--rg-accent);
            font-weight: 600;
            text-decoration: none;
        }

        .rg-check a:hover {
            text-decoration: underline;
            text-underline-offset: 2px;
        }

        /* ---------- Submit ---------- */
        .rg-btn {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            height: 52px;
            margin-top: 6px;
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

        .rg-btn::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(110deg, transparent 30%, rgba(255, 255, 255, 0.35) 50%, transparent 70%);
            transform: translateX(-120%);
            transition: transform 0.6s ease;
            pointer-events: none;
        }

        .rg-btn:hover {
            transform: translateY(-1px);
            filter: brightness(1.05);
            box-shadow:
                0 20px 42px -16px rgba(5, 195, 251, 0.95),
                inset 0 1px 0 rgba(255, 255, 255, 0.45);
        }

        .rg-btn:hover::after { transform: translateX(120%); }

        .rg-btn:active { transform: translateY(0) scale(0.995); }

        .rg-btn:focus-visible {
            outline: 2px solid rgba(5, 195, 251, 0.9);
            outline-offset: 3px;
        }

        .rg-btn:disabled {
            opacity: 0.72;
            cursor: not-allowed;
            transform: none;
            filter: none;
        }

        .rg-btn:disabled::after { display: none; }

        /* ---------- Footer ---------- */
        .rg-foot {
            margin: 20px 0 0;
            text-align: center;
            font-size: 0.85rem;
            color: var(--rg-muted);
        }

        .rg-foot a {
            margin-left: 4px;
            color: var(--rg-accent);
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .rg-foot a:hover {
            color: #7ee0ff;
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        /* ---------- Responsive ---------- */
        @media (max-width: 400px) {
            .rg-grid2 { grid-template-columns: 1fr; gap: 16px; }
        }

        @media (max-width: 480px) {
            .rg-title { font-size: 1.3rem; }
            .rg-form  { gap: 14px; }
            .rg-input { height: 48px; }
            .rg-btn   { height: 50px; }
        }

        @media (prefers-reduced-motion: reduce) {
            .rg *,
            .rg *::before,
            .rg *::after {
                transition: none !important;
                animation: none !important;
            }
        }
    </style>

    {{-- ---------- Heading ---------- --}}
    <header class="rg-head">
        <h2 class="rg-title">Create your account</h2>
        <p class="rg-sub">It only takes a minute to get started</p>
    </header>

    <form class="rg-form" wire:submit.throttle.1000.prevent="register" method="post">

        {{-- ---------- Name ---------- --}}
        <div class="rg-grid2">

            <div class="rg-field">
                <label class="rg-label" for="rg-first-name">First name</label>

                <div class="rg-control @error('first_name') rg-control--error @enderror">
                    <span class="rg-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </span>

                    <input id="rg-first-name" class="rg-input" type="text" wire:model="first_name"
                        name="first_name" required placeholder="Jane" autocomplete="given-name">
                </div>

                @error('first_name')
                    <p class="rg-error">
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

            <div class="rg-field">
                <label class="rg-label" for="rg-last-name">Last name</label>

                <div class="rg-control @error('last_name') rg-control--error @enderror">
                    <span class="rg-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                            <path d="M16 3.5 17 4.5"></path>
                        </svg>
                    </span>

                    <input id="rg-last-name" class="rg-input" type="text" wire:model="last_name"
                        name="last_name" required placeholder="Doe" autocomplete="family-name">
                </div>

                @error('last_name')
                    <p class="rg-error">
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

        </div>

        {{-- ---------- Email ---------- --}}
        <div class="rg-field">
            <label class="rg-label" for="rg-email">Email address</label>

            <div class="rg-control @error('email') rg-control--error @enderror">
                <span class="rg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect x="2" y="4" width="20" height="16" rx="2.5"></rect>
                        <path d="m2.5 7.5 9.5 6.5 9.5-6.5"></path>
                    </svg>
                </span>

                <input id="rg-email" class="rg-input" type="text" wire:model="email" name="email" required
                    placeholder="you@example.com" autocomplete="email" autocapitalize="none" spellcheck="false">
            </div>

            @error('email')
                <p class="rg-error">
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

        {{-- ---------- Phone ---------- --}}
        <div class="rg-field">
            <label class="rg-label" for="rg-phone">Phone number</label>

            <div class="rg-control @error('phone') rg-control--error @enderror">
                <span class="rg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.5c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2Z"></path>
                    </svg>
                </span>

                <input id="rg-phone" class="rg-input" type="tel" inputmode="tel" wire:model="phone"
                    name="phone" required placeholder="+234 800 000 0000" autocomplete="tel">
            </div>

            @error('phone')
                <p class="rg-error">
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

        {{-- ---------- Country ---------- --}}
        <div class="rg-field">
            <label class="rg-label" for="rg-country">Country</label>

            <div class="rg-control @error('country') rg-control--error @enderror">
                <span class="rg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                </span>

                <select id="rg-country" name="country" wire:model="country" class="rg-input rg-select">
                    <option value="">Select country</option>
                    <option value="Afganistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antigua & Barbuda">Antigua &amp; Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Barbados">Barbados</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Belize">Belize</option>
                    <option value="Benin">Benin</option>
                    <option value="Bermuda">Bermuda</option>
                    <option value="Bhutan">Bhutan</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Bonaire">Bonaire</option>
                    <option value="Bosnia & Herzegovina">Bosnia &amp; Herzegovina</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Brazil">Brazil</option>
                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                    <option value="Brunei">Brunei</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Canary Islands">Canary Islands</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Channel Islands">Channel Islands</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Christmas Island">Christmas Island</option>
                    <option value="Cocos Island">Cocos Island</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo">Congo</option>
                    <option value="Cook Islands">Cook Islands</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Cote DIvoire">Cote DIvoire</option>
                    <option value="Croatia">Croatia</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Curaco">Curacao</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
                    <option value="East Timor">East Timor</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                    <option value="Eritrea">Eritrea</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Falkland Islands">Falkland Islands</option>
                    <option value="Faroe Islands">Faroe Islands</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="French Guiana">French Guiana</option>
                    <option value="French Polynesia">French Polynesia</option>
                    <option value="French Southern Ter">French Southern Ter</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambia">Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Gibraltar">Gibraltar</option>
                    <option value="Great Britain">Great Britain</option>
                    <option value="Greece">Greece</option>
                    <option value="Greenland">Greenland</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Guam">Guam</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Hawaii">Hawaii</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="India">India</option>
                    <option value="Iran">Iran</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Isle of Man">Isle of Man</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="Korea North">Korea North</option>
                    <option value="Korea Sout">Korea South</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                    <option value="Laos">Laos</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libya">Libya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macau">Macau</option>
                    <option value="Macedonia">Macedonia</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Marshall Islands">Marshall Islands</option>
                    <option value="Martinique">Martinique</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mayotte">Mayotte</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Midway Islands">Midway Islands</option>
                    <option value="Moldova">Moldova</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Nambia">Nambia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherland Antilles">Netherland Antilles</option>
                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                    <option value="Nevis">Nevis</option>
                    <option value="New Caledonia">New Caledonia</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Niue">Niue</option>
                    <option value="Norfolk Island">Norfolk Island</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau Island">Palau Island</option>
                    <option value="Palestine">Palestine</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Phillipines">Philippines</option>
                    <option value="Pitcairn Island">Pitcairn Island</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                    <option value="Republic of Serbia">Republic of Serbia</option>
                    <option value="Reunion">Reunion</option>
                    <option value="Romania">Romania</option>
                    <option value="Russia">Russia</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="St Barthelemy">St Barthelemy</option>
                    <option value="St Eustatius">St Eustatius</option>
                    <option value="St Helena">St Helena</option>
                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                    <option value="St Lucia">St Lucia</option>
                    <option value="St Maarten">St Maarten</option>
                    <option value="St Pierre & Miquelon">St Pierre &amp; Miquelon</option>
                    <option value="St Vincent & Grenadines">St Vincent &amp; Grenadines</option>
                    <option value="Saipan">Saipan</option>
                    <option value="Samoa">Samoa</option>
                    <option value="Samoa American">Samoa American</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome & Principe">Sao Tome &amp; Principe</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Swaziland">Swaziland</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syria">Syria</option>
                    <option value="Tahiti">Tahiti</option>
                    <option value="Taiwan">Taiwan</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania">Tanzania</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Togo">Togo</option>
                    <option value="Tokelau">Tokelau</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinidad & Tobago">Trinidad &amp; Tobago</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Turks & Caicos Is">Turks &amp; Caicos Is</option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Uganda">Uganda</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Erimates">United Arab Emirates</option>
                    <option value="United States of America">United States of America</option>
                    <option value="Uraguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Vatican City State">Vatican City State</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                    <option value="Wake Island">Wake Island</option>
                    <option value="Wallis & Futana Is">Wallis &amp; Futana Is</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zaire">Zaire</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                </select>

                <span class="rg-chevron">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </span>
            </div>

            @error('country')
                <p class="rg-error">
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
        <div class="rg-field">
            <label class="rg-label" for="rg-password">Password</label>

            <div class="rg-control rg-control--eye @error('password') rg-control--error @enderror">
                <span class="rg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2.5"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                </span>

                <input id="rg-password" class="rg-input" type="password" wire:model="password" name="password"
                    required placeholder="Create a password" autocomplete="new-password">

                <button type="button" class="rg-eye" aria-label="Show password"
                    onclick="var i=document.getElementById('rg-password'),on=i.type==='password';i.type=on?'text':'password';this.classList.toggle('is-on',on);this.setAttribute('aria-label',on?'Hide password':'Show password');">
                    <svg class="rg-eye__show" xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    <svg class="rg-eye__hide" xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10.6 5.2A9.9 9.9 0 0 1 12 5c6.4 0 10 7 10 7a17.6 17.6 0 0 1-3.4 4.5"></path>
                        <path d="M6.6 6.6A17.3 17.3 0 0 0 2 12s3.6 7 10 7a9.7 9.7 0 0 0 4.3-1"></path>
                        <path d="M2 2l20 20"></path>
                    </svg>
                </button>
            </div>

            @error('password')
                <p class="rg-error">
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

        {{-- ---------- Confirm password ---------- --}}
        <div class="rg-field">
            <label class="rg-label" for="rg-password-confirm">Confirm password</label>

            <div class="rg-control rg-control--eye @error('password_confirmation') rg-control--error @enderror">
                <span class="rg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2.5"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                </span>

                <input id="rg-password-confirm" class="rg-input" type="password"
                    wire:model="password_confirmation" name="password_confirmation" required
                    placeholder="Repeat your password" autocomplete="new-password">

                <button type="button" class="rg-eye" aria-label="Show password"
                    onclick="var i=document.getElementById('rg-password-confirm'),on=i.type==='password';i.type=on?'text':'password';this.classList.toggle('is-on',on);this.setAttribute('aria-label',on?'Hide password':'Show password');">
                    <svg class="rg-eye__show" xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    <svg class="rg-eye__hide" xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10.6 5.2A9.9 9.9 0 0 1 12 5c6.4 0 10 7 10 7a17.6 17.6 0 0 1-3.4 4.5"></path>
                        <path d="M6.6 6.6A17.3 17.3 0 0 0 2 12s3.6 7 10 7a9.7 9.7 0 0 0 4.3-1"></path>
                        <path d="M2 2l20 20"></path>
                    </svg>
                </button>
            </div>

            @error('password_confirmation')
                <p class="rg-error">
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

        {{-- ---------- Gender ---------- --}}
        <div class="rg-field">
            <span class="rg-label" id="rg-gender-label">Gender</span>

            <div class="rg-seg" role="radiogroup" aria-labelledby="rg-gender-label">
                <label class="rg-seg__opt">
                    <input type="radio" wire:model="gender" name="gender" value="male" checked required>
                    <span class="rg-seg__label">Male</span>
                </label>
                <label class="rg-seg__opt">
                    <input type="radio" wire:model="gender" name="gender" value="female" required>
                    <span class="rg-seg__label">Female</span>
                </label>
            </div>

            @error('gender')
                <p class="rg-error">
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

        {{-- ---------- Terms ---------- --}}
        <label class="rg-check">
            <input type="checkbox" class="rg-check__input" required>
            <span class="rg-check__box" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
            </span>
            <span class="rg-check__text">
                I agree to the <a href="terms.html">terms and policy</a>
            </span>
        </label>

        {{-- ---------- Submit ---------- --}}
        <button class="rg-btn" type="submit" wire:loading.attr="disabled" wire:target="register">
            <span wire:loading.remove wire:target="register">Create account</span>
            <span wire:loading wire:target="register">Creating account…</span>
            <x-spinner />
        </button>
    </form>

    {{-- ---------- Footer ---------- --}}
    <p class="rg-foot">
        Already have an account?
        <a href="login">Sign in</a>
    </p>
</div>