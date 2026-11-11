<x-user.layout title="Crypto Wallets">

    @php
        $wallets = [
            ['name' => 'Solana', 'ticker' => 'SOL', 'image' => 'solana.jpg', 'balance' => $crypto_accounts->solana_balance ?? 0],
            ['name' => 'Ethereum', 'ticker' => 'ETH', 'image' => 'ethereum.png', 'balance' => $crypto_accounts->ethereum_balance ?? 0],
            ['name' => 'Tether', 'ticker' => 'USDT', 'image' => 'tether-usdt.jpg', 'balance' => $crypto_accounts->usdt_balance ?? 0],
            ['name' => 'Bitcoin', 'ticker' => 'BTC', 'image' => 'bitcoin.jpg', 'balance' => $crypto_accounts->bitcoin_balance ?? 0],
            ['name' => 'Polygon', 'ticker' => 'POL', 'image' => 'polygon.png', 'balance' => $crypto_accounts->polygon_balance ?? 0],
            ['name' => 'Ripple', 'ticker' => 'XRP', 'image' => 'xrp-logo.png', 'balance' => $crypto_accounts->ripple_balance ?? 0],
        ];
    @endphp

    <x-user.page-head
        eyebrow="<i class='fe fe-grid'></i> Wallets"
        title="Crypto wallets"
        subtitle="View your available balances across supported digital assets.">
        <x-slot:actions>
            <a href="{{ route('user_deposit') }}" class="btn btn-primary">
                <i class="fe fe-plus"></i> Add funds
            </a>
        </x-slot:actions>
    </x-user.page-head>

    <div class="card">
        <div class="card-header">
            <div>
                <h2 class="card-title">Asset balances</h2>
                <p class="card-subtitle">Balances are displayed in your account currency.</p>
            </div>
            <span class="rx-chip rx-chip--neutral"><i class="fe fe-shield"></i> Secured</span>
        </div>
        <div class="card-body">
            <div class="rx-wallet-grid">
                @foreach ($wallets as $wallet)
                    <div class="rx-wallet">
                        <img src="{{ asset('assets/images/crypto/' . $wallet['image']) }}"
                            alt="{{ $wallet['name'] }}" class="rx-wallet__icon">
                        <div class="rx-wallet__meta">
                            <strong>{{ $wallet['name'] }}</strong>
                            <small>{{ $wallet['ticker'] }}</small>
                        </div>
                        <div class="rx-wallet__balance">${{ number_format((float) $wallet['balance'], 2) }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-user.layout>
