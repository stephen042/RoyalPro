<x-user.layout title="Deposit History">

    <x-user.page-head
        eyebrow="<i class='fe fe-clock'></i> Activity"
        title="Deposit history"
        subtitle="A complete record of funding transactions on your account.">
        <x-slot:actions>
            <a href="{{ route('user_deposit') }}" class="btn btn-primary">
                <i class="fe fe-plus"></i> Add funds
            </a>
        </x-slot:actions>
    </x-user.page-head>

    <div class="card">
        <div class="card-header">
            <div>
                <h2 class="card-title">All deposits</h2>
                <p class="card-subtitle">Funding activity across all supported assets.</p>
            </div>
            <span class="rx-chip rx-chip--neutral">{{ $deposits->count() }} records</span>
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
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($deposits as $count => $deposit)
                            <tr>
                                <td class="rx-muted">{{ $count + 1 }}</td>
                                <td>{{ date('M d, Y · h:i A', strtotime($deposit->created_at)) }}</td>
                                <td><span class="rx-table-amount">${{ number_format((float) $deposit->transaction_amount, 2) }}</span></td>
                                <td><span class="rx-badge rx-badge--neutral">{{ $deposit->transaction_asset }}</span></td>
                                <td>
                                    @if ($deposit->transaction_status == 2)
                                        <span class="rx-badge rx-badge--success">{{ config('app.transaction_status')[$deposit->transaction_status] }}</span>
                                    @elseif ($deposit->transaction_status == 3)
                                        <span class="rx-badge rx-badge--danger">{{ config('app.transaction_status')[$deposit->transaction_status] }}</span>
                                    @else
                                        <span class="rx-badge rx-badge--warning">{{ config('app.transaction_status')[$deposit->transaction_status] }}</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="rx-empty">
                                        <div class="rx-empty__icon"><i class="fe fe-inbox"></i></div>
                                        <h3 class="rx-empty__title">No deposits yet</h3>
                                        <p class="rx-empty__text">Your funding transactions will appear here after your first deposit.</p>
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
