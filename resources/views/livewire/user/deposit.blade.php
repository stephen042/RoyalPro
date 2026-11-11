@php
    $depositMethods = [
        ['id' => 'bitcoin', 'label' => 'Bitcoin BTC', 'prop' => 'btc', 'kind' => 'address'],
        ['id' => 'ethereum', 'label' => 'Ethereum ETH', 'prop' => 'eth', 'kind' => 'address'],
        ['id' => 'usdt', 'label' => 'Tether USDT Trc20', 'prop' => 'usdt', 'kind' => 'address'],
        ['id' => 'cashapp', 'label' => 'Cash App', 'prop' => 'cash_app', 'kind' => 'tag'],
        ['id' => 'paypal', 'label' => 'PayPal', 'prop' => 'paypal', 'kind' => 'tag'],
        ['id' => 'zelle', 'label' => 'Zelle', 'prop' => 'zelle', 'kind' => 'tag'],
        ['id' => 'bnb', 'label' => 'BNB Smart Chain (BEP20)', 'prop' => 'bnb', 'kind' => 'address'],
        ['id' => 'bch', 'label' => 'Bitcoin Cash BCH', 'prop' => 'bch', 'kind' => 'address'],
        ['id' => 'ltc', 'label' => 'Litecoin LTC', 'prop' => 'ltc', 'kind' => 'address'],
        ['id' => 'xrp', 'label' => 'Ripple XRP', 'prop' => 'xrp', 'kind' => 'address'],
    ];
@endphp

<div>
    <form method="post" wire:submit.throttle.1000.prevent="deposit">
        @csrf

        <div class="form-group">
            <label class="form-label">Payment method
                <i class="fa fa-question-circle" data-bs-placement="top" data-bs-toggle="tooltip"
                    title="Choose payment gateway"></i>
            </label>
            <select class="form-control form-select" wire:model.live="asset" id="asset" data-bs-placeholder="Select"
                required>
                <option>Select crypto method</option>
                <option value="Bitcoin">Bitcoin BTC</option>
                <option value="Ethereum">Ethereum ETH ERC20</option>
                <option value="USDT Trc20">Tether USDT Trc20</option>
                <option value="Cash App">Cash App</option>
                <option value="BNB Smart Chain (BEP20)">BNB Smart Chain (BEP20)</option>
                <option value="Bitcoin chash BCH">Bitcoin chash BCH</option>
                <option value="Litecoin LTC">Litecoin LTC</option>
                <option value="Ripple XRP">Ripple XRP</option>
            </select>
            @error('asset')
                <em class="text-danger">{{ $message }}</em>
            @enderror
        </div>

        <div class="form-group" id="amount">
            <label>Amount
                <i class="fa fa-question-circle" data-bs-placement="top" data-bs-toggle="tooltip"
                    title="Funding amount in USD $"></i>
            </label>
            <input type="number" wire:model.live="amount" class="form-control amount" value=""
                placeholder="Amount to deposit" required>
            @error('amount')
                <em class="text-danger">{{ $message }}</em>
            @enderror
            <span class="input-group-text mt-2">
                <span>Current balance</span>
                @if (auth()->user()->balance <= 100)
                    <span class="text-danger ms-auto">
                        <i class="fa fa-dollar"></i> {{ number_format(auth()->user()->balance, 2) }}
                    </span>
                @else
                    <span class="text-success ms-auto">
                        <i class="fa fa-dollar"></i> {{ number_format(auth()->user()->balance, 2) }}
                    </span>
                @endif
            </span>
        </div>

        @if (!$errors->any())
            <a id="submit" class="modal-effect btn btn-primary w-100" data-bs-effect="effect-scale"
                data-bs-toggle="modal" href="{{ $modalName }}">
                Continue to payment <i class="fe fe-arrow-right"></i>
            </a>
        @else
            <button class="btn btn-danger w-100" disabled>
                <i class="fe fe-alert-circle"></i> Resolve the errors above
            </button>
        @endif

        {{-- Payment detail modals --}}
        @foreach ($depositMethods as $method)
            <div class="modal fade" wire:ignore.self id="{{ $method['id'] }}">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="rx-modal__title-block">
                                <h6 class="modal-title">Deposit {{ $method['label'] }}</h6>
                                <p>Transfer the amount, then upload your payment proof.</p>
                            </div>
                            <button aria-label="Close" type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <div class="rx-pay">
                                <div>
                                    <label class="form-label">
                                        {{ $method['kind'] === 'tag' ? 'Deposit tag / handle' : 'Wallet address' }}
                                    </label>
                                    <div class="rx-pay__address">
                                        <span class="rx-pay__addr"
                                            id="rx-addr-{{ $method['id'] }}">{{ $admin_wallet?->{$method['prop']} }}</span>
                                        <button type="button" class="rx-pay__copy"
                                            onclick="copyAddress('rx-addr-{{ $method['id'] }}')"
                                            aria-label="Copy address">
                                            <i class="fe fe-copy"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="rx-pay__qr">
                                    <img
                                        src="https://chart.googleapis.com/chart?chs=225x225&chld=L|2&cht=qr&chl={{ $admin_wallet?->{$method['prop']} }}"
                                        alt="QR code for {{ $method['label'] }}">
                                </div>

                                <div>
                                    @if ($proof)
                                        <label class="form-label">Payment proof</label>
                                        <div class="rx-pay__preview">
                                            <img class="img-fluid" src="{{ $proof->temporaryUrl() }}"
                                                alt="Payment proof preview">
                                        </div>
                                    @endif

                                    <label class="form-label {{ $proof ? 'mt-3' : '' }}">Proof of payment</label>
                                    <label class="rx-upload"
                                        x-data="{ uploading: false, progress: 0 }"
                                        x-on:livewire-upload-start="uploading = true"
                                        x-on:livewire-upload-finish="uploading = false"
                                        x-on:livewire-upload-cancel="uploading = false"
                                        x-on:livewire-upload-error="uploading = false"
                                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                                        <input type="file" wire:model="proof" accept="image/png, image/jpeg"
                                            name="proof">
                                        <span class="rx-upload__label">
                                            <i class="fe fe-camera"></i>
                                            {{ $proof ? 'Replace screenshot' : 'Upload payment screenshot' }}
                                        </span>
                                        <span class="rx-upload__hint">JPG or PNG · clear, full screenshot</span>
                                        <div x-show="uploading">
                                            <progress max="100" x-bind:value="progress"></progress>
                                        </div>
                                    </label>
                                    @error('proof')
                                        <span class="text-danger d-block mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                            <button wire:loading.attr="disabled" class="btn btn-primary" type="submit">
                                Submit deposit
                                <x-spinner />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </form>
</div>
