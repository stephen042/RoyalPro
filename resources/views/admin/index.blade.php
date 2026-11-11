<!doctype html>
<html lang="en" dir="ltr">

<head>

    @include('includes.admin-head')

</head>

<body class="app sidebar-mini ltr light-mode">

    @include('includes.loader')

    <div class="page">
        <div class="page-main">

            @include('includes.admin-nav')
            @include('includes.admin-sidebar')

            <div class="main-content app-content mt-0">
                <div class="side-app">
                    <div class="main-container container-fluid">

                        @include('includes.flash-alerts')

                        <div class="rg-page-head">
                            <div>
                                <span class="rg-eyebrow"><i class="fe fe-command"></i> Operations</span>
                                <h1>Welcome back, {{ auth()->user()->first_name }}</h1>
                                <p>A consolidated view of customer accounts, platform balances, and withdrawal activity.</p>
                            </div>
                            <div class="rg-page-actions">
                                <span class="rg-chip rg-chip--success">
                                    <span class="rg-status-dot"></span> Platform live
                                </span>
                                <a href="{{ route('user_dashboard') }}" class="btn btn-secondary">
                                    <i class="fe fe-external-link"></i> Client view
                                </a>
                            </div>
                        </div>

                        <div class="rg-stat-grid">
                            <div class="rg-stat">
                                <div class="rg-stat__top">
                                    <span class="rg-stat__label">All customers</span>
                                    <span class="rg-stat__icon rg-stat__icon--primary"><i class="fe fe-users"></i></span>
                                </div>
                                <div class="rg-stat__value">{{ number_format((float) $total_users) }}</div>
                                <div class="rg-stat__meta"><i class="fe fe-user-check"></i> Active accounts</div>
                            </div>

                            <div class="rg-stat">
                                <div class="rg-stat__top">
                                    <span class="rg-stat__label">Total balance</span>
                                    <span class="rg-stat__icon rg-stat__icon--success"><i class="fe fe-dollar-sign"></i></span>
                                </div>
                                <div class="rg-stat__value">${{ number_format((float) $total_balance, 2) }}</div>
                                <div class="rg-stat__meta"><i class="fe fe-wallet"></i> Customer funds</div>
                            </div>

                            <div class="rg-stat">
                                <div class="rg-stat__top">
                                    <span class="rg-stat__label">Subscription balance</span>
                                    <span class="rg-stat__icon rg-stat__icon--warning"><i class="fe fe-layers"></i></span>
                                </div>
                                <div class="rg-stat__value">${{ number_format((float) $total_sub_balance, 2) }}</div>
                                <div class="rg-stat__meta"><i class="fe fe-shopping-bag"></i> Plan allocations</div>
                            </div>

                            <div class="rg-stat">
                                <div class="rg-stat__top">
                                    <span class="rg-stat__label">Total withdrawn</span>
                                    <span class="rg-stat__icon rg-stat__icon--danger"><i class="fe fe-arrow-up-right"></i></span>
                                </div>
                                <div class="rg-stat__value">${{ number_format((float) $total_withdrawal, 2) }}</div>
                                <div class="rg-stat__meta"><i class="fe fe-shield"></i> Completed payouts</div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="card-title">Customer accounts</h2>
                                    <p class="rg-panel__sub mb-0">Review balances, open AI trading, or manage an account.</p>
                                </div>
                                <span class="rg-chip rg-chip--neutral">{{ number_format((float) $total_users) }} total</span>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table id="basic-datatable" class="table table-hover align-middle w-100">
                                        <thead>
                                            <tr>
                                                <th class="w-5">#</th>
                                                <th>Customer</th>
                                                <th>Country</th>
                                                <th>Registered</th>
                                                <th>Balance</th>
                                                <th>Subscription</th>
                                                <th>AI trade</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users_data as $counter => $user)
                                                <livewire:admin.all-users wire:key="{{ $user->id }}" :user="$user" :counter="$counter + 1" />
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @include('includes.admin-footer')
    </div>

    @include('includes.admin-script')

</body>

</html>
