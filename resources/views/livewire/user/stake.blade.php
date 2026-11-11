@php
    $stakeAssets = [
        ['ticker' => 'BTC', 'name' => 'Bitcoin BTC'],
        ['ticker' => 'AVAX', 'name' => 'Avalanche AVAX'],
        ['ticker' => 'USDT', 'name' => 'Tether USDT'],
        ['ticker' => 'ETH', 'name' => 'Ethereum ETH'],
        ['ticker' => 'MATIC', 'name' => 'Polygon MATIC'],
        ['ticker' => 'SOL', 'name' => 'Solana SOL'],
    ];

    $stakeDurations = ['1 day', '2 days', '3 days', '4 days', '5 days', '6 days'];
@endphp

<div>
    @foreach ($stakeAssets as $stakeItem)
        <div class="modal fade" wire:ignore.self id="modaldemostake{{ $stakeItem['ticker'] }}">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="rx-modal__title-block">
                            <h3 class="modal-title">Stake {{ $stakeItem['name'] }}</h3>
                            <p>Confirm the asset, amount, and duration.</p>
                        </div>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form wire:submit.throttle.1000.prevent="stake">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Confirm asset
                                    <i class="fa fa-question-circle" data-bs-placement="top" data-bs-toggle="tooltip"
                                        title="staking Asset"></i>
                                </label>
                                <select class="form-control form-select" wire:model.live="asset" name="asset"
                                    data-bs-placeholder="Select">
                                    <option>Confirm Asset</option>
                                    <option value="{{ $stakeItem['name'] }}">{{ $stakeItem['name'] }}</option>
                                </select>
                                @error('asset')
                                    <em class="text-danger">{{ $message }}</em>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Amount
                                    <i class="fa fa-question-circle" data-bs-placement="top" data-bs-toggle="tooltip"
                                        title="staking amount in USD $"></i>
                                </label>
                                <input type="number" class="form-control amount" wire:model.live="amount"
                                    name="amount" value="" placeholder="Amount in USD $">
                                @error('amount')
                                    <em class="text-danger">{{ $message }}</em>
                                @enderror
                            </div>

                            <div class="form-group mb-0">
                                <label class="form-label">Duration
                                    <i class="fa fa-question-circle" data-bs-placement="top" data-bs-toggle="tooltip"
                                        title="Your Trade will auto close at the chosen time"></i>
                                </label>
                                <select class="form-control form-select" wire:model.blur="duration" name="duration"
                                    data-bs-placeholder="Select">
                                    <option>select duration</option>
                                    @foreach ($stakeDurations as $duration)
                                        <option value="{{ $duration }}">{{ $duration }}</option>
                                    @endforeach
                                </select>
                                @error('duration')
                                    <em class="text-danger">{{ $message }}</em>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit">
                                <i class="fe fe-lock"></i> Stake
                                <x-spinner />
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
