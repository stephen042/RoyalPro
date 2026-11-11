<x-user.layout title="Account Settings">

    <x-user.page-head
        eyebrow="<i class='fe fe-user'></i> Account"
        title="Account settings"
        subtitle="Manage your personal details, profile picture, and password.">
        <x-slot:actions>
            <span class="rx-chip rx-chip--success">
                <i class="fe fe-shield"></i> Secure profile
            </span>
        </x-slot:actions>
    </x-user.page-head>

    <div class="row g-4">
        <livewire:user.account-settings />

        <div class="col-xl-8 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="card-title">Personal information</h2>
                        <p class="card-subtitle">Keep your contact details up to date.</p>
                    </div>
                </div>
                <form action="{{ route('account_settings_update') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="first_name">First name</label>
                                    <input type="text" class="form-control" id="first_name"
                                        required placeholder="First name" name="first_name" value="{{ $user_data->first_name }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="last_name">Last name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        required placeholder="Last name" value="{{ $user_data->last_name }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required
                                placeholder="Email address" value="{{ $user_data->email }}">
                        </div>
                        <div class="form-group mb-0">
                            <label for="phone">Contact number</label>
                            <input type="number" class="form-control" id="phone" name="phone" required
                                placeholder="Phone number" value="{{ $user_data->phone }}">
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

</x-user.layout>
