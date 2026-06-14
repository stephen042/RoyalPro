<div class="row">
    <!-- TRADING PROGRESS CARD -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 mb-4">
        <div class="card overflow-hidden"
            style="background: linear-gradient(145deg, #1e1e2d, #151521); border: 1px solid #2b2b40; border-radius: 16px; box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);">
            <div class="card-body" style="padding: 1.5rem;">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Live Account Pill Badge -->
                        <div class="d-flex align-items-center mb-3" style="gap: 8px;">
                            <span class="d-inline-flex align-items-center rounded-pill"
                                style="background: rgba(16, 185, 129, 0.15); color: #10b981; border: 1px solid rgba(16, 185, 129, 0.3); padding: 4px 12px; font-size: 0.75rem; font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase;">
                                <span
                                    style="width: 6px; height: 6px; background-color: #10b981; border-radius: 50%; margin-right: 6px; display: inline-block; animation: pulse 2s infinite;"></span>
                                Live account
                            </span>
                        </div>

                        <p class="mb-2"
                            style="color: #a0aec0; font-weight: 500; font-size: 0.9rem; letter-spacing: 0.02em;">
                            Trading Progress <span
                                style="color: #05c3fb; font-weight: 700;">{{ $user_data->progress_bar_status }}%</span>
                        </p>

                        <!-- Fixed Progress Bar Frame -->
                        <div class="progress progress-md"
                            style="height: 12px; background-color: #6060bd; border-radius: 6px; overflow: hidden;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                style="width: {{ $user_data->progress_bar_status }}%; background: #05c3fb; transition: width 0.6s ease;"
                                aria-valuenow="{{ $user_data->progress_bar_status }}" aria-valuemin="0"
                                aria-valuemax="100">
                            </div>
                        </div>
                    </div>

                    <div class="col col-auto">
                        <div class="counter-icon d-flex align-items-center justify-content-center"
                            style="background: linear-gradient(135deg, rgba(5, 195, 251, 0.2), rgba(98, 89, 202, 0.2)); border: 1px solid rgba(5, 195, 251, 0.4); width: 56px; height: 56px; border-radius: 14px; box-shadow: 0 0 20px rgba(5, 195, 251, 0.15);">
                            <!-- Trending Up Inline SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="#05c3fb" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ACCOUNT SUMMARY METRICS LAYER -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
        <div class="card overflow-hidden"
            style="background: linear-gradient(145deg, #1e1e2d, #151521); border: 1px solid #2b2b40; border-radius: 16px; box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);">
            <div class="card-header"
                style="border-bottom: 1px solid #2b2b40; padding: 1.25rem 1.5rem; background: transparent;">
                <div class="card-title"
                    style="color: #ffffff; font-weight: 700; font-size: 1.1rem; letter-spacing: 0.03em;">Account Summary
                </div>
            </div>

            <div class="card-body" style="padding: 0;">
                <div class="row g-0">
                    <!-- Total Earnings Grid Item -->
                    <div class="col-sm-6 col-md-6 col-xl-3"
                        style="border-right: 1px solid #2b2b40; border-bottom: 1px solid #2b2b40; padding: 1.5rem;">
                        <div class="d-flex align-items-start" style="gap: 14px;">
                            <div
                                style="background: rgba(16, 185, 129, 0.1); border-radius: 10px; padding: 10px; display: flex; align-items: center; justify-content: center;">
                                <!-- Wallet Positive SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 12V8H6a2 2 0 0 1-2-2c0-1.1.9-2 2-2h12v4"></path>
                                    <path d="M4 6v12c0 1.1.9 2 2 2h14v-4"></path>
                                    <path d="M18 12a2 2 0 0 0-2 2c0 1.1.9 2 2 2h4v-4h-4z"></path>
                                </svg>
                            </div>
                            <div>
                                <p
                                    style="color: #a0aec0; font-size: 0.85rem; font-weight: 500; margin-bottom: 4px; text-transform: uppercase; letter-spacing: 0.05em;">
                                    Total Earnings</p>
                                <h4
                                    style="color: #ffffff; font-weight: 700; font-size: 1.4rem; margin: 0; font-family: 'SF Pro Display', -apple-system, sans-serif;">
                                    $ {{ number_format($user_data->earnings_balance, 2) }}</h4>
                            </div>
                        </div>
                    </div>

                    <!-- Total Balance Grid Item -->
                    <div class="col-sm-6 col-md-6 col-xl-3"
                        style="border-right: 1px solid #2b2b40; border-bottom: 1px solid #2b2b40; padding: 1.5rem;">
                        <div class="d-flex align-items-start" style="gap: 14px;">
                            <div
                                style="background: rgba(5, 195, 251, 0.1); border-radius: 10px; padding: 10px; display: flex; align-items: center; justify-content: center;">
                                <!-- Primary Wallet SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="#05c3fb" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="4" width="20" height="16" rx="2" ry="2">
                                    </rect>
                                    <line x1="12" y1="11" x2="12" y2="13"></line>
                                    <line x1="8" y1="12" x2="16" y2="12"></line>
                                </svg>
                            </div>
                            <div>
                                <p
                                    style="color: #a0aec0; font-size: 0.85rem; font-weight: 500; margin-bottom: 4px; text-transform: uppercase; letter-spacing: 0.05em;">
                                    Total Balance</p>
                                <h4 style="color: #ffffff; font-weight: 700; font-size: 1.4rem; margin: 0;">$
                                    {{ number_format($user_data->balance, 2) }}</h4>
                            </div>
                        </div>
                    </div>

                    <!-- Subscription Balance Grid Item -->
                    <div class="col-sm-6 col-md-6 col-xl-3"
                        style="border-right: 1px solid #2b2b40; border-bottom: 1px solid #2b2b40; padding: 1.5rem;">
                        <div class="d-flex align-items-start" style="gap: 14px;">
                            <div
                                style="background: rgba(147, 51, 234, 0.1); border-radius: 10px; padding: 10px; display: flex; align-items: center; justify-content: center;">
                                <!-- Layers Stack SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="#a855f7" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <polygon
                                        points="12 2 2 7 12 12 22 7 12 2</polygon>
                                    <polygon points="2
                                        17 12 22 22 17"></polygon>
                                    <polygon points="2 12 12 17 22 12"></polygon>
                                </svg>
                            </div>
                            <div>
                                <p
                                    style="color: #a0aec0; font-size: 0.85rem; font-weight: 500; margin-bottom: 4px; text-transform: uppercase; letter-spacing: 0.05em;">
                                    Subscription Bal</p>
                                <h4 style="color: #ffffff; font-weight: 700; font-size: 1.4rem; margin: 0;">$
                                    {{ number_format($user_data->sub_balance, 2) }}</h4>
                            </div>
                        </div>
                    </div>

                    <!-- Total Withdrawals Grid Item -->
                    <div class="col-sm-6 col-md-6 col-xl-3"
                        style="border-bottom: 1px solid #2b2b40; padding: 1.5rem;">
                        <div class="d-flex align-items-start" style="gap: 14px;">
                            <div
                                style="background: rgba(239, 68, 68, 0.1); border-radius: 10px; padding: 10px; display: flex; align-items: center; justify-content: center;">
                                <!-- Cash Out Arrow SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="7" y1="17" x2="17" y2="7"></line>
                                    <polyline points="7 7 17 7 17 17"></polyline>
                                </svg>
                            </div>
                            <div>
                                <p
                                    style="color: #a0aec0; font-size: 0.85rem; font-weight: 500; margin-bottom: 4px; text-transform: uppercase; letter-spacing: 0.05em;">
                                    Total Withdrawals</p>
                                <h4 style="color: #ffffff; font-weight: 700; font-size: 1.4rem; margin: 0;">$
                                    {{ number_format($sum_withdrawal, 2) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Extra Inline Component Styles for Live Pulse Effects -->
    <style>
        @keyframes pulse {
            0% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
            }

            70% {
                transform: scale(1);
                box-shadow: 0 0 0 6px rgba(16, 185, 129, 0);
            }

            100% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }
    </style>
</div>
