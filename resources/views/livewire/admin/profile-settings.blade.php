<div class="col-xl-4 col-md-12 col-sm-12">
    <div class="card">
        <div class="card-header">
            <div>
                <h2 class="card-title">Photo & password</h2>
                <p class="rg-panel__sub mb-0">Your administrator login security.</p>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex align-items-center gap-3 mb-4">
                @if ($user_data->profile_pic)
                    <img src="{{ asset('storage/' . $user_data->profile_pic) }}" alt="Admin Avatar"
                        class="rounded-circle rg-avatar">
                @else
                    <img src="{{ asset('assets/images/profile.png') }}" alt="Admin Avatar"
                        class="rounded-circle rg-avatar">
                @endif
                <div class="min-w-0">
                    <div class="fw-semibold text-truncate">{{ $user_data->first_name }} {{ $user_data->last_name }}</div>
                    <div class="rg-muted text-truncate">{{ $user_data->email }}</div>
                    <span class="rg-chip rg-chip--success mt-2"><i class="fe fe-shield"></i> Admin</span>
                </div>
            </div>

            @error('profile_picture')
                <div class="alert alert-danger py-2">{{ $message }}</div>
            @enderror

            <form wire:submit="update_profile_pic">
                <div class="form-group">
                    <label class="form-label">Profile picture</label>
                    <input type="file" accept="image/png, image/jpeg" class="form-control" name="profile_picture"
                        wire:model.live="profile_picture">
                    <small class="rg-muted d-block mt-2">JPG or PNG, square images look best.</small>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fe fe-upload"></i> Update picture
                    </button>
                    <button type="button" wire:click="delete_pic"
                        wire:confirm="Are you sure you want to Delete your profile Picture ?"
                        class="btn btn-light btn-sm">
                        <i class="fe fe-trash-2"></i> Remove
                    </button>
                </div>
            </form>

            <hr>

            <div class="mb-3">
                <h3 class="card-title mb-1">Change password</h3>
                <p class="rg-panel__sub mb-0">Use a strong password you do not use elsewhere.</p>
            </div>
            <form wire:submit="updatepassword">
                <div class="form-group">
                    <label class="form-label">Current password</label>
                    <input type="password" class="form-control" name="current_password" wire:model="current_password"
                        placeholder="Enter current password">
                    @error('current_password')
                        <em class="text-danger">{{ $message }}</em>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">New password</label>
                    <input type="password" class="form-control" wire:model="password" name="password"
                        placeholder="Enter new password">
                    @error('password')
                        <em class="text-danger">{{ $message }}</em>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Confirm password</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        wire:model="password_confirmation" placeholder="Confirm new password">
                    @error('password_confirmation')
                        <em class="text-danger">{{ $message }}</em>
                    @enderror
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <button type="reset" class="btn btn-light">Clear</button>
                    <button wire:loading.attr="disabled" class="btn btn-primary" type="submit">
                        <i class="fe fe-lock"></i> Update password
                        <x-spinner />
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
