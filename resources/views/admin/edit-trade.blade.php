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
                                <span class="rg-eyebrow"><i class="fe fe-edit"></i> Trade management</span>
                                <h1>Manage trade</h1>
                                <p>Review and complete this position for {{ $user->first_name }}.</p>
                            </div>
                            <div class="rg-page-actions">
                                <a href="{{ route('edit_user', [$user->id]) }}" class="btn btn-light">
                                    <i class="fe fe-arrow-left"></i> Customer profile
                                </a>
                            </div>
                        </div>

                        <div class="row g-4">
                            <livewire:admin.edit-trade :trade="$trade" :user="$user" />
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
