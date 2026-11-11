<div class="card">
    <div class="card-header">
        <div>
            <h2 class="card-title">Create a signal plan</h2>
            <p class="rg-panel__sub mb-0">Define the price, duration, and signal strength.</p>
        </div>
    </div>
    <form wire:submit="create_signal_plan">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Plan name</label>
                        <input type="text" wire:model.blur="plan_name" class="form-control"
                            placeholder="Enter a plan name">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Plan amount</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" wire:model.blur="plan_amount" class="form-control"
                                placeholder="Enter plan amount">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-lg-0">
                        <label>Duration</label>
                        <input type="text" wire:model.blur="plan_duration" class="form-control"
                            placeholder="e.g. 3 days">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-lg-0">
                        <label>Signal strength</label>
                        <div class="input-group">
                            <input type="number" wire:model.blur="plan_signal_strength" class="form-control"
                                placeholder="e.g. 85">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end gap-2">
            <button type="reset" class="btn btn-light">Reset</button>
            <button class="btn btn-primary" type="submit">
                <i class="fe fe-plus"></i> Create plan
                <x-spinner />
            </button>
        </div>
    </form>
</div>
