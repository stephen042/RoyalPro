<div class="pt-1">
    <form wire:submit.throttle.1000.prevent="ai_sellTrade" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-label">Trade type</label>
                    <select wire:model.live="type" class="form-select form-control">
                        <option>Select trade type</option>
                        <option id="forex" value="Forex">Forex</option>
                        <option id="crypto" value="Crypto">Crypto</option>
                        <option id="stocks" value="Stocks">Stocks</option>
                    </select>
                    @error('type')
                        <em class="text-danger">{{ $message }}</em>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-label">Asset</label>
                    <select class="form-control form-select" wire:model.blur="asset">
                        @forelse ($data as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @empty
                            <option disabled>Please select a trade type above</option>
                        @endforelse
                    </select>
                    @error('asset')
                        <em class="text-danger">{{ $message }}</em>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-label">Amount</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" wire:model.live="amount" class="form-control amount" placeholder="Amount in USD">
                    </div>
                    @error('amount')
                        <em class="text-danger">{{ $message }}</em>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-label">Duration</label>
                    <select class="form-control form-select" wire:model.blur="duration">
                        <option>Select trade duration</option>
                        <option value="2 minutes">2 minutes</option>
                        <option value="5 minutes">5 minutes</option>
                        <option value="10 minutes">10 minutes</option>
                        <option value="30 minutes">30 minutes</option>
                        <option value="1 hour">1 hour</option>
                        <option value="2 hours">2 hours</option>
                        <option value="4 hours">4 hours</option>
                        <option value="6 hours">6 hours</option>
                        <option value="8 hours">8 hours</option>
                        <option value="10 hours">10 hours</option>
                        <option value="20 hours">20 hours</option>
                        <option value="1 day">1 day</option>
                        <option value="2 days">2 days</option>
                        <option value="3 days">3 days</option>
                        <option value="4 days">4 days</option>
                        <option value="5 days">5 days</option>
                        <option value="6 days">6 days</option>
                        <option value="1 weeks">1 week</option>
                        <option value="2 weeks">2 weeks</option>
                    </select>
                    @error('duration')
                        <em class="text-danger">{{ $message }}</em>
                    @enderror
                </div>
            </div>
        </div>
        <button class="btn btn-danger w-100 mt-2" type="submit">
            Sell position
            <x-spinner />
        </button>
    </form>
</div>
