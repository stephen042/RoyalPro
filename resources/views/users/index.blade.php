<!doctype html>
<html lang="en" dir="ltr">

<head>

    @include('includes.user-head')

</head>

<body class="app sidebar-mini ltr light-mode">

    <!-- GLOBAL-LOADER -->
    {{-- @include('includes.loader') --}}
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- APP-NAv -->
            @include('includes.user-nav')
            <!-- /APP-NAv -->

            <!--APP-SIDEBAR-->
            @include('includes.user-sidebar')
            <!--/APP-SIDEBAR-->

            <!-- APP-CONTENT OPEN -->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">
                        <center>
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

                        <!-- PAGE-HEADER -->
                        <div
                            style="display: flex; align-items: center; justify-content: space-between; padding: 0.75rem 0 1.25rem 0; width: 100%; border-bottom: 1px solid rgba(255, 255, 255, 0.05); font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

                            <div style="min-width: 0;">
                                <h1
                                    style="color: #ffffff; font-weight: 700; font-size: 1.25rem; margin: 0; letter-spacing: -0.02em; line-height: 1.2;">
                                    Welcome, {{ auth()->user()->first_name }}
                                </h1>
                                <div
                                    style="display: flex; align-items: center; gap: 4px; font-size: 0.75rem; color: #64748b; margin-top: 2px;">
                                    <span style="opacity: 0.8;">Home</span>
                                    <span style="color: #334155; font-size: 0.65rem;">/</span>
                                    <span style="color: #05c3fb; font-weight: 500;">Dashboard</span>
                                </div>
                            </div>

                            <div style="display: flex; align-items: center; gap: 8px; flex-shrink: 0;">

                                @if (auth()->user()->verify_status == 0)
                                    <div title="Account Unverified"
                                        style="display: flex; align-items: center; gap: 6px; height: 30px; padding: 0 10px; border-radius: 8px; background: rgba(239, 68, 68, 0.08); border: 1px solid rgba(239, 68, 68, 0.15); color: #ef4444; font-size: 0.7rem; font-weight: 700; letter-spacing: 0.03em;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="15" y1="9" x2="9" y2="15"></line>
                                            <line x1="9" y1="9" x2="15" y2="15"></line>
                                        </svg>
                                        <span style="text-transform: uppercase;">Unverified</span>
                                    </div>
                                @else
                                    <div title="Account Verified"
                                        style="display: flex; align-items: center; gap: 6px; height: 30px; padding: 0 10px; border-radius: 8px; background: rgba(34, 197, 94, 0.08); border: 1px solid rgba(34, 197, 94, 0.15); color: #22c55e; font-size: 0.7rem; font-weight: 700; letter-spacing: 0.03em;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        <span style="text-transform: uppercase;">Verified</span>
                                    </div>
                                @endif

                                <div title="Current Tier Status"
                                    style="display: flex; align-items: center; gap: 6px; height: 30px; padding: 0 10px; border-radius: 8px; font-size: 0.7rem; font-weight: 700; letter-spacing: 0.03em;
             background: {{ auth()->user()->account_status == 'None' ? 'rgba(255, 255, 255, 0.03)' : 'rgba(5, 195, 251, 0.08)' }}; 
             color: {{ auth()->user()->account_status == 'None' ? '#94a3b8' : '#05c3fb' }};
             border: 1px solid {{ auth()->user()->account_status == 'None' ? 'rgba(255, 255, 255, 0.08)' : 'rgba(5, 195, 251, 0.15)' }};">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span>{{ auth()->user()->account_status }}</span>
                                </div>

                                <a href="{{ route('user_deposit') }}"
                                    style="display: flex; align-items: center; justify-content: center; width: 30px; height: 30px; border-radius: 8px; background: #05c3fb; color: #0d0d14; border: none; text-decoration: none; transition: transform 0.15s ease, background-color 0.15s ease;"
                                    onmouseover="this.style.transform='scale(0.95)'; this.style.backgroundColor='#02a9db';"
                                    onmouseout="this.style.transform='scale(1)'; this.style.backgroundColor='#05c3fb';">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </a>

                            </div>
                        </div>

                        @if (auth()->user()->admin_messages->count() > 0)
                            <div class="admin-message card overflow-hidden mb-4"
                                style="background: linear-gradient(145deg, rgba(239, 68, 68, 0.08), rgba(21, 21, 33, 0.6)); border: 1px solid rgba(131, 239, 68, 0.25); border-radius: 14px; box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.4); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px);">

                                <div class="card-body position-relative"
                                    style="padding: 1.5rem 4.5rem 1.5rem 1.5rem;">

                                    <button
                                        class="close-message-btn btn d-flex align-items-center justify-content-center"
                                        title="Dismiss"
                                        style="position: absolute; top: 1rem; right: 1rem; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); color: #a0aec0; padding: 6px; border-radius: 8px; transition: all 0.2s ease; width: 32px; height: 32px;"
                                        onmouseover="this.style.background='rgba(239, 68, 68, 0.2)'; this.style.color='#ef4444'; this.style.borderColor='rgba(239, 68, 68, 0.4)';"
                                        onmouseout="this.style.background='rgba(255, 255, 255, 0.05)'; this.style.color='#a0aec0'; this.style.borderColor='rgba(255, 255, 255, 0.1)';">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="18" y1="6" x2="6" y2="18">
                                            </line>
                                            <line x1="6" y1="6" x2="18" y2="18">
                                            </line>
                                        </svg>
                                    </button>

                                    <div class="d-flex align-items-center mb-3" style="gap: 12px;">
                                        <div
                                            style="background: rgba(74, 239, 68, 0.15); border-radius: 10px; padding: 8px; display: flex; align-items: center; justify-content: center; border: 1px solid #88ef434d;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none" stroke="#44ef77" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                            </svg>
                                        </div>
                                        <h6 class="card-title"
                                            style="color: #ffffff; font-weight: 700; font-size: 1rem; margin: 0; letter-spacing: 0.02em;">
                                            {{ auth()->user()->admin_messages->first()->title ?? 'System Notification' }}
                                        </h6>
                                    </div>

                                    <p class="card-text custom-scrollbar"
                                        style="color: #cbd5e1; font-size: 0.9rem; line-height: 1.6; max-height: 200px; overflow-y: auto; padding-right: 8px; margin: 0;">
                                        {{ auth()->user()->admin_messages->first()->message ?? 'No message content available.' }}
                                    </p>
                                </div>
                            </div>

                            <style>
                                .custom-scrollbar::-webkit-scrollbar {
                                    width: 6px;
                                }

                                .custom-scrollbar::-webkit-scrollbar-track {
                                    background: rgba(255, 255, 255, 0.02);
                                    border-radius: 10px;
                                }

                                .custom-scrollbar::-webkit-scrollbar-thumb {
                                    background: rgba(239, 68, 68, 0.3);
                                    border-radius: 10px;
                                }

                                .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                                    background: rgba(239, 68, 68, 0.5);
                                }
                            </style>
                        @endif


                        <livewire:user.account-summary />
                        <!-- PAGE-HEADER END -->
                        <div class="row row-cards">
                            <div class="col-lg-12 col-sm-12" style="overflow-x:scroll;">
                                <!-- TradingView Widget BEGIN -->
                                <div class="tradingview-widget-container" style="height:100%" ;width:100%>
                                    <div id="analytics-platform-chart-demo"
                                        style="height:calc(100% - 32px);width:100%;"></div>
                                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/"
                                            rel="noopener nofollow" target="_blank"><span
                                                class="blue-text"></span></a>
                                    </div>
                                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                                    <script type="text/javascript">
                                        new TradingView.widget({
                                            "container_id": "analytics-platform-chart-demo",
                                            "width": "100%",
                                            "height": "600",
                                            "autosize": false,
                                            "symbol": "FX:EURUSD",
                                            "interval": "D",
                                            "timezone": "exchange",
                                            "theme": "dark",
                                            "style": "0",
                                            "withdateranges": true,
                                            "allow_symbol_change": true,
                                            "save_image": false,
                                            "details": true,
                                            "hotlist": true,
                                            "calendar": true,
                                            "locale": "en"
                                        });
                                    </script>
                                </div>
                                <!-- TradingView Widget END -->
                            </div>
                        </div>
                        <hr>
                        <!-- <br> -->
                        <!-- trade tab -->
                        <div class="row row-cards flex justify-content-around p-3">
                            <div class="card col-xl-10 col-lg-10 col-sm-12">
                                <div class="card-body p-1">
                                    <div class="panel panel-primary">
                                        <div class=" tab-menu-heading ">
                                            <div class="">
                                                <!-- Tabs -->
                                                <ul class="nav panel-tabs ps-2 pe-2 flex justify-content-around"
                                                    style="background-color: #161616;border-radius: 10px">
                                                    <li>
                                                        <a style="color: #ADADAD;font-weight: bold;font-family:'Roboto', sans-serif;"
                                                            href="#tab5" class="active btn m-1 p-2 px-5"
                                                            id="tab-5" data-bs-toggle="tab">Buy
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a style="color: #ADADAD;font-weight: bold;font-family:'Roboto', sans-serif;"
                                                            href="#tab6" class="btn m-1 p-2 px-5"
                                                            data-bs-toggle="tab">Sell

                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="panel-body tabs-menu-body">
                                            <div class="tab-content">
                                                <div class="tab-pane active " id="tab5">
                                                    <livewire:user.buy-trade />
                                                </div>
                                                <div class="tab-pane " id="tab6">
                                                    <livewire:user.sell-trade />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
            <!-- APP-CONTENT END -->
        </div>

        <!-- FOOTER -->
        @include('includes.user-footer')
        <!-- FOOTER END -->

        <!-- APP-NAv -->
        @include('includes.user-nav-down')
        <!-- /APP-NAv -->
    </div>
    <!-- CONTAINER END -->
    @include('includes.user-scripts')

    <!-- JS to handle Close -->
    <script>
        document.querySelectorAll('.close-message-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const card = this.closest('.admin-message');
                if (card) card.remove();
            });
        });
    </script>
</body>

</html>
