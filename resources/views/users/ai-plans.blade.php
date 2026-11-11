<x-user.layout title="AI Plans">

    <x-user.page-head
        eyebrow="<i class='fe fe-cpu'></i> Products"
        title="AI plans"
        subtitle="Choose an automated strategy to trade on your behalf.">
        <x-slot:actions>
            <span class="rx-chip rx-chip--accent">
                <i class="fe fe-wallet"></i> ${{ number_format((float) $user_data->sub_balance, 2) }} available
            </span>
            <a href="{{ route('user_sub_deposit') }}" class="btn btn-primary">
                <i class="fe fe-plus"></i> Add subscription funds
            </a>
        </x-slot:actions>
    </x-user.page-head>

    <div class="card mb-4">
        <div class="card-header">
            <div>
                <h2 class="card-title">Available strategies</h2>
                <p class="card-subtitle">Purchases are deducted from your subscription balance.</p>
            </div>
        </div>
        <livewire:user.ai-plans />
    </div>

    <div class="card">
        <div class="card-header">
            <div>
                <h2 class="card-title">Purchase history</h2>
                <p class="card-subtitle">Your previous AI plan purchases.</p>
            </div>
            <span class="rx-chip rx-chip--neutral">{{ $plans_transactions->count() }} records</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle w-100" id="responsive-datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Plan</th>
                            <th>Amount</th>
                            <th>Duration</th>
                            <th>ROI</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($plans_transactions as $count => $plans_transaction)
                            <tr>
                                <td class="rx-muted">{{ $count + 1 }}</td>
                                <td>{{ $plans_transaction->plan_name }}</td>
                                <td><span class="rx-table-amount">${{ number_format((float) $plans_transaction->plan_amount, 2) }}</span></td>
                                <td>{{ $plans_transaction->plan_duration }}</td>
                                <td>{{ $plans_transaction->plan_ROI }}%</td>
                                <td>
                                    @if ($plans_transaction->plan_transaction_status == 1)
                                        <span class="rx-badge rx-badge--warning">{{ config('app.plan_transaction_status')[$plans_transaction->plan_transaction_status] }}</span>
                                    @else
                                        <span class="rx-badge rx-badge--success">{{ config('app.plan_transaction_status')[$plans_transaction->plan_transaction_status] }}</span>
                                    @endif
                                </td>
                                <td>{{ date('M d, Y · h:i A', strtotime($plans_transaction->created_at)) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="rx-empty">
                                        <div class="rx-empty__icon"><i class="fe fe-shopping-bag"></i></div>
                                        <h3 class="rx-empty__title">No AI plans purchased</h3>
                                        <p class="rx-empty__text">Your AI plan purchases will appear here.</p>
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
