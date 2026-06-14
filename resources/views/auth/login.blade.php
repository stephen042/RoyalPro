<!doctype html>
<html lang="en" dir="ltr">

<head>

    @include('includes.user-head')

</head>

<body class="login-img">

    <!-- BACKGROUND-IMAGE -->
    <div>
        <!-- GLOBAL-LOADER -->
        @include('includes.loader')
        <!-- /GLOBAL-LOADER -->


        <!-- PAGE -->
        <div class="page login-page">
            <div>
                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <div
                            style="display: flex; align-items: center; justify-content: center; gap: 8px; padding: 0.5rem 0; width: 100%; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">

                            <span
                                style="font-size: 1.1rem; font-weight: 800; letter-spacing: 0.04em; text-transform: uppercase; background: linear-gradient(135deg, #ffffff 30%, #a0aec0 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; drop-shadow: 0px 2px 8px rgba(0,0,0,0.5);">
                                <a href="{{ route('home') }}" style="text-decoration: none; color: inherit;">
                                    {{ env('APP_NAME') }}
                                </a>
                            </span>

                        </div>
                    </div>
                </div>
                <center>
                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show w-50 bg-dark" role="alert">
                            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
                            <span class="alert-inner--text"><strong>error!</strong>
                                {{ session('error') }}
                            </span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show w-50 bg-dark" role="alert">
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
                <div class="container-login100">
                    <div class="wrap-login100 p-0">
                        <div class="card-body">
                            <livewire:auth.login />
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center my-3">
                                <a href="javascript:void(0);" class="social-login  text-center me-4">
                                    {{-- <i class="fa fa-google"></i> --}}
                                </a>
                                <a href="javascript:void(0);" class="social-login  text-center me-4">
                                    {{-- <i class="fa fa-facebook"></i> --}}
                                </a>
                                <a href="javascript:void(0);" class="social-login  text-center">
                                    {{-- <i class="fa fa-twitter"></i> --}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- END PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    @include('includes.user-scripts')

</body>

</html>
