<!doctype html>
<html lang="en" dir="ltr">

<head>

    @include('includes.admin-head')
    <style>
        .big-toggle {
            transform: scale(2.5);
            /* margin: 0 10px; */
        }

        .form-check-input.big-toggle {
            transform: scale(2);
            /* margin-right: 15px; */
        }

        .form-check-input.big-toggle:checked {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
    </style>

</head>

<body class="app sidebar-mini ltr light-mode">

    <!-- GLOBAL-LOADER -->
    @include('includes.loader')
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- APP-NAv -->
            @include('includes.admin-nav')
            <!-- <div class="app-header header sticky"> -->
            <!-- /APP-NAv -->

            <!--APP-SIDEBAR-->
            @include('includes.admin-sidebar')
            <!--/APP-SIDEBAR-->

            <!-- APP-CONTENT OPEN -->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">
                        @include('includes.flash-alerts')

                        <div class="rg-page-head">
                            <div>
                                <span class="rg-eyebrow"><i class="fe fe-user-check"></i> Customer profile</span>
                                <h1>{{ $user_data->first_name }} {{ $user_data->last_name }}</h1>
                                <p>{{ $user_data->email }} · Account overview and management</p>
                            </div>
                            <div class="rg-page-actions">
                                <span class="rg-chip rg-chip--primary"><i class="fe fe-id"></i> {{ $user_data->account_status }}</span>
                                <a href="{{ route('admin_dashboard') }}" class="btn btn-light">
                                    <i class="fe fe-arrow-left"></i> All customers
                                </a>
                            </div>
                        </div>

                        <div class="rg-stat-grid">
                            <div class="rg-stat">
                                <div class="rg-stat__top">
                                    <span class="rg-stat__label">Main balance</span>
                                    <span class="rg-stat__icon rg-stat__icon--primary"><i class="fe fe-wallet"></i></span>
                                </div>
                                <div class="rg-stat__value">${{ number_format((float) $user_data->balance, 2) }}</div>
                            </div>
                            <div class="rg-stat">
                                <div class="rg-stat__top">
                                    <span class="rg-stat__label">Earnings balance</span>
                                    <span class="rg-stat__icon rg-stat__icon--success"><i class="fe fe-trending-up"></i></span>
                                </div>
                                <div class="rg-stat__value">${{ number_format((float) $user_data->earnings_balance, 2) }}</div>
                            </div>
                            <div class="rg-stat">
                                <div class="rg-stat__top">
                                    <span class="rg-stat__label">Subscription balance</span>
                                    <span class="rg-stat__icon rg-stat__icon--warning"><i class="fe fe-layers"></i></span>
                                </div>
                                <div class="rg-stat__value">${{ number_format((float) $user_data->sub_balance, 2) }}</div>
                            </div>
                            <div class="rg-stat">
                                <div class="rg-stat__top">
                                    <span class="rg-stat__label">Total withdrawn</span>
                                    <span class="rg-stat__icon rg-stat__icon--info"><i class="fe fe-arrow-up-right"></i></span>
                                </div>
                                <div class="rg-stat__value">${{ number_format((float) $total_withdrawn, 2) }}</div>
                            </div>
                            <div class="rg-stat">
                                <div class="rg-stat__top">
                                    <span class="rg-stat__label">Account status</span>
                                    <span class="rg-stat__icon rg-stat__icon--primary"><i class="fe fe-shield"></i></span>
                                </div>
                                <div class="rg-stat__value rg-stat__value--sm">{{ $user_data->account_status }}</div>
                            </div>
                        </div>

                        <!-- ROW START account edit-->
                        <livewire:admin.edit-user-account :user_data="$user_data" :status_plans="$status_plans" />
                        <!-- ROW END account edit-->

                        <livewire:admin.trade-progress :user_data="$user_data" />

                        <!-- ROW -->
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Manage Transactions </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="data-table" class="table table-bordered text-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <td class="wd-15p border-bottom-0">#</td>
                                                        <td class="wd-15p border-bottom-0">Category</td>
                                                        <td class="wd-15p border-bottom-0">Date</td>
                                                        <td class="wd-15p border-bottom-0">Amount</td>
                                                        <td class="wd-15p border-bottom-0">Asset</td>
                                                        <td class="wd-15p border-bottom-0">Customer Wallet Address</td>
                                                        <td class="wd-15p border-bottom-0">Proof IMG <i
                                                                class="fas fa-eye"></i></td>
                                                        <td class="wd-15p border-bottom-0">Status</td>
                                                        <td class="wd-15p border-bottom-0">Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($transactions as $counter => $transaction)
                                                    <tr>
                                                        <td>{{ $counter + 1 }}</td>
                                                        @if ($transaction->transaction_category == 3)
                                                        <td class="text-success fs-15 fw-semibold">
                                                            {{
                                                            config('app.transaction_category')[$transaction->transaction_category]
                                                            }}
                                                        </td>
                                                        @elseif ($transaction->transaction_category == 2)
                                                        <td class="text-danger fs-15 fw-semibold">
                                                            {{
                                                            config('app.transaction_category')[$transaction->transaction_category]
                                                            }}
                                                        </td>
                                                        @else
                                                        <td class="text-success fs-15 fw-semibold">
                                                            {{
                                                            config('app.transaction_category')[$transaction->transaction_category]
                                                            }}
                                                        </td>
                                                        @endif
                                                        <td>{{ date('Y/M/d h:i a', strtotime($transaction->created_at))
                                                            }}
                                                        </td>
                                                        <td>${{ number_format($transaction->transaction_amount, 2) }}
                                                        </td>
                                                        <td>{{ $transaction->transaction_asset }}</td>
                                                        <td style="overflow-x: auto;max-width: 200px;">
                                                            @if (!$transaction->transaction_ewallet_address)
                                                            Sent Admin's wallet address
                                                            @else
                                                            {{ $transaction->transaction_ewallet_address }}
                                                            @endif

                                                        </td>
                                                        <td>
                                                            @if (!$transaction->transaction_proof)
                                                            No image for withdrawal
                                                            @else
                                                            <a href="{{ asset('storage/' . $transaction->transaction_proof) }}"
                                                                target="_blank" class="badge bg-info mx-2 rounded-pill">
                                                                View proof
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            @endif

                                                        </td>
                                                        @if ($transaction->transaction_status == 2)
                                                        <td class="text-success fs-15 fw-semibold">
                                                            {{
                                                            config('app.transaction_status')[$transaction->transaction_status]
                                                            }}
                                                        </td>
                                                        @elseif ($transaction->transaction_status == 3)
                                                        <td class="text-danger fs-15 fw-semibold">
                                                            {{
                                                            config('app.transaction_status')[$transaction->transaction_status]
                                                            }}
                                                        </td>
                                                        @else
                                                        <td class="text-info fs-15 fw-semibold">
                                                            {{
                                                            config('app.transaction_status')[$transaction->transaction_status]
                                                            }}
                                                        </td>
                                                        @endif
                                                        <td class="d-flex">
                                                            @if ($transaction->transaction_status == 1)
                                                            <form
                                                                action="{{ route('edit_user_post', [$user_data->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="action"
                                                                    value="approve_transaction">
                                                                <input type="hidden" name="id"
                                                                    value="{{ $transaction->transaction_id }}">
                                                                <button class="btn btn-info btn-sm mx-1 confirm "
                                                                    type="submit">
                                                                    <i class="fas fa-check"></i>
                                                                    Approve
                                                                </button>
                                                            </form>
                                                            <form
                                                                action="{{ route('edit_user_post', [$user_data->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="action"
                                                                    value="decline_transaction">
                                                                <input type="hidden" name="id"
                                                                    value="{{ $transaction->transaction_id }}">
                                                                <button class="btn btn-danger btn-sm mx-1 confirm"
                                                                    type="submit">
                                                                    <i class="far fa-times-circle"></i>
                                                                    Decline
                                                                </button>
                                                            </form>
                                                            @else
                                                            <button class="btn btn-success btn-sm" type="submit"
                                                                disabled>Completed</button>
                                                            @endif

                                                        </td>
                                                    </tr>

                                                    @empty
                                                    @endforelse
                                                    <tr>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END ROW -->

                        <!-- ROW -->
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Manage Trades</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom w-100 "
                                                id="responsive-datatable">
                                                <thead>
                                                    <tr>
                                                        <td class="wd-15p border-bottom-0">#</td>
                                                        <td class="wd-15p border-bottom-0">Time</td>
                                                        <td class="wd-15p border-bottom-0">Trade By</td>
                                                        <td class="wd-15p border-bottom-0">Type</td>
                                                        <td class="wd-15p border-bottom-0">Asset</td>
                                                        <td class="wd-15p border-bottom-0">Cost</td>
                                                        <td class="wd-15p border-bottom-0">Duration</td>
                                                        <td class="wd-15p border-bottom-0">Profit/Loss</td>
                                                        <td class="wd-15p border-bottom-0">Status</td>
                                                        <td class="wd-15p border-bottom-0">Manage</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($trades as $counter => $trade)
                                                    <tr>
                                                        <td> {{ $counter + 1 }}</td>
                                                        <td>{{ date('Y/m/d h:i a', strtotime($trade->trade_time)) }}
                                                        </td>
                                                        <td>{{ $trade->trade_by }}</td>
                                                        <td>{{ $trade->trade_type }}</td>
                                                        <td>{{ $trade->trade_asset }}</td>
                                                        <td>${{ number_format($trade->trade_stake_amount, 2) }}
                                                        </td>
                                                        <td>{{ $trade->trade_duration }}</td>
                                                        @if ($trade->trade_status == 3)
                                                        <td class="text-success fs-15 fw-semibold">
                                                            + ${{ $trade->trade_profit_loss_amount }}
                                                        </td>
                                                        @elseif ($trade->trade_status == 2)
                                                        <td class="text-danger fs-15 fw-semibold">-
                                                            ${{ $trade->trade_profit_loss_amount }}</td>
                                                        @else
                                                        <td class="text-info fs-15 fw-semibold">
                                                            --/--
                                                        </td>
                                                        @endif

                                                        @if ($trade->trade_status == 3)
                                                        <td class="text-success fs-15 fw-semibold">
                                                            {{ config('app.trade_status')[$trade->trade_status] }}
                                                        </td>
                                                        @elseif ($trade->trade_status == 2)
                                                        <td class="text-danger fs-15 fw-semibold">
                                                            {{ config('app.trade_status')[$trade->trade_status] }}
                                                        </td>
                                                        @else
                                                        <td class="text-info fs-15 fw-semibold">
                                                            {{ config('app.trade_status')[$trade->trade_status] }}
                                                        </td>
                                                        @endif
                                                        <td>
                                                            <a class="btn btn-primary btn-sm rounded-11 me-2"
                                                                href="{{ route('edit_trade', [$user_data->id, $trade->id]) }}">
                                                                <i class="far fa-edit"></i>
                                                                manage
                                                            </a>
                                                        </td>

                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END ROW -->

                        <!-- ROW -->
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Manage all Plans Purchases</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom w-100 "
                                                id="responsive-datatable">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">#</th>
                                                        <th class="wd-10p border-bottom-0">Date</th>
                                                        <th class="wd-15p border-bottom-0">plan</th>
                                                        <th class="wd-20p border-bottom-0">Amount</th>
                                                        <th class="wd-15p border-bottom-0">Duration</th>
                                                        <th class="wd-15p border-bottom-0">ROI & Signal Strength</th>
                                                        <th class="wd-15p border-bottom-0">status</th>
                                                        <th class="wd-10p border-bottom-0">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($plans_transactions as $counter => $plans_transaction)
                                                    <tr>
                                                        <td>{{ $counter + 1 }}</td>
                                                        <td>{{ date('Y-M-d h:i a',
                                                            strtotime($plans_transaction->created_at)) }}
                                                        </td>
                                                        <td>{{ $plans_transaction->plan_name }}</td>
                                                        <td>${{ number_format($plans_transaction->plan_amount, 2) }}
                                                        </td>
                                                        <td>{{ $plans_transaction->plan_duration }}</td>
                                                        <td>
                                                            @if ($plans_transaction->plan_ROI)
                                                            {{ $plans_transaction->plan_ROI }}%
                                                            @elseif($plans_transaction->plan_signal_strength)
                                                            {{ $plans_transaction->plan_signal_strength }}%
                                                            @else
                                                            No data
                                                            @endif

                                                        </td>
                                                        <td>
                                                            @if ($plans_transaction->plan_transaction_status == 1)
                                                            <span class="text-primary fs-15 fw-semibold">
                                                                {{
                                                                config('app.plan_transaction_status')[$plans_transaction->plan_transaction_status]
                                                                }}
                                                            </span>
                                                            @else
                                                            <span class="text-success fs-15 fw-semibold">
                                                                {{
                                                                config('app.plan_transaction_status')[$plans_transaction->plan_transaction_status]
                                                                }}
                                                            </span>
                                                            @endif
                                                        </td>
                                                        <td class="d-flex">
                                                            @if ($plans_transaction->plan_transaction_status == 1)
                                                            <form
                                                                action="{{ route('edit_user_post', [$user_data->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="action"
                                                                    value="complete_transaction">
                                                                <input type="hidden" name="id"
                                                                    value="{{ $plans_transaction->id }}">
                                                                <button class="btn btn-info btn-sm mx-1 confirm "
                                                                    type="submit">
                                                                    <i class="fas fa-check"></i>
                                                                    Complete
                                                                </button>
                                                            </form>
                                                            <form
                                                                action="{{ route('edit_user_post', [$user_data->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="action"
                                                                    value="delete_transaction">
                                                                <input type="hidden" name="id"
                                                                    value="{{ $plans_transaction->id }}">
                                                                <button class="btn btn-danger btn-sm mx-1 confirm"
                                                                    type="submit">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                    Delete
                                                                </button>
                                                            </form>
                                                            @else
                                                            <button class="btn btn-success btn-sm" type="submit"
                                                                disabled>Completed</button>
                                                            @endif

                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END ROW -->

                        <!-- ROW -->
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Manage KYC</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom w-100 "
                                                id="responsive-datatable">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">#</th>
                                                        <th class="wd-15p border-bottom-0">Date</th>
                                                        <th class="wd-20p border-bottom-0">Document Type</th>
                                                        <th class="wd-15p border-bottom-0">Staus</th>
                                                        <th class="wd-15p border-bottom-0">Documnet IMG</th>
                                                        <th class="wd-15p border-bottom-0">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($kyc as $counter => $kyc)
                                                    <tr>
                                                        <td>{{ $counter + 1 }}</td>
                                                        <td>{{ date('Y/M/d h:i a', strtotime($kyc->created_at)) }}
                                                        </td>
                                                        <td>{{ $kyc->kyc_document }}</td>
                                                        @if ($kyc->kyc_status == 2)
                                                        <td class="text-success fs-15 fw-semibold">
                                                            {{ config('app.kyc_status')[$kyc->kyc_status] }}
                                                        </td>
                                                        @elseif ($kyc->kyc_status == 3)
                                                        <td class="text-danger fs-15 fw-semibold">
                                                            {{ config('app.kyc_status')[$kyc->kyc_status] }}
                                                        </td>
                                                        @else
                                                        <td class="text-info fs-15 fw-semibold">
                                                            {{ config('app.kyc_status')[$kyc->kyc_status] }}
                                                        </td>
                                                        @endif
                                                        <td>
                                                            <a href="{{ asset('storage/' . $kyc->kyc_proof_front) }}"
                                                                target="_blank" class="badge bg-info mx-2 rounded-pill">
                                                                front
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="{{ asset('storage/' . $kyc->kyc_proof_back) }}"
                                                                target="_blank" class="badge bg-info mx-2 rounded-pill">
                                                                back
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                @if ($kyc->kyc_status == 1)
                                                                <form
                                                                    action="{{ route('edit_user_post', [$user_data->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="action"
                                                                        value="approve_kyc">
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $kyc->kyc_id }}">
                                                                    <button class="btn btn-info btn-sm mx-1 confirm "
                                                                        type="submit">
                                                                        <i class="fas fa-check"></i>
                                                                        Approve
                                                                    </button>
                                                                </form>
                                                                <form
                                                                    action="{{ route('edit_user_post', [$user_data->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="action"
                                                                        value="decline_kyc">
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $kyc->kyc_id }}">
                                                                    <button class="btn btn-danger btn-sm mx-1 confirm"
                                                                        type="submit">
                                                                        <i class="far fa-times-circle"></i>
                                                                        Decline
                                                                    </button>
                                                                </form>
                                                                @else
                                                                <button class="btn btn-success btn-sm" type="submit"
                                                                    disabled>Completed</button>
                                                                @endif
                                                            </div>


                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END ROW -->

                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
            <!-- APP-CONTENT END -->
        </div>

        <!-- FOOTER -->
        @include('includes.admin-footer')
        <!-- FOOTER END -->

    </div>
    <!-- CONTAINER END -->

    @include('includes.admin-script')

</body>

</html>