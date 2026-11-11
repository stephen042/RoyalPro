<x-user.layout title="Deposit">

    <x-user.page-head
        eyebrow="<i class='fe fe-arrow-down-circle'></i> Funding"
        title="Deposit funds"
        subtitle="Choose a payment method, complete the transfer, and upload your payment proof.">
        <x-slot:actions>
            <a href="{{ route('user_deposit_history') }}" class="btn btn-light">
                <i class="fe fe-clock"></i> Deposit history
            </a>
        </x-slot:actions>
    </x-user.page-head>

    <livewire:user.deposit />

</x-user.layout>
