<x-user.layout title="Security Settings">

    <x-user.page-head
        eyebrow="<i class='fe fe-shield'></i> Account"
        title="Security settings"
        subtitle="Verify your identity to unlock the full features of your account.">
        <x-slot:actions>
            <span class="rx-chip rx-chip--neutral"><i class="fe fe-lock"></i> KYC verification</span>
        </x-slot:actions>
    </x-user.page-head>

    <div class="row g-4">
        <div class="col-xl-10 col-md-12 col-sm-12">
            <livewire:user.security-settings />
        </div>
    </div>

</x-user.layout>
