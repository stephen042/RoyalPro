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
                        <a href="/">
                            <img src="{{ asset('home-assets/assets/img/forex-logo.png') }}" class="header-brand-img" alt="">
                        </a>
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
                    <div class="row">
                        <livewire:auth.forget-password />
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!--END PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    @include('includes.user-scripts')

</body>

</html>
