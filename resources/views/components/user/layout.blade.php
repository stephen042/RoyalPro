@props(['title' => ''])

<!doctype html>
<html lang="en" dir="ltr">

<head>
    @include('includes.user-head')
    @stack('styles')
</head>

<body class="app sidebar-mini ltr light-mode rx-app">

    @include('includes.loader')

    <div class="rx-shell">
        <x-user.sidebar />

        <div class="rx-main">
            <x-user.topbar />

            <main class="rx-content" id="top">
                <div class="rx-container">
                    @include('includes.flash-alerts')
                    {{ $slot }}
                </div>
            </main>

            @include('includes.user-footer')
        </div>
    </div>

    <x-user.mobile-nav />

    @include('includes.user-scripts')

</body>

</html>
