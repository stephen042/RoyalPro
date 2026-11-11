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
                                <span class="rg-eyebrow"><i class="fe fe-award"></i> Products</span>
                                <h1>Status plans</h1>
                                <p>Create and manage account upgrade plans.</p>
                            </div>
                            <div class="rg-page-actions">
                                <span class="rg-chip rg-chip--neutral"><i class="fe fe-layers"></i> {{ $status_plans->count() }} plans</span>
                            </div>
                        </div>

                        <livewire:admin.create-status-plan />

                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="card-title">All status plans</h2>
                                    <p class="rg-panel__sub mb-0">Plans currently available to users.</p>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle w-100" id="responsive-datatable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Plan name</th>
                                                <th>Amount</th>
                                                <th>Duration</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($status_plans as $counter => $plan)
                                                <tr>
                                                    <td class="rg-muted">{{ $counter + 1 }}</td>
                                                    <td class="fw-semibold">{{ $plan->name }}</td>
                                                    <td><span class="rg-table-amount">${{ number_format((float) $plan->amount, 2) }}</span></td>
                                                    <td>{{ $plan->duration }}</td>
                                                    <td class="text-end">
                                                        <form action="{{ route('delete_status_plan', [$plan->id]) }}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $plan->id }}">
                                                            <button type="submit" class="btn btn-light btn-sm confirm">
                                                                <i class="fe fe-trash-2"></i> Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5">
                                                        <div class="rg-empty">
                                                            <div class="rg-empty__icon"><i class="fe fe-award"></i></div>
                                                            <h3 class="rg-empty__title">No status plans yet</h3>
                                                            <p class="rg-empty__text">Create your first plan using the form above.</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
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
