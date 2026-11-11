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
                                <span class="rg-eyebrow"><i class="fe fe-user"></i> Account</span>
                                <h1>Profile settings</h1>
                                <p>Manage your administrator profile and login credentials.</p>
                            </div>
                            <div class="rg-page-actions">
                                <span class="rg-chip rg-chip--success"><i class="fe fe-shield"></i> Administrator</span>
                            </div>
                        </div>

                        <div class="row g-4">
                            <livewire:admin.profile-settings :user_data="$admin_data" />

                            <div class="col-xl-8 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div>
                                            <h2 class="card-title">Personal information</h2>
                                            <p class="rg-panel__sub mb-0">Keep your admin contact details up to date.</p>
                                        </div>
                                    </div>
                                    <form action="{{ route('profile_settings_update') }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label for="admin_first_name">First name</label>
                                                        <input type="text" class="form-control" id="admin_first_name"
                                                            required placeholder="First name" name="first_name"
                                                            value="{{ $admin_data->first_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label for="admin_last_name">Last name</label>
                                                        <input type="text" class="form-control" id="admin_last_name"
                                                            name="last_name" required placeholder="Last name"
                                                            value="{{ $admin_data->last_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_email">Email address</label>
                                                <input type="email" class="form-control" id="admin_email" name="email"
                                                    required placeholder="Email address" value="{{ $admin_data->email }}">
                                            </div>
                                            <div class="form-group mb-0">
                                                <label for="admin_phone">Contact number</label>
                                                <input type="number" class="form-control" id="admin_phone" name="phone"
                                                    required placeholder="Phone number" value="{{ $admin_data->phone }}">
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex justify-content-end gap-2">
                                            <button type="reset" class="btn btn-light">Undo</button>
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fe fe-check"></i> Save changes
                                            </button>
                                        </div>
                                    </form>
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
