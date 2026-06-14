<div id="global-loader">
    <div id="global-loader"
        class="position-fixed top-0 start-0 w-100 h-100 d-flex flex-column align-items-center justify-content-center"
        style="z-index: 1050; background-color: #0b0c10; transition: opacity 0.5s ease-in-out;">

        <!-- Spinner Area -->
        <div class="position-relative" style="width: 4rem; height: 4rem;">
            <!-- Track Ring -->
            <div class="position-absolute top-0 start-0 w-100 h-100 border border-4 rounded-circle"
                style="border-color: rgba(5, 195, 251, 0.15) !important;"></div>

            <!-- Animated Spin Ring -->
            <div class="position-absolute top-0 start-0 w-100 h-100 border border-4 border-top-0 border-end-0 border-bottom-0 rounded-circle spinner-border text-primary"
                style="border-color: #05c3fb !important; animation-duration: 0.75s;"></div>
        </div>

        <!-- Loading Message Status -->
        <p class="mt-4 small font-weight-bold text-uppercase placeholder-glow"
            style="letter-spacing: 0.15em; color: #94a3b8; font-weight: 600; animation: pulse-text 1.5s ease-in-out infinite;">
            {{ env('APP_NAME') }} Securing Connection...
        </p>
    </div>

    <!-- Inline Animation Script Helper -->
    <style>
        @keyframes pulse-text {

            0%,
            100% {
                opacity: 0.4;
            }

            50% {
                opacity: 1;
            }
        }
    </style>
</div>
