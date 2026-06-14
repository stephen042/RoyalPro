<!doctype html>
<html lang="en" dir="ltr">

<head>

    @include('includes.user-head')

</head>

<body class="app sidebar-mini ltr light-mode">

    <!-- GLOBAL-LOADER -->
    @include('includes.loader')
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
                        <div class="page-header">
                            <div>
                                <h1 class="page-title">Deposit | Fund your trading account</h1>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('user_dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Deposit</li>
                                </ol>
                            </div>
                        </div>
                        <div class="row row-card" style="margin-bottom: 1.5rem;">
                            <div class="card-body col-xl-10 col-lg-10 col-sm-12"
                                style="background: linear-gradient(145deg, #1e1e2d, #151521); border: 1px solid #2b2b40; border-radius: 16px; padding: 1.5rem; box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);">

                                <!-- Modernized Title Header -->
                                <div class="card-title mb-4">
                                    <div class="d-flex align-items-center"
                                        style="background: rgba(5, 195, 251, 0.08); border: 1px solid rgba(5, 195, 251, 0.2); color: #ffffff; padding: 12px 16px; border-radius: 12px; gap: 12px;">
                                        <!-- Calculator Line SVG -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="#05c3fb" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="4" y="2" width="16" height="20" rx="2"
                                                ry="2"></rect>
                                            <line x1="9" y1="22" x2="15" y2="22"></line>
                                            <line x1="8" y1="6" x2="16" height="6"></line>
                                            <line x1="16" y1="14" x2="16" y2="18"></line>
                                            <path
                                                d="M16 10h.01M12 10h.01M8 10h.01M12 14h.01M8 14h.01M12 18h.01M8 18h.01">
                                            </path>
                                        </svg>
                                        <span
                                            style="font-weight: 600; font-size: 0.95rem; letter-spacing: 0.02em; color: #e2e8f0;">Deposit Your Funds </span>
                                    </div>
                                </div>

                                <!-- Pure Vector Crypto Cards Layout (Strictly horizontal on mobile & desktop) -->
                                <div class="d-flex flex-row align-items-center" style="gap: 12px; width: 100%;">

                                    <!-- BITCOIN (BTC) VECTOR CARD -->
                                    <div class="d-flex flex-column align-items-center justify-content-center"
                                        style="flex: 1; background: rgba(247, 147, 26, 0.04); border: 1px solid rgba(247, 147, 26, 0.15); border-radius: 14px; padding: 16px 8px; text-align: center; min-width: 0;">
                                        <div
                                            style="background: rgba(247, 147, 26, 0.1); width: 44px; height: 44px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 8px; box-shadow: 0 0 15px rgba(247, 147, 26, 0.15);">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="#f7931a" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <path
                                                    d="M9 8h4.5a2.5 2.5 0 0 1 0 5H9m0-5v5m0 0h5.5a2.5 2.5 0 0 1 0 5H9m0-5v5M11 6v2M13 6v2M11 16v2M13 16v2">
                                                </path>
                                            </svg>
                                        </div>
                                        <span
                                            style="color: #ffffff; font-weight: 700; font-size: 0.85rem; letter-spacing: 0.03em;">BTC</span>
                                        <span
                                            style="color: #f7931a; font-size: 0.7rem; font-weight: 500; margin-top: 2px;">Bitcoin</span>
                                    </div>

                                    <!-- ETHEREUM (ETH) VECTOR CARD -->
                                    <div class="d-flex flex-column align-items-center justify-content-center"
                                        style="flex: 1; background: rgba(98, 89, 202, 0.04); border: 1px solid rgba(98, 89, 202, 0.18); border-radius: 14px; padding: 16px 8px; text-align: center; min-width: 0;">
                                        <div
                                            style="background: rgba(98, 89, 202, 0.1); width: 44px; height: 44px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 8px; box-shadow: 0 0 15px rgba(98, 89, 202, 0.15);">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="#6259ca" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <path d="M12 6l4.5 4.5L12 15 7.5 10.5 12 6z"></path>
                                                <path d="M12 15v3"></path>
                                                <path d="M7.5 10.5L12 12l4.5-1.5"></path>
                                            </svg>
                                        </div>
                                        <span
                                            style="color: #ffffff; font-weight: 700; font-size: 0.85rem; letter-spacing: 0.03em;">ETH</span>
                                        <span
                                            style="color: #6259ca; font-size: 0.7rem; font-weight: 500; margin-top: 2px;">Ethereum</span>
                                    </div>

                                    <!-- LITECOIN (LTC) VECTOR CARD -->
                                    <div class="d-flex flex-column align-items-center justify-content-center"
                                        style="flex: 1; background: rgba(5, 195, 251, 0.04); border: 1px solid rgba(5, 195, 251, 0.18); border-radius: 14px; padding: 16px 8px; text-align: center; min-width: 0;">
                                        <div
                                            style="background: rgba(5, 195, 251, 0.1); width: 44px; height: 44px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 8px; box-shadow: 0 0 15px rgba(5, 195, 251, 0.15);">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="#05c3fb" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="10" y1="16" x2="14" y2="8">
                                                </line>
                                                <path d="M9 14h5"></path>
                                            </svg>
                                        </div>
                                        <span
                                            style="color: #ffffff; font-weight: 700; font-size: 0.85rem; letter-spacing: 0.03em;">LTC</span>
                                        <span
                                            style="color: #05c3fb; font-size: 0.7rem; font-weight: 500; margin-top: 2px;">Litecoin</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <livewire:user.deposit />
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


    <script>
        function copyFunction() {
            var r = document.createRange();
            r.selectNode(document.getElementById('addressCopy'));
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(r);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();

            alert('copied');
        }

        // var qr_data = document.getElementById('addressCopy')
        var qrcode = new QRCode("qrcode",
            "hsywfdwvfwfw");
    </script>

</body>

</html>
