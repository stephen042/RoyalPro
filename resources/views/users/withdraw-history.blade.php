<x-user.layout title="Withdrawal History">

    <x-user.page-head
        eyebrow="<i class='fe fe-clock'></i> Activity"
        title="Withdrawal history"
        subtitle="Track every payout request and its current processing status.">
        <x-slot:actions>
            <a href="{{ route('user_withdraw') }}" class="btn btn-primary">
                <i class="fe fe-arrow-up-circle"></i> Request withdrawal
            </a>
        </x-slot:actions>
    </x-user.page-head>

    <div class="card">
        <div class="card-header">
            <div>
                <h2 class="card-title">All withdrawals</h2>
                <p class="card-subtitle">Payout activity sent to your saved wallet addresses.</p>
            </div>
            <span class="rx-chip rx-chip--neutral">{{ $withdrawals->count() }} records</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle w-100" id="responsive-datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Asset</th>
                            <th>Wallet address</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($withdrawals as $count => $withdrawal)
                            <tr>
                                <td class="rx-muted">{{ $count + 1 }}</td>
                                <td>{{ date('M d, Y · h:i A', strtotime($withdrawal->created_at)) }}</td>
                                <td><span class="rx-table-amount">${{ number_format((float) $withdrawal->transaction_amount, 2) }}</span></td>
                                <td><span class="rx-badge rx-badge--neutral">{{ $withdrawal->transaction_asset }}</span></td>
                                <td>
                                    <span class="rx-mono" style="display:inline-block;max-width:220px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;vertical-align:middle;" title="{{ $withdrawal->transaction_ewallet_address }}">
                                        {{ $withdrawal->transaction_ewallet_address }}
                                    </span>
                                </td>
                                <td>
                                    @if ($withdrawal->transaction_status == 2)
                                        <span class="rx-badge rx-badge--success">{{ config('app.transaction_status')[$withdrawal->transaction_status] }}</span>
                                    @elseif ($withdrawal->transaction_status == 3)
                                        <span class="rx-badge rx-badge--danger">{{ config('app.transaction_status')[$withdrawal->transaction_status] }}</span>
                                    @else
                                        <span class="rx-badge rx-badge--warning">{{ config('app.transaction_status')[$withdrawal->transaction_status] }}</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="rx-empty">
                                        <div class="rx-empty__icon"><i class="fe fe-inbox"></i></div>
                                        <h3 class="rx-empty__title">No withdrawals yet</h3>
                                        <p class="rx-empty__text">Your payout requests and their status will appear here.</p>
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
