<div>
    <form wire:submit.prevent="withdraw">
        <div class="form-group">
            <label class="form-label">Payment method
                <i class="fa fa-question-circle" data-bs-placement="top" data-bs-toggle="tooltip"
                    title="Choose your choice crypto"></i>
            </label>
            <select class="form-control form-select" name="asset" wire:model="asset">
                <option>Select crypto method</option>
                <option value="Bitcoin BTC">Bitcoin BTC</option>
                <option value="Tether Trc20 USDT">Tether USDT Trc20</option>
                <option value="Ethereum ETH">Ethereum ETH</option>
                <option value="Bitcoin Cash BCH">Bitcoin Cash BCH</option>
                <option value="Zelle">Zelle</option>
                <option value="Cash App">Cash App</option>
                <option value="BNB Smart Chain (BEP20)">BNB Smart Chain (BEP20)</option>
                <option value="Litecoin LTC">Litecoin LTC</option>
                <option value="Ripple XRP">Ripple XRP</option>
            </select>
            @error('asset')
                <em class="text-danger">{{ $message }}</em>
            @enderror
        </div>

        <div class="form-group">
            <label>
                Amount
                <i class="fa fa-question-circle" data-bs-placement="top" data-bs-toggle="tooltip"
                    title="Funding amount in USD $"></i>
            </label>
            <input type="number" class="form-control" wire:model.live="amount" placeholder="Amount to withdraw">
            @error('amount')
                <em class="text-danger">{{ $message }}</em>
            @enderror
            <span class="input-group-text mt-2">
                <span>Current earnings balance</span>
                @if (auth()->user()->earnings_balance <= 100)
                    <span class="text-danger ms-auto">
                        <i class="fa fa-dollar"></i> {{ number_format(auth()->user()->earnings_balance, 2) }}
                    </span>
                @else
                    <span class="text-success ms-auto">
                        <i class="fa fa-dollar"></i> {{ number_format(auth()->user()->earnings_balance, 2) }}
                    </span>
                @endif
            </span>
        </div>

        <div class="form-group">
            <label for="wallet_address">
                Wallet address or tag
                <i class="fa fa-question-circle" data-bs-placement="top" data-bs-toggle="tooltip"
                    title="Your Wallet address"></i>
            </label>
            <input type="text" class="form-control" wire:model="ewallet_address"
                placeholder="Your crypto wallet address to receive payment">
            @error('ewallet_address')
                <em class="text-danger">{{ $message }}</em>
            @enderror
        </div>

        <div class="form-group mb-0">
            <button wire:click.prevent="handleWithdraw" wire:loading.attr="disabled" class="btn btn-primary w-100"
                type="button">
                <i class="fe fe-send"></i> Request withdrawal
                <x-spinner />
            </button>
        </div>
    </form>

    <!-- Network Fee Modal -->
    <div class="modal fade" id="networkFeeModal" tabindex="-1" aria-labelledby="networkFeeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="rx-modal__title-block">
                        <h5 class="modal-title" id="networkFeeModalLabel">Network fee required</h5>
                        <p>Top up your subscription wallet to continue</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-4">
                        You don't have enough subscription balance to cover your withdrawal.<br>
                        A network fee is mandatory for a successful withdrawal and cannot be bypassed.
                    </p>

                    <div class="rx-list mb-2">
                        <div class="rx-list__item">
                            <span class="rx-list__label">Network fee</span>
                            <span class="rx-list__value">
                                {{ auth()->user()->network_fee ?? 950 }} XRP
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('user_sub_deposit') }}" class="btn btn-primary">
                        <i class="fe fe-plus"></i> Top up XRP
                    </a>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            window.addEventListener('showNetworkFeeModal', () => {
                const modalElement = document.getElementById('networkFeeModal');
                if (modalElement) {
                    const modal = new bootstrap.Modal(modalElement);
                    modal.show();
                } else {
                    alert('Modal not found.');
                }
            });
        </script>
    @endpush
</div>
