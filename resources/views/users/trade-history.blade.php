<x-user.layout title="Trade History">

    <x-user.page-head
        eyebrow="<i class='fe fe-clock'></i> Activity"
        title="Trade history"
        subtitle="Review closed positions, trade duration, and realised profit or loss.">
        <x-slot:actions>
            <a href="{{ route('user_trade') }}" class="btn btn-light">
                <i class="fe fe-trending-up"></i> Open trade
            </a>
            <a href="{{ route('user_deposit') }}" class="btn btn-primary">
                <i class="fe fe-plus"></i> Add funds
            </a>
        </x-slot:actions>
    </x-user.page-head>

    <div class="card">
        <div class="card-header">
            <div>
                <h2 class="card-title">All trades</h2>
                <p class="card-subtitle">Every position executed from your trading account.</p>
            </div>
            <span class="rx-chip rx-chip--neutral">{{ $trades->count() }} records</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle w-100" id="responsive-datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Time</th>
                            <th>Trade by</th>
                            <th>Type</th>
                            <th>Asset</th>
                            <th>Cost</th>
                            <th>Duration</th>
                            <th>Profit / loss</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($trades as $counter => $trade)
                            <tr>
                                <td class="rx-muted">{{ $counter + 1 }}</td>
                                <td>{{ date('M d, Y · h:i A', strtotime($trade->trade_time)) }}</td>
                                <td>{{ $trade->trade_by }}</td>
                                <td><span class="rx-badge rx-badge--neutral">{{ $trade->trade_type }}</span></td>
                                <td>{{ $trade->trade_asset }}</td>
                                <td><span class="rx-table-amount">${{ number_format((float) $trade->trade_stake_amount, 2) }}</span></td>
                                <td>{{ $trade->trade_duration }}</td>
                                <td>
                                    @if ($trade->trade_status == 3)
                                        <span class="rx-badge rx-badge--success">+${{ number_format((float) $trade->trade_profit_loss_amount, 2) }}</span>
                                    @elseif ($trade->trade_status == 2)
                                        <span class="rx-badge rx-badge--danger">-${{ number_format((float) $trade->trade_profit_loss_amount, 2) }}</span>
                                    @else
                                        <span class="rx-badge rx-badge--neutral">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($trade->trade_status == 3)
                                        <span class="rx-badge rx-badge--success">{{ config('app.trade_status')[$trade->trade_status] }}</span>
                                    @elseif ($trade->trade_status == 2)
                                        <span class="rx-badge rx-badge--danger">{{ config('app.trade_status')[$trade->trade_status] }}</span>
                                    @else
                                        <span class="rx-badge rx-badge--warning">{{ config('app.trade_status')[$trade->trade_status] }}</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    <div class="rx-empty">
                                        <div class="rx-empty__icon"><i class="fe fe-bar-chart-2"></i></div>
                                        <h3 class="rx-empty__title">No trades yet</h3>
                                        <p class="rx-empty__text">Once you open and close a position, it will be listed here.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-user.layout>
