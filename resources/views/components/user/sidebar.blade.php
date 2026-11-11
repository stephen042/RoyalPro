@php
    $railUser = auth()->user();
    $railInitials = strtoupper(substr($railUser->first_name ?? '', 0, 1) . substr($railUser->last_name ?? '', 0, 1));

    $plansActive = request()->routeIs('user_ai_plans', 'user_status', 'user_signal_plans');
    $historyActive = request()->routeIs('user_trade_history', 'user_deposit_history', 'user_withdraw_history');
    $profileActive = request()->routeIs('account_settings', 'security_settings');
@endphp

<div class="rx-rail__overlay" aria-hidden="true"></div>

<aside class="rx-rail" aria-label="Primary navigation">
    <div class="rx-rail__head">
        <a href="{{ route('user_dashboard') }}" class="d-flex align-items-center gap-2 text-decoration-none">
            <span class="rx-rail__logo">
                <img src="{{ asset('home-assets/assets/img/forex-logo.png') }}" alt="{{ config('app.name') }}">
            </span>
            <span class="rx-rail__brand">
                <strong>{{ config('app.name') }}</strong>
                <small>Trading desk</small>
            </span>
        </a>
    </div>

    <div class="rx-rail__scroll">
        <div class="rx-rail__section">Overview</div>
        <ul class="rx-nav">
            <li class="rx-nav__item">
                <a class="rx-nav__link {{ request()->routeIs('user_dashboard') ? 'is-active' : '' }}"
                    href="{{ route('user_dashboard') }}">
                    <span class="rx-nav__icon"><i class="fe fe-grid"></i></span>
                    <span class="rx-nav__label">Dashboard</span>
                </a>
            </li>
            <li class="rx-nav__item">
                <a class="rx-nav__link {{ request()->routeIs('user_trade') ? 'is-active' : '' }}"
                    href="{{ route('user_trade') }}">
                    <span class="rx-nav__icon"><i class="fe fe-trending-up"></i></span>
                    <span class="rx-nav__label">Trade market</span>
                </a>
            </li>
            <li class="rx-nav__item">
                <a class="rx-nav__link {{ request()->routeIs('user_crypto_wallets') ? 'is-active' : '' }}"
                    href="{{ route('user_crypto_wallets') }}">
                    <span class="rx-nav__icon"><i class="fe fe-database"></i></span>
                    <span class="rx-nav__label">Crypto wallets</span>
                </a>
            </li>
        </ul>

        <div class="rx-rail__section">Funding</div>
        <ul class="rx-nav">
            <li class="rx-nav__item">
                <a class="rx-nav__link {{ request()->routeIs('user_deposit') ? 'is-active' : '' }}"
                    href="{{ route('user_deposit') }}">
                    <span class="rx-nav__icon"><i class="fe fe-arrow-down-circle"></i></span>
                    <span class="rx-nav__label">Deposit</span>
                </a>
            </li>
            <li class="rx-nav__item">
                <a class="rx-nav__link {{ request()->routeIs('user_sub_deposit') ? 'is-active' : '' }}"
                    href="{{ route('user_sub_deposit') }}">
                    <span class="rx-nav__icon"><i class="fe fe-repeat"></i></span>
                    <span class="rx-nav__label">Subscription deposit</span>
                </a>
            </li>
            <li class="rx-nav__item">
                <a class="rx-nav__link {{ request()->routeIs('user_withdraw') ? 'is-active' : '' }}"
                    href="{{ route('user_withdraw') }}">
                    <span class="rx-nav__icon"><i class="fe fe-arrow-up-circle"></i></span>
                    <span class="rx-nav__label">Withdrawal</span>
                </a>
            </li>
        </ul>

        <div class="rx-rail__section">Products</div>
        <ul class="rx-nav">
            <li class="rx-nav__item {{ $plansActive ? 'is-open' : '' }}">
                <a class="rx-nav__link {{ $plansActive ? 'is-active' : '' }}" data-rx-slide href="javascript:void(0);">
                    <span class="rx-nav__icon"><i class="fe fe-layers"></i></span>
                    <span class="rx-nav__label">Plans</span>
                    <i class="fe fe-chevron-right rx-nav__caret"></i>
                </a>
                <ul class="rx-nav__sub">
                    <li><a href="{{ route('user_ai_plans') }}"
                            class="rx-nav__sublink {{ request()->routeIs('user_ai_plans') ? 'is-active' : '' }}">AI
                            plans</a></li>
                    <li><a href="{{ route('user_status') }}"
                            class="rx-nav__sublink {{ request()->routeIs('user_status') ? 'is-active' : '' }}">Status
                            plans</a></li>
                    <li><a href="{{ route('user_signal_plans') }}"
                            class="rx-nav__sublink {{ request()->routeIs('user_signal_plans') ? 'is-active' : '' }}">Signal
                            plans</a></li>
                </ul>
            </li>
            <li class="rx-nav__item">
                <a class="rx-nav__link {{ request()->routeIs('user_stake') ? 'is-active' : '' }}"
                    href="{{ route('user_stake') }}">
                    <span class="rx-nav__icon"><i class="fe fe-lock"></i></span>
                    <span class="rx-nav__label">Stake</span>
                </a>
            </li>
            <li class="rx-nav__item">
                <a class="rx-nav__link {{ request()->routeIs('user_card') ? 'is-active' : '' }}"
                    href="{{ route('user_card') }}">
                    <span class="rx-nav__icon"><i class="fe fe-credit-card"></i></span>
                    <span class="rx-nav__label">Virtual card</span>
                </a>
            </li>
        </ul>

        <div class="rx-rail__section">Activity</div>
        <ul class="rx-nav">
            <li class="rx-nav__item {{ $historyActive ? 'is-open' : '' }}">
                <a class="rx-nav__link {{ $historyActive ? 'is-active' : '' }}" data-rx-slide href="javascript:void(0);">
                    <span class="rx-nav__icon"><i class="fe fe-clock"></i></span>
                    <span class="rx-nav__label">History</span>
                    <i class="fe fe-chevron-right rx-nav__caret"></i>
                </a>
                <ul class="rx-nav__sub">
                    <li><a href="{{ route('user_trade_history') }}"
                            class="rx-nav__sublink {{ request()->routeIs('user_trade_history') ? 'is-active' : '' }}">Trade
                            history</a></li>
                    <li><a href="{{ route('user_deposit_history') }}"
                            class="rx-nav__sublink {{ request()->routeIs('user_deposit_history') ? 'is-active' : '' }}">Deposit
                            history</a></li>
                    <li><a href="{{ route('user_withdraw_history') }}"
                            class="rx-nav__sublink {{ request()->routeIs('user_withdraw_history') ? 'is-active' : '' }}">Withdrawal
                            history</a></li>
                </ul>
            </li>
        </ul>

        <div class="rx-rail__section">Account</div>
        <ul class="rx-nav">
            <li class="rx-nav__item {{ $profileActive ? 'is-open' : '' }}">
                <a class="rx-nav__link {{ $profileActive ? 'is-active' : '' }}" data-rx-slide href="javascript:void(0);">
                    <span class="rx-nav__icon"><i class="fe fe-user"></i></span>
                    <span class="rx-nav__label">Profile settings</span>
                    <i class="fe fe-chevron-right rx-nav__caret"></i>
                </a>
                <ul class="rx-nav__sub">
                    <li><a href="{{ route('account_settings') }}"
                            class="rx-nav__sublink {{ request()->routeIs('account_settings') ? 'is-active' : '' }}">Account
                            settings</a></li>
                    <li><a href="{{ route('security_settings') }}"
                            class="rx-nav__sublink {{ request()->routeIs('security_settings') ? 'is-active' : '' }}">Security
                            settings</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="rx-rail__foot">
        <div class="rx-rail__user">
            <span class="rx-avatar">
                @if ($railUser->profile_pic)
                    <img src="{{ asset('storage/' . $railUser->profile_pic) }}" alt="{{ $railUser->first_name }}">
                @else
                    {{ $railInitials ?: 'U' }}
                @endif
            </span>
            <span class="rx-rail__user-copy">
                <strong>{{ $railUser->first_name }} {{ $railUser->last_name }}</strong>
                <small>{{ $railUser->account_status ?: 'Standard account' }}</small>
            </span>
        </div>
    </div>
</aside>
