@php
    $authUser = auth()->user();
    $initials = strtoupper(substr($authUser->first_name ?? '', 0, 1) . substr($authUser->last_name ?? '', 0, 1));
    $plansActive = request()->routeIs('user_ai_plans', 'user_status', 'user_signal_plans');
    $historyActive = request()->routeIs('user_trade_history', 'user_deposit_history', 'user_withdraw_history');
    $profileActive = request()->routeIs('account_settings', 'security_settings');
@endphp

<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('user_dashboard') }}">
                <span class="rg-brand">
                    <img src="{{ asset('home-assets/assets/img/forex-logo.png') }}" alt="{{ config('app.name') }}" class="rg-brand__logo">
                    <span class="rg-brand__text">
                        <strong>{{ config('app.name') }}</strong>
                        <small>Trading terminal</small>
                    </span>
                </span>
            </a>
        </div>

        <div class="main-sidemenu">
            <ul class="side-menu">
                <li class="sub-category"><h3>Overview</h3></li>

                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('user_dashboard') ? 'active' : '' }}" href="{{ route('user_dashboard') }}">
                        <i class="side-menu__icon fe fe-grid"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>

                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('user_trade') ? 'active' : '' }}" href="{{ route('user_trade') }}">
                        <i class="side-menu__icon fe fe-trending-up"></i>
                        <span class="side-menu__label">Trade market</span>
                    </a>
                </li>

                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('user_deposit') ? 'active' : '' }}" href="{{ route('user_deposit') }}">
                        <i class="side-menu__icon fe fe-arrow-down-circle"></i>
                        <span class="side-menu__label">Deposit</span>
                    </a>
                </li>

                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('user_sub_deposit') ? 'active' : '' }}" href="{{ route('user_sub_deposit') }}">
                        <i class="side-menu__icon fe fe-repeat"></i>
                        <span class="side-menu__label">Subscription deposit</span>
                    </a>
                </li>

                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('user_withdraw') ? 'active' : '' }}" href="{{ route('user_withdraw') }}">
                        <i class="side-menu__icon fe fe-arrow-up-circle"></i>
                        <span class="side-menu__label">Withdrawal</span>
                    </a>
                </li>

                <li class="sub-category"><h3>Products</h3></li>

                <li class="slide {{ $plansActive ? 'is-expanded' : '' }}">
                    <a class="side-menu__item {{ $plansActive ? 'active' : '' }}" data-bs-toggle="slide" href="javascript:void(0);">
                        <i class="side-menu__icon fe fe-layers"></i>
                        <span class="side-menu__label">Plans</span>
                        <i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('user_ai_plans') }}" class="slide-item {{ request()->routeIs('user_ai_plans') ? 'active' : '' }}">AI plans</a></li>
                        <li><a href="{{ route('user_status') }}" class="slide-item {{ request()->routeIs('user_status') ? 'active' : '' }}">Status plans</a></li>
                        <li><a href="{{ route('user_signal_plans') }}" class="slide-item {{ request()->routeIs('user_signal_plans') ? 'active' : '' }}">Signal plans</a></li>
                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('user_stake') ? 'active' : '' }}" href="{{ route('user_stake') }}">
                        <i class="side-menu__icon fe fe-lock"></i>
                        <span class="side-menu__label">Stake</span>
                    </a>
                </li>

                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('user_card') ? 'active' : '' }}" href="{{ route('user_card') }}">
                        <i class="side-menu__icon fe fe-credit-card"></i>
                        <span class="side-menu__label">Virtual card</span>
                    </a>
                </li>

                <li class="sub-category"><h3>Activity</h3></li>

                <li class="slide {{ $historyActive ? 'is-expanded' : '' }}">
                    <a class="side-menu__item {{ $historyActive ? 'active' : '' }}" data-bs-toggle="slide" href="javascript:void(0);">
                        <i class="side-menu__icon fe fe-clock"></i>
                        <span class="side-menu__label">History</span>
                        <i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('user_trade_history') }}" class="slide-item {{ request()->routeIs('user_trade_history') ? 'active' : '' }}">Trade history</a></li>
                        <li><a href="{{ route('user_deposit_history') }}" class="slide-item {{ request()->routeIs('user_deposit_history') ? 'active' : '' }}">Deposit history</a></li>
                        <li><a href="{{ route('user_withdraw_history') }}" class="slide-item {{ request()->routeIs('user_withdraw_history') ? 'active' : '' }}">Withdrawal history</a></li>
                    </ul>
                </li>

                <li class="sub-category"><h3>Account</h3></li>

                <li class="slide {{ $profileActive ? 'is-expanded' : '' }}">
                    <a class="side-menu__item {{ $profileActive ? 'active' : '' }}" data-bs-toggle="slide" href="javascript:void(0);">
                        <i class="side-menu__icon fe fe-user"></i>
                        <span class="side-menu__label">Profile settings</span>
                        <i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('account_settings') }}" class="slide-item {{ request()->routeIs('account_settings') ? 'active' : '' }}">Account settings</a></li>
                        <li><a href="{{ route('security_settings') }}" class="slide-item {{ request()->routeIs('security_settings') ? 'active' : '' }}">Security settings</a></li>
                    </ul>
                </li>
            </ul>

            <div class="rg-sidebar-profile">
                <div class="rg-sidebar-profile__avatar">
                    @if ($authUser->profile_pic)
                        <img src="{{ asset('storage/' . $authUser->profile_pic) }}" alt="{{ $authUser->first_name }}">
                    @else
                        {{ $initials ?: 'U' }}
                    @endif
                </div>
                <div class="rg-sidebar-profile__copy">
                    <strong>{{ $authUser->first_name }} {{ $authUser->last_name }}</strong>
                    <small>{{ $authUser->account_status ?: 'Standard account' }}</small>
                </div>
            </div>
        </div>
    </aside>
</div>
