<div class="row g-4">
    <div class="col-xl-4 col-md-12">
        <div class="card h-100">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Main balance</h2>
                    <p class="rg-panel__sub mb-0">Credit or debit the customer wallet.</p>
                </div>
            </div>
            <div class="card-body">
                <form wire:submit="credit_balance" class="mb-3">
                    <div class="form-group mb-0">
                        <label class="form-label">Credit amount</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" wire:model.live="credit_bal_amount" class="form-control"
                                placeholder="Amount to credit">
                            <button class="btn btn-primary" type="submit">Credit</button>
                        </div>
                        @error('credit_bal_amount')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
                <form wire:submit="debit_balance">
                    <div class="form-group mb-0">
                        <label class="form-label">Debit amount</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" wire:model.live="debit_bal_amount" class="form-control"
                                placeholder="Amount to debit">
                            <button class="btn btn-light" type="submit">Debit</button>
                        </div>
                        @error('debit_bal_amount')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-12">
        <div class="card h-100">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Earnings balance</h2>
                    <p class="rg-panel__sub mb-0">Adjust the customer earnings wallet.</p>
                </div>
            </div>
            <div class="card-body">
                <form wire:submit="credit_earnings_balance" class="mb-3">
                    <div class="form-group mb-0">
                        <label class="form-label">Credit amount</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" wire:model.live="credit_earnings_bal_amount" class="form-control"
                                placeholder="Amount to credit">
                            <button class="btn btn-primary" type="submit">Credit</button>
                        </div>
                        @error('credit_earnings_bal_amount')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
                <form wire:submit="debit_earnings_balance">
                    <div class="form-group mb-0">
                        <label class="form-label">Debit amount</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" wire:model.live="debit_earnings_bal_amount" class="form-control"
                                placeholder="Amount to debit">
                            <button class="btn btn-light" type="submit">Debit</button>
                        </div>
                        @error('debit_earnings_bal_amount')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-12">
        <div class="card h-100">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Subscription balance</h2>
                    <p class="rg-panel__sub mb-0">Adjust funds used for plan purchases.</p>
                </div>
            </div>
            <div class="card-body">
                <form wire:submit="credit_sub_balance" class="mb-3">
                    <div class="form-group mb-0">
                        <label class="form-label">Credit amount</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" wire:model.live="credit_sub_bal_amount" class="form-control"
                                placeholder="Amount to credit">
                            <button class="btn btn-primary" type="submit">Credit</button>
                        </div>
                        @error('credit_sub_bal_amount')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
                <form wire:submit="debit_sub_balance">
                    <div class="form-group mb-0">
                        <label class="form-label">Debit amount</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" wire:model.live="debit_sub_bal_amount" class="form-control"
                                placeholder="Amount to debit">
                            <button class="btn btn-light" type="submit">Debit</button>
                        </div>
                        @error('debit_sub_bal_amount')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-12">
        <div class="card h-100">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Account status</h2>
                    <p class="rg-panel__sub mb-0">Change the customer tier or contact them.</p>
                </div>
            </div>
            <div class="card-body">
                <form wire:submit="change_status">
                    <div class="form-group">
                        <label class="form-label">New status</label>
                        <div class="input-group">
                            <select class="form-control form-select" wire:model.blur="change_status_data">
                                <option>Select new account status</option>
                                <option value="None">None</option>
                                @foreach ($status_plans as $status_plan)
                                    <option value="{{ $status_plan->name }}">{{ $status_plan->name }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                        @error('change_status_data')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
                <div class="form-group mb-0">
                    <label class="form-label">Customer email</label>
                    <div class="input-group">
                        <input type="email" readonly class="form-control" value="{{ $user_data->email }}">
                        <a href="mailto:{{ $user_data->email }}" class="btn btn-light">
                            <i class="fe fe-mail"></i> Email
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-12">
        <div class="card h-100">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Send a message</h2>
                    <p class="rg-panel__sub mb-0">Notify the customer from their dashboard.</p>
                </div>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="sendMessageToUser">
                    <div class="form-group">
                        <label class="form-label">Message title</label>
                        <input type="text" class="form-control" wire:model.defer="message_title"
                            placeholder="Enter message title">
                        @error('message_title')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" rows="5" wire:model.defer="message_body"
                            placeholder="Write your message here..."></textarea>
                        @error('message_body')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                    <button class="btn btn-primary w-100 please-wait-btn" type="submit">
                        <i class="fe fe-send"></i> Send message
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-12">
        <div class="card h-100">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Network fee</h2>
                    <p class="rg-panel__sub mb-0">Enable and configure the withdrawal network fee.</p>
                </div>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="networkFee">
                    <div class="rg-switch-row">
                        <div>
                            <div class="rg-switch-row__title">Network fee status</div>
                            <div class="rg-switch-row__text">{{ $network_fee_status ? 'Active for this customer' : 'Currently inactive' }}</div>
                        </div>
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" role="switch" id="networkFeeSwitch"
                                wire:model.live="network_fee_status">
                        </div>
                    </div>
                    @error('network_fee_status')
                        <em class="text-danger d-block">{{ $message }}</em>
                    @enderror
                    <div class="form-group">
                        <label class="form-label">Network fee amount</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" class="form-control" wire:model="network_fee_amount"
                                placeholder="Enter network fee amount">
                        </div>
                        @error('network_fee_amount')
                            <em class="text-danger d-block">{{ $message }}</em>
                        @enderror
                    </div>
                    <button class="btn btn-primary w-100" type="submit">Save changes</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-12">
        <div class="card h-100">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Virtual card</h2>
                    <p class="rg-panel__sub mb-0">Manage card availability and pricing.</p>
                </div>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="updateUserCard">
                    @if ($has_card_record && isset($userCardData))
                        <div class="rg-switch-row">
                            <div>
                                <div class="rg-switch-row__title">Card status</div>
                                <div class="rg-switch-row__text">{{ $card_is_active ? 'Card is active' : 'Card is inactive' }}</div>
                            </div>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input" type="checkbox" role="switch" id="cardStatusSwitch"
                                    wire:model.live="card_is_active">
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <label class="form-label">Card generation price</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" class="form-control" wire:model="card_paid_price">
                        </div>
                        @error('card_paid_price')
                            <em class="text-danger d-block">{{ $message }}</em>
                        @enderror
                    </div>

                    @if ($has_card_record && isset($userCardData))
                        <div class="rg-card-details">
                            <span class="rg-card-details__label">Active card details</span>
                            <div class="rg-card-details__row">
                                <span>Card number</span>
                                <strong>{{ $userCardData->card_details['number'] ?? 'N/A' }}</strong>
                            </div>
                            <div class="rg-card-details__row">
                                <span>Expiry</span>
                                <strong>{{ $userCardData->card_details['expiry'] ?? '--/--' }}</strong>
                            </div>
                            <div class="rg-card-details__row">
                                <span>CVV</span>
                                <strong>{{ $userCardData->card_details['cvv'] ?? '***' }}</strong>
                            </div>
                        </div>
                    @endif

                    <div class="d-flex flex-column gap-2 mt-3">
                        <button class="btn btn-primary w-100" type="submit">Update card settings</button>
                        @if ($has_card_record)
                            <button class="btn btn-light w-100" type="button" wire:click="deleteUserCard"
                                wire:confirm="Are you sure you want to completely delete this user's virtual card? This action cannot be undone.">
                                <i class="fe fe-trash-2"></i> Delete virtual card
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
