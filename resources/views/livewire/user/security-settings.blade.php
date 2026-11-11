<div class="card">
    <form wire:submit="kyc">
        <div class="card-header">
            <div>
                <h2 class="card-title">Identity verification</h2>
                <p class="rx-panel__sub mb-0">Submit a valid government-issued document for review.</p>
            </div>
        </div>
        <div class="card-body">
            @if ($user_data->verify_status == 2 && $kyc_data->kyc_status == 2)
                <div class="rg-kyc-status rg-kyc-status--success">
                    <div class="rg-kyc-status__icon"><i class="fe fe-check-circle"></i></div>
                    <div>
                        <div class="rg-kyc-status__title">Account verified</div>
                        <div class="rg-kyc-status__text">Your identity has been approved. No further action is required.</div>
                    </div>
                </div>
            @elseif ($user_data->verify_status == 1 && $kyc_data->kyc_status == 1)
                <div class="rg-kyc-status rg-kyc-status--warning">
                    <div class="rg-kyc-status__icon"><i class="fe fe-clock"></i></div>
                    <div>
                        <div class="rg-kyc-status__title">Verification in progress</div>
                        <div class="rg-kyc-status__text">Your documents are being reviewed. We will notify you when the check is complete.</div>
                    </div>
                </div>
            @elseif ($user_data->verify_status == 3 && $kyc_data->kyc_status == 3)
                <div class="rg-kyc-status rg-kyc-status--warning">
                    <div class="rg-kyc-status__icon"><i class="fe fe-alert-circle"></i></div>
                    <div>
                        <div class="rg-kyc-status__title">Verification declined</div>
                        <div class="rg-kyc-status__text">Please review your details and submit a new request with a clear document.</div>
                    </div>
                </div>
            @else
                <div class="rg-kyc-status rg-kyc-status--danger">
                    <div class="rg-kyc-status__icon"><i class="fe fe-shield-off"></i></div>
                    <div>
                        <div class="rg-kyc-status__title">Verification required</div>
                        <div class="rg-kyc-status__text">Verify your account to help keep your funds and withdrawals secure.</div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">Document type</label>
                        <select class="form-control form-select" wire:model.blur="document">
                            <option>Select document</option>
                            <option value="National ID Card">National ID Card</option>
                            <option value="Driver's license">Driver's license</option>
                        </select>
                        @error('document')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">Date of birth</label>
                        <input type="date" class="form-control" wire:model="date_of_birth" placeholder="Date of birth">
                        @error('date_of_birth')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">Front of document</label>
                        <input type="file" class="form-control" accept="image/png, image/jpeg"
                            wire:model.blur="front_document" name="front_document">
                        <small class="rx-muted d-block mt-2">JPG or PNG. Ensure all four corners are visible.</small>
                        @error('front_document')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">Back of document</label>
                        <input type="file" class="form-control" accept="image/png, image/jpeg"
                            wire:model.blur="back_document" name="back_document">
                        <small class="rx-muted d-block mt-2">JPG or PNG. Ensure all details are readable.</small>
                        @error('back_document')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end gap-2">
            @if ($user_data->verify_status == 2 && $kyc_data->kyc_status == 2)
                <button class="btn btn-primary" disabled type="submit">Verification approved</button>
            @elseif ($user_data->verify_status == 1 && $kyc_data->kyc_status == 1)
                <button class="btn btn-primary" disabled type="submit">Review in progress</button>
            @else
                <button class="btn btn-light" type="reset">Reset</button>
                <button class="btn btn-primary" type="submit" wire:loading.attr="disabled">
                    <i class="fe fe-upload"></i> Submit request
                    <x-spinner />
                </button>
            @endif
        </div>
    </form>
</div>
