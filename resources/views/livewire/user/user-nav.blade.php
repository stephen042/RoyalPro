<div class="rx-nav-actions">
    <div class="rx-dropdown-wrap">
        <button class="rx-iconbtn" type="button" data-rx-dropdown="rx-notifications-panel" aria-label="Notifications"
            aria-expanded="false">
            <i class="fe fe-bell"></i>
            @if (!empty($user_notifications_count))
                <span class="rx-dot"></span>
            @endif
        </button>

    <div class="rx-dropdown rx-notif" id="rx-notifications-panel" role="menu">
        <div class="rx-notif__head">
            <h6>Notifications <span class="rx-notif__count">{{ $user_notifications_count }}</span></h6>
            @if (!empty($user_notifications_count))
                <button type="button" class="rx-notif__clear" wire:click="clear_notifications">Clear all</button>
            @endif
        </div>

        <div class="rx-notif__list">
            @forelse ($user_notifications as $item)
                <div class="rx-notif__item">
                    <div class="rx-notif__icon"><i class="fe fe-message-square"></i></div>
                    <div class="rx-notif__body">
                        <h6>{{ $item->notifications_category }}</h6>
                        <p>{{ $item->notifications_message }}</p>
                    </div>
                </div>
            @empty
                <div class="rx-notif__empty">
                    <i class="fe fe-bell mb-2 d-block" style="font-size: 22px; opacity: 0.5;"></i>
                    You are all caught up.
                </div>
            @endforelse
        </div>
    </div>
</div>

<div class="rx-dropdown-wrap ms-1">
    <button class="rx-topbar__user" type="button" data-rx-dropdown="rx-profile-panel" aria-label="Account menu"
        aria-expanded="false">
        <span class="rx-avatar">
            @if ($user_data->profile_pic)
                <img src="{{ asset('storage/' . $user_data->profile_pic) }}" alt="{{ $user_data->first_name }}">
            @else
                {{ strtoupper(substr($user_data->first_name ?? '', 0, 1) . substr($user_data->last_name ?? '', 0, 1)) ?: 'U' }}
            @endif
        </span>
        <span class="rx-topbar__user-name">{{ $user_data->first_name }}</span>
        <i class="fe fe-chevron-down"></i>
    </button>

    <div class="rx-dropdown" id="rx-profile-panel" role="menu">
        <div class="drop-heading">
            <div class="text-center">
                <h5 class="mb-0">{{ $user_data->first_name . ' ' . $user_data->last_name }}</h5>
                <small class="rx-muted">{{ $user_data->email }}</small>
            </div>
        </div>
        <a class="dropdown-item" href="{{ route('account_settings') }}">
            <i class="dropdown-icon fe fe-user"></i> Account settings
        </a>
        <a class="dropdown-item" href="{{ route('security_settings') }}">
            <i class="dropdown-icon fe fe-shield"></i> Security settings
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-danger" wire:click="logout"
            wire:confirm="Are you sure you want to logout ?" href="javascript:void(0);">
            <i class="dropdown-icon fe fe-log-out"></i> Sign out
        </a>
    </div>
</div>
</div>
