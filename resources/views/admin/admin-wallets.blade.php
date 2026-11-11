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
                                <span class="rg-eyebrow"><i class="fe fe-wallet"></i> Settings</span>
                                <h1>Deposit wallets</h1>
                                <p>Manage the wallet addresses shown to customers when they make a deposit.</p>
                            </div>
                            <div class="rg-page-actions">
                                <span class="rg-chip rg-chip--neutral"><i class="fe fe-hash"></i> Wallet #{{ $admin_wallets->id }}</span>
                            </div>
                        </div>

                        <div class="row g-4">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <div>
                                            <h2 class="card-title">Current addresses</h2>
                                            <p class="rg-panel__sub mb-0">Review the active deposit destinations.</p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex flex-column gap-2">
                                            @foreach (['btc' => 'Bitcoin BTC', 'eth' => 'Ethereum', 'usdt' => 'USDT TRC20', 'cash_app' => 'Cash App', 'paypal' => 'PayPal', 'zelle' => 'Zelle', 'bnb' => 'BNB Smart Chain', 'bch' => 'Bitcoin Cash', 'ltc' => 'Litecoin', 'xrp' => 'Ripple'] as $field => $label)
                                                <div class="rg-wallet">
                                                    <div class="rg-wallet__meta">
                                                        <strong>{{ $label }}</strong>
                                                        <small class="text-break">{{ $admin_wallets->$field ?: 'Not configured' }}</small>
                                                    </div>
                                                    @if ($admin_wallets->$field)
                                                        <span class="rg-chip rg-chip--success"><i class="fe fe-check"></i></span>
                                                    @else
                                                        <span class="rg-chip rg-chip--neutral"><i class="fe fe-minus"></i></span>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-header">
                                        <div>
                                            <h2 class="card-title">Update wallet addresses</h2>
                                            <p class="rg-panel__sub mb-0">Paste the new address or payment tag for each method.</p>
                                        </div>
                                    </div>
                                    <form action="{{ route('admin_wallets_post') }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                @foreach (['btc' => 'Bitcoin BTC', 'eth' => 'Ethereum', 'usdt' => 'USDT TRC20', 'cash_app' => 'Cash App', 'paypal' => 'PayPal', 'zelle' => 'Zelle', 'bnb' => 'BNB Smart Chain (BEP20)', 'bch' => 'Bitcoin Cash BCH', 'ltc' => 'Litecoin LTC', 'xrp' => 'Ripple XRP'] as $field => $label)
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="{{ $field }}">{{ $label }}</label>
                                                            <input type="text" class="form-control" name="{{ $field }}"
                                                                id="{{ $field }}" value="{{ $admin_wallets->$field }}"
                                                                placeholder="Enter address or payment tag">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex justify-content-end gap-2">
                                            <button type="reset" class="btn btn-light">Undo</button>
                                            <button class="btn btn-primary please-wait-btn" type="submit">
                                                <i class="fe fe-save"></i> Update wallets
                                            </button>
                                        </div>
                                    </form>
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
