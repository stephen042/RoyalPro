<x-user.layout title="Staking">

    <x-user.page-head
        eyebrow="<i class='fe fe-lock'></i> Earn"
        title="Stock staking"
        subtitle="Put your balance to work by staking supported digital assets.">
        <x-slot:actions>
            <span class="rx-chip rx-chip--accent">
                <i class="fe fe-wallet"></i> ${{ number_format((float) $user_data->balance, 2) }} available
            </span>
            <a href="{{ route('user_deposit') }}" class="btn btn-primary">
                <i class="fe fe-plus"></i> Add funds
            </a>
        </x-slot:actions>
    </x-user.page-head>

    @php
        $stake_assets = [
            ['name' => 'Bitcoin', 'ticker' => 'BTC', 'image' => 'BTC.svg'],
            ['name' => 'Avalanche', 'ticker' => 'AVAX', 'image' => 'AVAX.svg'],
            ['name' => 'Tether', 'ticker' => 'USDT', 'image' => 'USDT.svg'],
            ['name' => 'Ethereum', 'ticker' => 'ETH', 'image' => 'ETH.svg'],
            ['name' => 'Polygon', 'ticker' => 'MATIC', 'image' => 'MATIC.svg'],
            ['name' => 'Solana', 'ticker' => 'SOL', 'image' => 'SOL.svg'],
        ];
    @endphp

    <div class="card mb-4">
        <div class="card-header">
            <div>
                <h2 class="card-title">Choose an asset</h2>
                <p class="card-subtitle">Select an asset to open the staking form.</p>
            </div>
        </div>
        <div class="card-body">
            <div class="row g-3">
                @foreach ($stake_assets as $asset)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <a href="#modaldemostake{{ $asset['ticker'] }}"
                            class="rx-stake-card modal-effect" data-bs-effect="effect-flip-horizontal"
                            data-bs-toggle="modal">
                            <img src="{{ URL('assets/images/stake/' . $asset['image']) }}"
                                alt="{{ $asset['name'] }}" class="rx-stake-card__icon">
                            <span class="rx-stake-card__meta">
                                <strong>{{ $asset['name'] }}</strong>
                                <small>{{ $asset['ticker'] }}</small>
                            </span>
                            <span class="rx-stake-card__cta">Stake <i class="fe fe-arrow-up-right"></i></span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div>
                <h2 class="card-title">Staking history</h2>
                <p class="card-subtitle">Track your active and completed stakes.</p>
            </div>
            <span class="rx-chip rx-chip--neutral">{{ $stakes->count() }} records</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle w-100" id="responsive-datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Asset</th>
                            <th>Amount</th>
                            <th>Duration</th>
                            <th>Profit / loss</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($stakes as $counter => $stake)
                            <tr>
                                <td class="rx-muted">{{ $counter + 1 }}</td>
                                <td>{{ $stake->stock_stakes_asset }}</td>
                                <td><span class="rx-table-amount">${{ number_format((float) $stake->stock_stakes_amount, 2) }}</span></td>
                                <td>{{ $stake->stock_stakes_duration }}</td>
                                <td>
                                    @if ($stake->stock_stakes_status == 3)
                                        <span class="rx-badge rx-badge--success">+ ${{ number_format((float) $stake->stock_stakes_profit_loss_amount, 2) }}</span>
                                    @elseif ($stake->stock_stakes_status == 2)
                                        <span class="rx-badge rx-badge--danger">- ${{ number_format((float) $stake->stock_stakes_profit_loss_amount, 2) }}</span>
                                    @else
                                        <span class="rx-badge rx-badge--neutral">--/--</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($stake->stock_stakes_status == 3)
                                        <span class="rx-badge rx-badge--success">{{ config('app.stock_stakes_status')[$stake->stock_stakes_status] }}</span>
                                    @elseif ($stake->stock_stakes_status == 2)
                                        <span class="rx-badge rx-badge--danger">{{ config('app.stock_stakes_status')[$stake->stock_stakes_status] }}</span>
                                    @else
                                        <span class="rx-badge rx-badge--neutral">{{ config('app.stock_stakes_status')[$stake->stock_stakes_status] }}</span>
                                    @endif
                                </td>
                                <td>{{ date('M d, Y · h:i A', strtotime($stake->created_at)) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="rx-empty">
                                        <div class="rx-empty__icon"><i class="fe fe-layers"></i></div>
                                        <h3 class="rx-empty__title">No stakes yet</h3>
                                        <p class="rx-empty__text">Choose an asset above to create your first stake.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <livewire:user.stake />

</x-user.layout>
