<x-user.layout title="Subscription Deposit">

    <x-user.page-head
        eyebrow="<i class='fe fe-repeat'></i> Funding"
        title="Subscription deposit"
        subtitle="Fund your subscription wallet for AI plans, signal plans, and status upgrades.">
        <x-slot:actions>
            <a href="{{ route('user_deposit') }}" class="btn btn-light">
                <i class="fe fe-wallet"></i> Trading deposit
            </a>
        </x-slot:actions>
    </x-user.page-head>

    <livewire:user.sub-deposit />

</x-user.layout>
