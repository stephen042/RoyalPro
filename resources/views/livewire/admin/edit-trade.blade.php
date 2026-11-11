<div class="col-xl-9 col-md-12">
    <div class="card">
        <div class="card-header">
            <div>
                <h2 class="card-title">Trade details</h2>
                <p class="rg-panel__sub mb-0">Review the position and record its final result.</p>
            </div>
            <span class="rg-chip rg-chip--neutral">{{ config('app.trade_status')[$trade->trade_status] }}</span>
        </div>
        <form wire:submit="trade_edit">
            <div class="card-body">
                <div class="form-group">
                    <label>Customer email</label>
                    <input type="email" class="form-control" readonly value="{{ $user->email }}">
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Trade type</label>
                            <input type="text" class="form-control" readonly value="{{ $trade->trade_type }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Trade asset</label>
                            <input type="text" class="form-control" readonly value="{{ $trade->trade_asset }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Market</label>
                            <input type="text" class="form-control" readonly value="{{ $trade->trade_market }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Stake amount</label>
                            <input type="text" class="form-control" readonly value="${{ number_format((float) $trade->trade_stake_amount, 2) }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Trade by</label>
                            <input type="text" class="form-control" readonly value="{{ $trade->trade_by }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Duration</label>
                            <input type="text" class="form-control" readonly value="{{ $trade->trade_duration }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Current status</label>
                            <input type="text" class="form-control" readonly value="{{ config('app.trade_status')[$trade->trade_status] }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Outcome</label>
                            <select class="form-control form-select" wire:model.live="change">
                                <option>Select profit or loss</option>
                                <option value="profit">Profit</option>
                                <option value="loss">Loss</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="{{ $display }}">
                    <div class="{{ $display_loss }}">
                        <div class="rg-notice">
                            <div class="rg-notice__icon"><i class="fe fe-alert-triangle"></i></div>
                            <div>
                                <div class="rg-notice__title">Loss recorded</div>
                                <div class="rg-notice__text">The stake amount of ${{ number_format((float) $trade->trade_stake_amount, 2) }} will be recorded as a loss to the customer.</div>
                            </div>
                        </div>
                    </div>
                    <div class="{{ $display_profit }}">
                        <div class="form-group mb-0">
                            <label>Trade profit</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" wire:model.live="profit"
                                    placeholder="Enter trade profit">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end gap-2">
                <button type="reset" class="btn btn-light">Undo</button>
                <button class="btn btn-primary" type="submit">
                    <i class="fe fe-check"></i> Complete trade
                    <x-spinner />
                </button>
            </div>
        </form>
    </div>
</div>
