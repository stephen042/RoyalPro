@php
    $progress = max(0, min(100, (float) ($user_data->progress_bar_status ?? 0)));
    $initials = strtoupper(substr($user_data->first_name ?? '', 0, 1) . substr($user_data->last_name ?? '', 0, 1));
@endphp

<div class="rx-summary-stack">
    <div class="rx-stats">
    <div class="rx-stat rx-stat--featured">
        <div class="rx-stat__top">
            <span class="rx-stat__label">Total balance</span>
            <span class="rx-stat__icon rx-stat__icon--accent"><i class="fe fe-wallet"></i></span>
        </div>
        <div class="rx-stat__value">${{ number_format((float) $user_data->balance, 2) }}</div>
        <div class="rx-stat__meta"><i class="fe fe-check-circle"></i> Available for trading</div>
        <div class="rx-balance__actions mt-1">
            <a href="{{ route('user_deposit') }}" class="btn btn-primary btn-sm">
                <i class="fe fe-plus"></i> Deposit
            </a>
            <a href="{{ route('user_withdraw') }}" class="btn btn-light btn-sm">
                <i class="fe fe-arrow-up-circle"></i> Withdraw
            </a>
        </div>
    </div>

    <div class="rx-stat">
        <div class="rx-stat__top">
            <span class="rx-stat__label">Total earnings</span>
            <span class="rx-stat__icon rx-stat__icon--success"><i class="fe fe-trending-up"></i></span>
        </div>
        <div class="rx-stat__value">${{ number_format((float) $user_data->earnings_balance, 2) }}</div>
        <div class="rx-stat__meta"><i class="fe fe-arrow-up-right"></i> Cumulative returns</div>
    </div>

    <div class="rx-stat">
        <div class="rx-stat__top">
            <span class="rx-stat__label">Subscription balance</span>
            <span class="rx-stat__icon rx-stat__icon--warning"><i class="fe fe-layers"></i></span>
        </div>
        <div class="rx-stat__value">${{ number_format((float) $user_data->sub_balance, 2) }}</div>
        <div class="rx-stat__meta"><i class="fe fe-shopping-bag"></i> Plan purchases</div>
    </div>

    <div class="rx-stat">
        <div class="rx-stat__top">
            <span class="rx-stat__label">Total withdrawals</span>
            <span class="rx-stat__icon rx-stat__icon--danger"><i class="fe fe-arrow-up-right"></i></span>
        </div>
        <div class="rx-stat__value">${{ number_format((float) $sum_withdrawal, 2) }}</div>
        <div class="rx-stat__meta"><i class="fe fe-shield"></i> Completed payouts</div>
    </div>
</div>

<div class="rx-progress-card">
    <div class="rx-progress-card__copy">
        <div class="rx-progress-card__head">
            <h3 class="rx-progress-card__title">
                <span class="rx-status-dot"></span> Trading progress
                <span class="rx-chip rx-chip--success ms-1">Live account</span>
            </h3>
            <span class="rx-progress-card__value">{{ number_format($progress, 0) }}%</span>
        </div>
        <div class="progress" role="progressbar" aria-label="Trading progress" aria-valuenow="{{ $progress }}"
            aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: {{ $progress }}%"></div>
        </div>
    </div>
    <div class="rx-progress-card__icon">
        <i class="fe fe-activity"></i>
    </div>
</div>
</div>
