<div class="row g-4">
    <div class="col-xl-6">
        <div class="card h-100">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Trading progress</h2>
                    <p class="rg-panel__sub mb-0">Update the progress shown on the customer dashboard.</p>
                </div>
                <span class="rg-chip rg-chip--primary">{{ $user_data->progress_bar_status }}%</span>
            </div>
            <div class="card-body">
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: {{ $user_data->progress_bar_status }}%"
                        aria-valuenow="{{ $user_data->progress_bar_status }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <form wire:submit.prevent="trade">
                    <div class="form-group mb-0">
                        <label class="form-label">Manage trading progress</label>
                        <div class="input-group">
                            <input type="number" wire:model.defer="trade_progress" class="form-control"
                                placeholder="e.g. 47">
                            <span class="input-group-text">%</span>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                        @error('trade_progress')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card h-100">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Signal strength</h2>
                    <p class="rg-panel__sub mb-0">Update the signal strength shown to the customer.</p>
                </div>
                <span class="rg-chip rg-chip--success">{{ $user_data->signal_strength }}%</span>
            </div>
            <div class="card-body">
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: {{ $user_data->signal_strength }}%"
                        aria-valuenow="{{ $user_data->signal_strength }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <form wire:submit.prevent="signal">
                    <div class="form-group mb-0">
                        <label class="form-label">Manage signal strength</label>
                        <div class="input-group">
                            <input type="number" wire:model.defer="signal_progress" class="form-control"
                                placeholder="e.g. 47">
                            <span class="input-group-text">%</span>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                        @error('signal_progress')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
