<x-user.layout title="Trade">

    <x-user.page-head
        eyebrow="<i class='fe fe-trending-up'></i> Trading"
        title="Trade market"
        subtitle="Place a buy or sell position and monitor your account strength in real time.">
        <x-slot:actions>
            <a href="{{ route('user_trade_history') }}" class="btn btn-light">
                <i class="fe fe-clock"></i> Trade history
            </a>
            <a href="{{ route('user_deposit') }}" class="btn btn-primary">
                <i class="fe fe-plus"></i> Add funds
            </a>
        </x-slot:actions>
    </x-user.page-head>

    <div class="rx-row">
        <div class="rx-col-8">
            <div class="rx-panel h-100">
                <div class="rx-panel__head">
                    <div>
                        <h2 class="rx-panel__title">Open a position</h2>
                        <p class="rx-panel__sub">Choose buy or sell and confirm your trade details.</p>
                    </div>
                    <span class="rx-stat__icon rx-stat__icon--accent"><i class="fe fe-zap"></i></span>
                </div>
                <div class="rx-panel__body">
                    <ul class="nav rx-tabs mb-4" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#rx-trade-buy"
                                type="button" role="tab">Buy</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#rx-trade-sell"
                                type="button" role="tab">Sell</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="rx-trade-buy" role="tabpanel">
                            <livewire:user.buy-trade />
                        </div>
                        <div class="tab-pane fade" id="rx-trade-sell" role="tabpanel">
                            <livewire:user.sell-trade />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rx-col-4">
            <div class="rx-stack">
                <div class="rx-panel">
                    <div class="rx-panel__head">
                        <div>
                            <h2 class="rx-panel__title">Account snapshot</h2>
                            <p class="rx-panel__sub">Available funds and payout history</p>
                        </div>
                        <span class="rx-stat__icon rx-stat__icon--success"><i class="fe fe-wallet"></i></span>
                    </div>
                    <div class="rx-panel__body">
                        <ul class="rx-list">
                            <li class="rx-list__item">
                                <span class="rx-list__label">Trading balance</span>
                                <span class="rx-list__value">${{ number_format((float) auth()->user()->balance, 2) }}</span>
                            </li>
                            <li class="rx-list__item">
                                <span class="rx-list__label">Subscription balance</span>
                                <span class="rx-list__value">${{ number_format((float) auth()->user()->sub_balance, 2) }}</span>
                            </li>
                            <li class="rx-list__item">
                                <span class="rx-list__label">Total withdrawn</span>
                                <span class="rx-list__value">${{ number_format((float) $sum_withdrawal, 2) }}</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="rx-panel">
                    <div class="rx-panel__head">
                        <div>
                            <h2 class="rx-panel__title">Performance</h2>
                            <p class="rx-panel__sub">Account strength indicators</p>
                        </div>
                    </div>
                    <div class="rx-panel__body">
                        <div class="rx-meter">
                            <div class="rx-meter__head">
                                <span>Trading progress</span>
                                <strong>{{ auth()->user()->progress_bar_status }}%</strong>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" style="width: {{ auth()->user()->progress_bar_status }}%"></div>
                            </div>
                        </div>

                        <div class="rx-meter">
                            <div class="rx-meter__head">
                                <span>Signal strength</span>
                                <strong>{{ auth()->user()->signal_strength }}%</strong>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width: {{ auth()->user()->signal_strength }}%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-user.layout>
