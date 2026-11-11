<header class="rx-topbar">
    <button class="rx-topbar__toggle" type="button" data-rx-sidebar-toggle aria-label="Toggle navigation">
        <i class="fe fe-menu"></i>
    </button>

    <a href="{{ route('user_dashboard') }}" class="rx-topbar__brand">
        <span class="rx-rail__logo">
            <img src="{{ asset('home-assets/assets/img/forex-logo.png') }}" alt="{{ config('app.name') }}">
        </span>
        {{ config('app.name') }}
    </a>

    <div class="rx-topbar__context">
        <span class="rx-dot rx-dot--live"></span>
        <strong>Markets live</strong>
        <span class="rx-topbar__sep"></span>
        <span>Client workspace</span>
    </div>

    <div class="rx-topbar__spacer"></div>

    <div class="rx-topbar__actions">
        <a class="rx-iconbtn layout-setting" href="javascript:void(0);" aria-label="Switch color theme"
            title="Switch color theme">
            <span class="dark-layout"><i class="fe fe-moon"></i></span>
            <span class="light-layout"><i class="fe fe-sun"></i></span>
        </a>

        <livewire:user.user-nav />
    </div>
</header>
