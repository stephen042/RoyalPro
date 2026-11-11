@php
    $adminUser = auth()->user();
    $adminInitials = strtoupper(substr($adminUser->first_name ?? '', 0, 1) . substr($adminUser->last_name ?? '', 0, 1));
    $planRoutesActive = request()->routeIs('create_ai_plan', 'create_status_plan', 'create_signal_plan');
@endphp

<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('admin_dashboard') }}">
                <span class="rg-brand">
                    <img src="{{ asset('home-assets/assets/img/forex-logo.png') }}" alt="{{ config('app.name') }}" class="rg-brand__logo">
                    <span class="rg-brand__text">
                        <strong>{{ config('app.name') }}</strong>
                        <small>Administration</small>
                    </span>
                </span>
            </a>
        </div>

        <div class="main-sidemenu">
            <ul class="side-menu">
                <li class="sub-category"><h3>Overview</h3></li>

                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('admin_dashboard') ? 'active' : '' }}" href="{{ route('admin_dashboard') }}">
                        <i class="side-menu__icon fe fe-home"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>

                <li class="sub-category"><h3>Operations</h3></li>

                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('admin_wallets') ? 'active' : '' }}" href="{{ route('admin_wallets') }}">
                        <i class="side-menu__icon fe fe-credit-card"></i>
                        <span class="side-menu__label">Wallet addresses</span>
                    </a>
                </li>

                <li class="slide {{ $planRoutesActive ? 'is-expanded' : '' }}">
                    <a class="side-menu__item {{ $planRoutesActive ? 'active' : '' }}" data-bs-toggle="slide" href="javascript:void(0);">
                        <i class="side-menu__icon fe fe-database"></i>
                        <span class="side-menu__label">Create plans</span>
                        <i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('create_ai_plan') }}" class="slide-item {{ request()->routeIs('create_ai_plan') ? 'active' : '' }}">AI plans</a></li>
                        <li><a href="{{ route('create_status_plan') }}" class="slide-item {{ request()->routeIs('create_status_plan') ? 'active' : '' }}">Status plans</a></li>
                        <li><a href="{{ route('create_signal_plan') }}" class="slide-item {{ request()->routeIs('create_signal_plan') ? 'active' : '' }}">Signal plans</a></li>
                    </ul>
                </li>

                <li class="sub-category"><h3>Account</h3></li>

                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('profile_settings') ? 'active' : '' }}" href="{{ route('profile_settings') }}">
                        <i class="side-menu__icon fe fe-user-check"></i>
                        <span class="side-menu__label">Profile settings</span>
                    </a>
                </li>

                <li class="slide">
                    <a class="side-menu__item" href="{{ route('user_dashboard') }}">
                        <i class="side-menu__icon fe fe-external-link"></i>
                        <span class="side-menu__label">Client website</span>
                    </a>
                </li>
            </ul>

            <div class="rg-sidebar-profile">
                <div class="rg-sidebar-profile__avatar">
                    @if ($adminUser->profile_pic)
                        <img src="{{ asset('storage/' . $adminUser->profile_pic) }}" alt="{{ $adminUser->first_name }}">
                    @else
                        {{ $adminInitials ?: 'A' }}
                    @endif
                </div>
                <div class="rg-sidebar-profile__copy">
                    <strong>{{ $adminUser->first_name }} {{ $adminUser->last_name }}</strong>
                    <small>Administrator</small>
                </div>
            </div>
        </div>
    </aside>
</div>
