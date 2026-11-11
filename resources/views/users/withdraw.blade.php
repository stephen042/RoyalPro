<x-user.layout title="Withdrawal">

    <x-user.page-head
        eyebrow="<i class='fe fe-arrow-up-circle'></i> Funding"
        title="Withdraw earnings"
        subtitle="Request a payout to your wallet. Available earnings and network fees are confirmed before submission.">
        <x-slot:actions>
            <a href="{{ route('user_withdraw_history') }}" class="btn btn-light">
                <i class="fe fe-clock"></i> Withdrawal history
            </a>
        </x-slot:actions>
    </x-user.page-head>

    <div class="rx-row">
        <div class="rx-col-8">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="card-title">Withdrawal request</h2>
                        <p class="card-subtitle">Enter the amount and the destination wallet address.</p>
                    </div>
                    <span class="rx-chip rx-chip--accent"><i class="fe fe-shield"></i> Secure payout</span>
                </div>
                <div class="card-body">
                    <livewire:user.withdrawal />
                </div>
            </div>
        </div>

        <div class="rx-col-4">
            <div class="rx-panel">
                <div class="rx-panel__head">
                    <div>
                        <h2 class="rx-panel__title">Before you withdraw</h2>
                        <p class="rx-panel__sub">A few things to keep in mind</p>
                    </div>
                    <span class="rx-stat__icon rx-stat__icon--accent"><i class="fe fe-info"></i></span>
                </div>
                <div class="rx-panel__body">
                    <ul class="rx-list">
                        <li class="rx-list__item">
                            <span class="rx-list__label">Source wallet</span>
                            <span class="rx-list__value">Earnings</span>
                        </li>
                        <li class="rx-list__item">
                            <span class="rx-list__label">Processing</span>
                            <span class="rx-list__value">After review</span>
                        </li>
                        <li class="rx-list__item">
                            <span class="rx-list__label">Network fee</span>
                            <span class="rx-list__value">May apply</span>
                        </li>
                    </ul>
                    <p class="rx-help mt-3 mb-0">
                        Payouts are sent to the wallet address you provide. Double-check the address and network
                        before submitting — crypto transfers cannot be reversed.
                    </p>
                </div>
            </div>
        </div>
    </div>

</x-user.layout>
