<x-user.layout title="Dashboard">

    <x-user.page-head
        eyebrow="<i class='fe fe-grid'></i> Dashboard"
        title="Welcome back, {{ auth()->user()->first_name }}"
        subtitle="Track your portfolio, review market movement, and manage your trades from one place.">

        <x-slot:actions>
            <span class="rx-chip {{ auth()->user()->verify_status == 0 ? 'rx-chip--danger' : 'rx-chip--success' }}">
                <i class="fe {{ auth()->user()->verify_status == 0 ? 'fe-x-circle' : 'fe-check-circle' }}"></i>
                {{ auth()->user()->verify_status == 0 ? 'Unverified' : 'Verified' }}
            </span>
            <span
                class="rx-chip {{ auth()->user()->account_status == 'None' ? 'rx-chip--neutral' : 'rx-chip--accent' }}">
                <i class="fe fe-award"></i>
                {{ auth()->user()->account_status ?: 'Standard' }}
            </span>
            <a href="{{ route('user_withdraw') }}" class="btn btn-light">
                <i class="fe fe-arrow-up-circle"></i> Withdraw
            </a>
            <a href="{{ route('user_deposit') }}" class="btn btn-primary">
                <i class="fe fe-plus"></i> Deposit
            </a>
        </x-slot:actions>
    </x-user.page-head>

    @php
        $dashboardUser = auth()->user();
        $adminMessage = $dashboardUser->admin_messages->first();
    @endphp

    @if ($adminMessage)
        <div class="rx-notice admin-message">
            <div class="rx-notice__icon">
                <i class="fe fe-bell"></i>
            </div>
            <div class="rx-notice__body">
                <div class="rx-notice__meta">
                    <span>Account notice</span>
                    @if ($adminMessage->created_at)
                        <span>·</span>
                        <span>{{ $adminMessage->created_at->diffForHumans() }}</span>
                    @endif
                </div>
                <h2 class="rx-notice__title">{{ $adminMessage->title ?? 'System notification' }}</h2>
                <p class="rx-notice__text">{{ $adminMessage->message ?? 'No message content available.' }}</p>
            </div>
            <button type="button" class="rx-notice__close close-message-btn" aria-label="Dismiss notification">
                <i class="fe fe-x"></i>
            </button>
        </div>
    @endif

    <livewire:user.account-summary />

    <div class="rx-row">
        <div class="rx-col-8">
            <div class="rx-panel h-100">
                <div class="rx-panel__head">
                    <div>
                        <h2 class="rx-panel__title">Market overview</h2>
                        <p class="rx-panel__sub">EUR/USD · Daily chart</p>
                    </div>
                    <span class="rx-chip rx-chip--success">
                        <span class="rx-status-dot"></span> Live
                    </span>
                </div>
                <div class="rx-panel__body rx-panel__body--flush">
                    <div class="tradingview-widget-container">
                        <div id="rx-market-chart" style="width: 100%; height: 440px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rx-col-4">
            <div class="rx-panel h-100">
                <div class="rx-panel__head">
                    <div>
                        <h2 class="rx-panel__title">Quick trade</h2>
                        <p class="rx-panel__sub">Open a position from your available balance</p>
                    </div>
                    <span class="rx-stat__icon rx-stat__icon--accent"><i class="fe fe-zap"></i></span>
                </div>
                <div class="rx-panel__body">
                    <ul class="nav rx-tabs mb-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#rx-buy-panel"
                                type="button" role="tab">Buy</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#rx-sell-panel"
                                type="button" role="tab">Sell</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="rx-buy-panel" role="tabpanel">
                            <livewire:user.buy-trade />
                        </div>
                        <div class="tab-pane fade" id="rx-sell-panel" role="tabpanel">
                            <livewire:user.sell-trade />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.querySelectorAll('.close-message-btn').forEach(function (button) {
                button.addEventListener('click', function () {
                    var notice = this.closest('.admin-message');
                    if (notice) notice.remove();
                });
            });

            (function () {
                var containerId = 'rx-market-chart';

                function renderMarketChart() {
                    var container = document.getElementById(containerId);
                    if (!container || !window.TradingView) return;

                    var theme = document.body.classList.contains('dark-mode') ? 'dark' : 'light';
                    container.innerHTML = '';

                    new TradingView.widget({
                        container_id: containerId,
                        width: '100%',
                        height: 440,
                        autosize: true,
                        symbol: 'FX:EURUSD',
                        interval: 'D',
                        timezone: 'exchange',
                        theme: theme,
                        style: '1',
                        withdateranges: true,
                        allow_symbol_change: true,
                        save_image: false,
                        details: false,
                        hotlist: false,
                        calendar: false,
                        hide_side_toolbar: true,
                        locale: 'en'
                    });
                }

                if (window.TradingView) {
                    renderMarketChart();
                } else {
                    var script = document.createElement('script');
                    script.src = 'https://s3.tradingview.com/tv.js';
                    script.async = true;
                    script.onload = renderMarketChart;
                    document.head.appendChild(script);
                }

                document.addEventListener('rx-theme-changed', function () {
                    window.setTimeout(renderMarketChart, 120);
                });
            })();
        </script>
    @endpush

</x-user.layout>
