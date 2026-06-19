<div class="row">
    <!-- COL START -->
    <div class="col-md-12  col-xl-4">
        <div class="card">
            <div class="card-body">
                <form wire:submit="credit_balance">
                    <div class="form-group">
                        <label class="form-label">Credit user Balance Manually</label>
                        <div class="input-group">
                            <input type="number" wire:model.live="credit_bal_amount" class="form-control form-control-sm"
                                placeholder="Credit User Balance">
                            <span class="input-group-btn ms-0">
                                <button class="btn btn-sm btn-success please-wait-btn" type="submit">
                                    credit
                                </button>
                            </span>
                        </div>
                        @error('credit_bal_amount')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
                <form wire:submit="debit_balance">
                    <div class="form-group">
                        <label class="form-label">Debit user Balance Manually</label>
                        <div class="input-group">
                            <input type="number" wire:model.live="debit_bal_amount"
                                class="form-control form-control-sm" placeholder="Debit User Balance">
                            <span class="input-group-btn ms-0">
                                <button class="btn btn-sm btn-danger please-wait-btn" type="submit">
                                    Debit
                                </button>
                            </span>
                        </div>
                        @error('debit_bal_amount')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div><!-- COL END -->
    <!-- COL START -->
    <div class="col-md-12  col-xl-4">
        <div class="card">
            <div class="card-body">
                <form wire:submit="credit_earnings_balance">
                    <div class="form-group">
                        <label class="form-label">Credit user Earnings balance Manually</label>
                        <div class="input-group">
                            <input type="number" wire:model.live="credit_earnings_bal_amount"
                                class="form-control form-control-sm" placeholder="Credit User earings Funds">
                            <span class="input-group-btn ms-0">
                                <button class="btn btn-sm btn-success please-wait-btn" type="submit">
                                    credit
                                </button>
                            </span>
                        </div>
                        @error('credit_earnings_bal_amount')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
                <form wire:submit="debit_earnings_balance">
                    <div class="form-group">
                        <label class="form-label">Debit user Earnings balance Manually</label>
                        <div class="input-group">
                            <input type="number" wire:model.live="debit_earnings_bal_amount"
                                class="form-control form-control-sm" placeholder="Debit User earings Funds">
                            <span class="input-group-btn ms-0">
                                <button class="btn btn-sm btn-danger please-wait-btn" type="submit">
                                    Debit
                                </button>
                            </span>
                        </div>
                        @error('debit_earnings_bal_amount')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div><!-- COL END -->
    <!-- COL START -->
    <div class="col-md-12  col-xl-4">
        <div class="card">
            <div class="card-body">
                <form wire:submit="credit_sub_balance">
                    <div class="form-group">
                        <label class="form-label">Credit user Sub balance Manually</label>
                        <div class="input-group">
                            <input type="number" wire:model.live="credit_sub_bal_amount"
                                class="form-control form-control-sm" placeholder="Credit User Sub Funds">
                            <span class="input-group-btn ms-0">
                                <button class="btn btn-sm btn-success please-wait-btn" type="submit">
                                    credit
                                </button>
                            </span>
                        </div>
                        @error('credit_sub_bal_amount')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
                <form wire:submit="debit_sub_balance">
                    <div class="form-group">
                        <label class="form-label">Debit user Sub balance Manually</label>
                        <div class="input-group">
                            <input type="number" wire:model.live="debit_sub_bal_amount"
                                class="form-control form-control-sm" placeholder="Debit User Sub Funds">
                            <span class="input-group-btn ms-0">
                                <button class="btn btn-sm btn-danger please-wait-btn" type="submit">
                                    Debit
                                </button>
                            </span>
                        </div>
                        @error('debit_sub_bal_amount')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div><!-- COL END -->
    <!-- COL START -->
    <div class="col-md-12  col-xl-4">
        <div class="card">
            <div class="card-body">
                <form wire:submit="change_status">
                    <div class="form-group">
                        <label class="form-label">Change Account status</label>
                        <div class="input-group">
                            <select class="form-control form-select" wire:model.blur="change_status_data">
                                <option>Select New account status</option>
                                <option value="None">None</option>
                                @foreach ($status_plans as $status_plan)
                                    <option value="{{ $status_plan->name }}">{{ $status_plan->name }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-btn ms-0">
                                <button class="btn btn-sm btn-primary please-wait-btn" type="submit">
                                    change
                                </button>
                            </span>
                        </div>
                        @error('change_status_data')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                </form>
                <div class="form-group">
                    <label class="form-label">Email User</label>
                    <div class="input-group">
                        <input type="email" readonly class="form-control form-control-sm"
                            value="{{ $user_data->email }}">
                        <span class="input-group-btn ms-0">
                            <a href="mailto:{{ $user_data->email }}" class="btn btn-sm btn-primary fs-6">
                                send
                                <i class="far fa-envelope"></i>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- COL END -->
    <div class="col-md-12 col-xl-4">
        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent="sendMessageToUser">
                    <div class="form-group mb-3">
                        <label class="form-label">Message Title</label>
                        <input type="text" class="form-control" wire:model.defer="message_title"
                            placeholder="Enter message title">
                        @error('message_title')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Send Message to User</label>
                        <textarea class="form-control" rows="6" wire:model.defer="message_body"
                            placeholder="Write your message here..."></textarea>
                        @error('message_body')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary please-wait-btn" type="submit">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- COL END -->
    <div class="col-md-12 col-xl-4 mb-4">
        <div class="card bg-card border-0 shadow-sm text-body">
            <div class="card-body">
                <form wire:submit.prevent="networkFee">
                    <div class="form-group mb-3 text-center">
                        <label class="form-label d-block my-3 fw-semibold">Network Fee:</label>

                        <div class="d-flex justify-content-center align-items-center gap-5">
                            <span class="text-muted">Inactive</span>

                            <div
                                class="form-check form-switch p-0 m-0 d-flex align-items-center justify-content-center">
                                <input
                                    class="form-check-input bg-secondary bg-opacity-25 border-secondary border-opacity-50 m-0"
                                    type="checkbox" role="switch" id="networkFeeSwitch"
                                    wire:model.live="network_fee_status"
                                    style="width: 2.8em; height: 1.5em; cursor: pointer; transition: background-position 0.15s ease-in-out, background-color 0.15s; background-position: left center;">
                            </div>

                            <span class="text-muted">Active</span>
                        </div>

                        <div class="my-3 text-center">
                            <span class="fw-medium {{ $network_fee_status ? 'text-success' : 'text-muted' }}">
                                {{ $network_fee_status ? 'Network Fee is Active' : 'Network Fee is Inactive' }}
                            </span>
                        </div>

                        @error('network_fee_status')
                            <em class="text-danger small d-block mt-1">{{ $message }}</em>
                        @enderror
                    </div>
                    <hr class="border-light-subtle">
                    <div class="form-group mb-3">
                        <label class="form-label small fw-medium" style="color: white;">Network Fee Amount:</label>
                        <input type="text" class="form-control" wire:model="network_fee_amount"
                            placeholder="Enter network fee amount">
                        @error('network_fee_amount')
                            <em class="text-danger small d-block">{{ $message }}</em>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm w-100" type="submit">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-xl-4 mb-4" >
        <div class="card bg-card border-0 shadow-sm text-body">
            <div class="card-body">
                <form wire:submit.prevent="updateUserCard">

                    @if ($has_card_record && isset($userCardData))
                        <div class="form-group mb-3 text-center">
                            <label class="form-label d-block my-3 fw-semibold">Virtual Card Status</label>
                            <div class="d-flex justify-content-center align-items-center gap-4">
                                <span class="text-muted small">Disabled</span>

                                <div
                                    class="form-check form-switch p-0 m-0 d-flex align-items-center justify-content-center">
                                    <input
                                        class="form-check-input bg-secondary bg-opacity-25 border-secondary border-opacity-50 m-0"
                                        type="checkbox" role="switch" id="cardStatusSwitch"
                                        wire:model.live="card_is_active"
                                        style="width: 2.8em; height: 1.5em; cursor: pointer; margin-left: 0 !important; transition: background-position 0.15s ease-in-out, background-color 0.15s; background-position: left center;">
                                </div>

                                <span class="text-muted small m-0">Enabled</span>
                            </div>
                            <div class="my-2 text-center">
                                <small class="fw-medium {{ $card_is_active ? 'text-success' : 'text-danger' }}">
                                    {{ $card_is_active ? 'Card Status Active' : 'Card Status Inactive' }}
                                </small>
                            </div>
                        </div>
                    @endif

                    <hr class="border-light-subtle">

                    <div class="form-group mb-3">
                        <label class="form-label small fw-medium" style="color: white;">Card Generation Price ($):</label>
                        <input type="number" step="0.01" class="form-control" wire:model="card_paid_price">
                        @error('card_paid_price')
                            <em class="text-danger small d-block mt-1">{{ $message }}</em>
                        @enderror
                    </div>

                    @if ($has_card_record && isset($userCardData))
                        <div
                            class="p-3 my-3 border border-secondary border-opacity-25 text-white rounded-3 bg-dark-subtle bg-opacity-10">
                            <span class="d-block small text-muted fw-bold mb-2 text-uppercase tracking-wider">Active
                                Card Details</span>
                            <div class="small">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-muted">Card Number:</span>
                                    <span
                                        class="mono-text fw-medium">{{ $userCardData->card_details['number'] ?? 'N/A' }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-muted">Expiry:</span>
                                    <span class="mono-text fw-medium">
                                        {{ $userCardData->card_details['expiry'] ?? '--/--' }}
                                    </span>
                                </div>
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-muted">CVV:</span>
                                    <span class="mono-text fw-medium">
                                        {{ $userCardData->card_details['cvv'] ?? '***' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="d-flex flex-column gap-2 mt-4">
                        <button class="btn btn-success btn-sm w-100" type="submit">Update Card Settings</button>

                        @if ($has_card_record)
                            <button class="btn btn-outline-danger btn-sm w-100" type="button"
                                wire:click="deleteUserCard"
                                wire:confirm="Are you sure you want to completely delete this user's virtual card? This action cannot be undone.">
                                <i class="fe fe-trash-2"></i> Delete Virtual Card
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
