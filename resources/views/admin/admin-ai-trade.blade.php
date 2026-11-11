<!doctype html>
<html lang="en" dir="ltr">

<head>

    @include('includes.admin-head')

</head>

<body class="app sidebar-mini ltr light-mode">

    @include('includes.loader')

    <div class="page">
        <div class="page-main">

            @include('includes.admin-nav')
            @include('includes.admin-sidebar')

            <div class="main-content app-content mt-0">
                <div class="side-app">
                    <div class="main-container container-fluid">

                        @include('includes.flash-alerts')

                        <div class="rg-page-head">
                            <div>
                                <span class="rg-eyebrow"><i class="fe fe-cpu"></i> AI trading</span>
                                <h1>{{ $user_data->first_name }}'s AI space</h1>
                                <p>Open a managed buy or sell position for this customer.</p>
                            </div>
                            <div class="rg-page-actions">
                                <span class="rg-chip rg-chip--primary"><i class="fe fe-id"></i> {{ $user_data->account_status }}</span>
                                <a href="{{ route('edit_user', [$user_data->id]) }}" class="btn btn-light">
                                    <i class="fe fe-arrow-left"></i> Customer profile
                                </a>
                            </div>
                        </div>

                        <div class="rg-stat-grid">
                            <div class="rg-stat">
                                <div class="rg-stat__top">
                                    <span class="rg-stat__label">Main balance</span>
                                    <span class="rg-stat__icon rg-stat__icon--primary"><i class="fe fe-wallet"></i></span>
                                </div>
                                <div class="rg-stat__value">${{ number_format((float) $user_data->balance, 2) }}</div>
                            </div>
                            <div class="rg-stat">
                                <div class="rg-stat__top">
                                    <span class="rg-stat__label">Subscription balance</span>
                                    <span class="rg-stat__icon rg-stat__icon--warning"><i class="fe fe-layers"></i></span>
                                </div>
                                <div class="rg-stat__value">${{ number_format((float) $user_data->sub_balance, 2) }}</div>
                            </div>
                            <div class="rg-stat">
                                <div class="rg-stat__top">
                                    <span class="rg-stat__label">Total withdrawn</span>
                                    <span class="rg-stat__icon rg-stat__icon--info"><i class="fe fe-arrow-up-right"></i></span>
                                </div>
                                <div class="rg-stat__value">${{ number_format((float) $total_withdrawn, 2) }}</div>
                            </div>
                            <div class="rg-stat">
                                <div class="rg-stat__top">
                                    <span class="rg-stat__label">Account status</span>
                                    <span class="rg-stat__icon rg-stat__icon--primary"><i class="fe fe-shield"></i></span>
                                </div>
                                <div class="rg-stat__value rg-stat__value--sm">{{ $user_data->account_status }}</div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="card-title">Place an AI trade</h2>
                                    <p class="rg-panel__sub mb-0">Choose the market, asset, amount, and duration.</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="buy-tab" data-bs-toggle="tab"
                                            data-bs-target="#tab5" type="button" role="tab" aria-controls="tab5"
                                            aria-selected="true">
                                            <i class="fe fe-trending-up"></i> Buy
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="sell-tab" data-bs-toggle="tab"
                                            data-bs-target="#tab6" type="button" role="tab" aria-controls="tab6"
                                            aria-selected="false">
                                            <i class="fe fe-trending-down"></i> Sell
                                        </button>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab5" role="tabpanel" aria-labelledby="buy-tab">
                                        <livewire:admin.ai-buy-trade :user_data="$user_data" />
                                    </div>
                                    <div class="tab-pane fade" id="tab6" role="tabpanel" aria-labelledby="sell-tab">
                                        <livewire:admin.ai-sell-trade :user_data="$user_data" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @include('includes.admin-footer')
    </div>

    @include('includes.admin-script')

</body>

</html>
