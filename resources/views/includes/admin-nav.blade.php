<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex align-items-center w-100 rg-topbar">
            <a aria-label="Toggle sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0);"></a>

            <a href="{{ route('admin_dashboard') }}" class="rg-brand d-lg-none">
                <img src="{{ asset('home-assets/assets/img/forex-logo.png') }}" alt="{{ config('app.name') }}" class="rg-brand__logo">
            </a>

            <div class="rg-topbar__context d-none d-lg-flex">
                <span class="rg-status-dot"></span>
                <span>Operations online</span>
                <span class="rg-topbar__divider"></span>
                <span>Administration console</span>
            </div>

            <div class="header-right-icons">
                <div class="dropdown d-flex">
                    <a class="nav-link icon theme-layout nav-link-bg layout-setting" href="javascript:void(0);" aria-label="Switch color theme" title="Switch color theme">
                        <span class="dark-layout"><i class="fe fe-moon"></i></span>
                        <span class="light-layout"><i class="fe fe-sun"></i></span>
                    </a>
                </div>

                <div class="dropdown d-none d-md-flex">
                    <a class="nav-link icon full-screen-link nav-link-bg" href="javascript:void(0);" aria-label="Toggle fullscreen" title="Toggle fullscreen">
                        <i class="fe fe-minimize fullscreen-button"></i>
                    </a>
                </div>

                <button class="navbar-toggler navresponsive-toggler d-lg-none" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>

                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2 align-items-center">
                            <div class="dropdown d-flex profile-1">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown" class="nav-link leading-none d-flex px-1">
                                    <span>
                                        @if ($admin_data->profile_pic)
                                            <img src="{{ asset('storage/' . $admin_data->profile_pic) }}"
                                                alt="{{ $admin_data->first_name }}" class="avatar profile-user brround cover-image">
                                        @else
                                            <img src="{{ asset('assets/images/profile.png') }}" alt="Administrator"
                                                class="avatar profile-user brround cover-image">
                                        @endif
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <div class="drop-heading">
                                        <div class="text-center">
                                            <h5 class="mb-0">{{ $admin_data->first_name . ' ' . $admin_data->last_name }}</h5>
                                            <small>Administrator</small>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider m-0"></div>
                                    <a class="dropdown-item" href="{{ route('profile_settings') }}">
                                        <i class="dropdown-icon fe fe-user"></i> Profile settings
                                    </a>
                                    <livewire:admin.logout />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
