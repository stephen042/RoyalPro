<div class="container-fluid px-2 px-sm-3 px-md-4 py-4 min-vh-50 d-flex align-items-center">
    <div class="row d-flex justify-content-center align-items-center w-100 m-0 virtual-card-workspace">

        <center class="w-100 mb-4">
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show w-80" role="alert">
                    <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
                    <span class="alert-inner--text"><strong>error!</strong>
                        {{ session('error') }}
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show w-80" role="alert">
                    <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
                    <span class="alert-inner--text"><strong>Success!</strong>
                        {{ session('success') }}
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
        </center>

        @if ($has_card)
            <div class="col-12 col-md-6 col-lg-4 mb-4 mb-md-0">
                <div class="v-card-flip w-100" id="virtualCard">
                    <div class="v-card-inner">

                        <div class="v-card-front"
                            style="background: linear-gradient(135deg, rgba(22, 42, 69, 0.9) 0%, rgba(2, 12, 27, 0.95) 100%), url('{{ asset('home-assets/assets/img/forex-logo.png') }}'); background-size: cover;">
                            <div class="card-bg-pattern"></div>
                            <div class="v-card-content">
                                <div class="d-flex justify-content-between align-items-start" >
                                    <div>
                                        <h5 class="card-tagline m-0">CARD</h5>
                                        <small class="card-sub-tag text-white-50">Premium Tier</small>
                                    </div>
                                    <div class="brand-logo-glow">
                                        <i class="fe fe-cpu me-1"></i>
                                        <span>{{ config('app.name') }}</span>
                                    </div>
                                </div>

                                <div class="my-2 my-sm-3">
                                    <div class="card-chip"></div>
                                    <div class="v-card-number">
                                        @if ($card_status && isset($userCard->card_details['number']))
                                            {{ implode('-', str_split(str_repeat('*', 12) . substr(str_replace(' ', '', $userCard->card_details['number']), -4), 4)) }}
                                        @else
                                            ****-****-****-8492
                                        @endif
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-end text-white">
                                    <div>
                                        <small class="meta-label">Card Holder</small>
                                        <span class="meta-value">{{ Auth::user()->last_name }},
                                            {{ Auth::user()->first_name }}</span>
                                    </div>
                                    <div class="text-end">
                                        <small class="meta-label">Expires</small>
                                        <span
                                            class="meta-value">{{ $userCard->card_details['expiry'] ?? '12/30' }}</span>
                                    </div>
                                    <div>
                                        <div
                                            class="card-vendor-icon class-{{ $userCard->card_details['network'] ?? 'visa' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="v-card-back">
                            <div class="card-bg-pattern"></div>
                            <div class="v-card-content back-layout py-3">
                                <div class="w-100">
                                    <div class="card-magnetic-strip mb-3"></div>
                                    <div class="px-3">
                                        <small class="meta-label mb-1">Authorized Signature</small>
                                        <div class="d-flex align-items-center w-100">
                                            <div class="signature-panel flex-grow-1">
                                                {{ Auth::user()->last_name }}
                                            </div>
                                            <div class="cvv-badge ms-2" id="cardCvv">
                                                {{ $card_status ? $userCard->card_details['cvv'] ?? '***' : '***' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-3 card-back-disclaimer text-white-50 mt-2">
                                    Virtual card remains asset of issuer. Subject to terms. Click card to flip back.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <p class="flip-hint-text text-center mt-2 mb-0"><i class="fe fe-refresh-cw me-1"></i> Click card to flip
                    front/back</p>
            </div>
        @endif

        <div class="{{ $has_card ? 'col-12 col-md-6 col-lg-6' : 'col-12 col-md-8 col-lg-6' }}">
            <div class="custom-tabs-container card bg-card text-body border-0 shadow-sm">

                <div class="tabs-header-bar d-flex border-bottom border-light-subtle bg-body-tertiary">
                    @if ($has_card)
                        <button class="custom-tab-btn active" id="btnDetails" onclick="switchTab('details')">
                            <i class="fe fe-eye"></i> Card Details
                        </button>
                    @endif

                    @if (!$card_status)
                        <button class="custom-tab-btn {{ !$has_card ? 'active w-100' : '' }}" id="btnAcquire"
                            onclick="switchTab('acquire')">
                            <i class="fe fe-plus-circle"></i> Acquire New Card
                        </button>
                    @endif
                </div>

                <div class="card-body p-3 p-sm-4">

                    @if ($has_card)
                        <div class="tab-panel-view active" id="panelDetails" wire:ignore.self>
                            <div
                                class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-2 mb-3">
                                <div>
                                    <h5 class="panel-main-title mb-1">Active Terminal Card</h5>
                                    <p class="panel-sub-title mb-0 small text-muted">Secure details for dynamic digital
                                        trading accounts.</p>
                                </div>
                                <span class="custom-status-badge">
                                    <span class="status-dot {{ $card_status ? 'bg-success' : 'bg-danger' }}"></span>
                                    {{ $card_status ? 'Active' : 'Inactive' }}
                                </span>
                            </div>

                            <div class="table-responsive border border-light-subtle rounded-3 m-0">
                                <table class="table pure-details-table mb-0 align-middle">
                                    <tbody>
                                        <tr>
                                            <td class="lbl-col text-muted py-2 px-3 fw-medium">Provider</td>
                                            <td class="val-col py-2 px-3 fw-bold">{{ config('app.name') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lbl-col text-muted py-2 px-3 fw-medium">Information</td>
                                            <td class="val-col py-2 px-3">
                                                <div class="d-flex align-items-center justify-content-between gap-2">
                                                    <span class="mono-text" id="fullCardNum">
                                                        @if ($card_status && isset($userCard->card_details['number']))
                                                            {{ implode('-', str_split(str_repeat('*', 12) . substr(str_replace(' ', '', $userCard->card_details['number']), -4), 4)) }}
                                                            (CVV: {{ $userCard->card_details['cvv'] ?? '***' }})
                                                        @else
                                                            RECEIVE THE PHYSICAL CARD TO GET THE DETAILS
                                                        @endif
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="lbl-col text-muted py-2 px-3 fw-medium">Information</td>
                                            <td class="val-col py-2 px-3 fw-bold">GET THE PHYSICAL CARD TO SEE DETAILS
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                    @if (!$card_status)
                        <div class="tab-panel-view {{ !$has_card ? 'active' : '' }}" id="panelAcquire"
                            wire:ignore.self style="color: white;">
                            <h5 class="panel-main-title mb-1">Request Premium Virtual Card</h5>
                            <p class="panel-sub-title text-muted mb-3 small">Deploy instant secondary card tied straight
                                into your trading parameter nodes.</p>

                            <div class="custom-info-alert p-3 mb-3 border-start border-4 border-primary">
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="fe fe-info text-primary fs-5"></i>
                                    <div>
                                        <span class="d-block fw-bold small text-primary">Fixed Generation Fee</span>
                                        <span class="small text-body-secondary">Issuing transaction structure process
                                            fee set explicitly at <strong>$250.00</strong>.</span>
                                    </div>
                                </div>
                            </div>

                            <form class="pure-form-layout d-flex flex-column gap-3" wire:submit.prevent="purchaseCard" style="color: white;">
                                <div class="row g-2">
                                    <div class="col-12 col-sm-6">
                                        <label class="form-label small  mb-1 fw-medium">Preferred
                                            Network</label>
                                        <select class="form-select form-select-sm" wire:model="network">
                                            <option value="visa">Visa Secure Virtual</option>
                                            <option value="mastercard">Mastercard Premium</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="form-label small  mb-1 fw-medium">Dynamic Funding
                                            Source</label>
                                        <select class="form-select form-select-sm" wire:model="funding_source">
                                            <option value="balance">Main Wallet Balance</option>
                                            <option value="deposit">Subscription Account Deposit</option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label class="form-label small  mb-1 fw-medium">Create 4-Digit Card
                                        PIN</label>
                                    <input type="password" inputmode="numeric" pattern="[0-8]*"
                                        class="form-control form-control-sm fw-bold @error('pin') is-invalid @enderror"
                                        placeholder="••••" wire:model.live="pin"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4);" required>
                                    @error('pin')
                                        <div class="invalid-feedback small d-block mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <label class="form-label small  mb-1 fw-medium">Total Order
                                        Allocation</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">$</span>
                                        <input wire:model="generation_fee" type="text"
                                            class="form-control fw-bold bg-body-secondary"
                                            value="{{ Auth::user()->card_price }}" readonly>
                                        <span class="input-group-text">USD</span>
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="termsCheck" required checked>
                                    <label class="form-check-label small  style-line-height"
                                        for="termsCheck">
                                        I authorize deduction of ${{ Auth::user()->card_price }} to generate this
                                        custom network encrypted
                                        processing item.
                                    </label>
                                </div>

                                <button type="submit" wire:loading.attr="disabled"
                                    class="btn btn-primary btn-sm py-2 d-flex align-items-center justify-content-center gap-2 fw-semibold">
                                    <span wire:loading.remove><i class="fe fe-credit-card"></i> Purchase Card</span>
                                    <span wire:loading><i class="fe fe-loader drop-spin"></i> Processing
                                        Request...</span>
                                </button>
                            </form>
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
</div>
