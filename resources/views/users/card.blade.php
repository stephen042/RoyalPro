<!doctype html>
<html lang="en" dir="ltr">

<head>

    @include('includes.user-head')

    <!-- NATIVE HARDENED INTERACTIVE STYLING SPECIFICATIONS -->
    <style>
        /* Compact structural overrides and 3D Card Engine */
        .virtual-card-workspace * {
            box-sizing: border-box;
        }

        .v-card-flip {
            max-width: 380px;
            height: 220px;
            cursor: pointer;
            perspective: 1000px;
        }

        .v-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
            transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            transform-style: preserve-3d;
        }

        .v-card-flip.flipped .v-card-inner {
            transform: rotateY(180deg);
        }

        .v-card-front,
        .v-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .v-card-front {
            /* Stacks a dark 85% opacity overlay on top of your faint asset image */
            background: linear-gradient(135deg, rgba(22, 42, 69, 0.85) 0%, rgba(2, 12, 27, 0.9) 100%),
                url("{{ asset('home-assets/assets/img/forex-logo.png') }}");
            background-size: contain;
            background-position: center;
        }

        .v-card-back {
            background: linear-gradient(135deg, #09131e 0%, #15202b 100%);
            transform: rotateY(180deg);
        }

        .card-bg-pattern {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0.08;
            pointer-events: none;
            background-image: radial-gradient(circle at 20% 30%, #ffffff 1px, transparent 1px), radial-gradient(circle at 75% 60%, #ffffff 1px, transparent 1px);
            background-size: 16px 16px;
        }

        .v-card-content {
            position: relative;
            z-index: 2;
            width: 100%;
            height: 100%;
            padding: 16px 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-tagline {
            color: #ffffff;
            font-weight: 700;
            font-size: 12px;
            letter-spacing: 1px;
        }

        .card-sub-tag {
            font-size: 9px;
            text-transform: uppercase;
        }

        .brand-logo-glow {
            color: #ffffff;
            display: flex;
            align-items: center;
            text-shadow: 0 0 8px rgba(255, 255, 255, 0.4);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .card-chip {
            width: 38px;
            height: 28px;
            background: linear-gradient(135deg, #ecd175 0%, #c49926 100%);
            border-radius: 4px;
            margin-bottom: 8px;
            box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.3);
            position: relative;
        }

        .v-card-number {
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 1.5px;
            font-family: 'Courier New', monospace;
        }

        .meta-label {
            display: block;
            color: rgba(255, 255, 255, 0.45);
            font-size: 8px;
            text-transform: uppercase;
        }

        .meta-value {
            font-size: 11px;
            font-weight: 500;
        }

        .card-vendor-icon {
            width: 32px;
            height: 20px;
            position: relative;
        }

        .card-vendor-icon::before,
        .card-vendor-icon::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            opacity: 0.8;
        }

        .card-vendor-icon::before {
            background-color: #eb001b;
            left: 0;
        }

        .card-vendor-icon::after {
            background-color: #ff5f00;
            right: 12px;
        }

        /* Card Backside Elements */
        .card-magnetic-strip {
            width: 100%;
            height: 34px;
            background-color: #0b0c10;
        }

        .signature-panel {
            background: rgba(255, 255, 255, 0.9);
            color: #111111;
            padding: 4px 8px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
            font-weight: bold;
            font-size: 11px;
            font-style: italic;
            user-select: none;
        }

        .cvv-badge {
            background-color: #ffc107;
            color: #111;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 3px;
            font-size: 11px;
        }

        .card-back-disclaimer {
            font-size: 8px;
            line-height: 1.2;
        }

        .flip-hint-text {
            color: #888888;
            font-size: 11px;
        }

        /* Tabs Configuration Engine */
        .custom-tab-btn {
            flex: 1;
            padding: 12px 16px;
            background: none;
            border: none;
            outline: none;
            font-size: 13px;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            transition: all 0.2s ease;
        }

        .custom-tab-btn:hover {
            color: var(--bs-heading-color, #000);
            background-color: rgba(0, 0, 0, 0.02);
        }

        .custom-tab-btn.active {
            color: #3858f9;
            background: transparent;
            border-bottom: 2px solid #3858f9;
        }

        .tab-panel-view {
            display: none;
        }

        .tab-panel-view.active {
            display: block;
        }

        /* View Table Details */
        .panel-main-title {
            font-size: 14px;
            font-weight: 600;
        }

        .custom-status-badge {
            background-color: rgba(40, 167, 69, 0.08);
            color: #28a745;
            font-weight: 600;
            padding: 4px 10px;
            font-size: 11px;
            border-radius: 50px;
            display: inline-flex;
            align-items: center;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            background-color: #28a745;
            border-radius: 50%;
            margin-right: 5px;
        }

        .pure-details-table td {
            font-size: 12.5px;
            border-bottom-color: rgba(0, 0, 0, 0.04) !important;
        }

        .lbl-col {
            width: 28%;
        }

        .mono-text {
            font-family: monospace;
            font-weight: 700;
        }

        .custom-info-alert {
            background-color: rgba(56, 88, 249, 0.04);
        }

        .style-line-height {
            line-height: 1.3;
        }

        /* MEDIA BREAKPOINT ENHANCEMENTS */
        @media (max-width: 767.98px) {
            .v-card-flip {
                max-width: 100%;
                height: 200px;
            }

            .v-card-number {
                font-size: 14px;
            }

            .lbl-col {
                width: 35%;
            }
        }

        @media (max-width: 575.98px) {
            .custom-tab-btn {
                font-size: 12px;
                padding: 10px;
            }
        }
    </style>
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
            <livewire:user.virtual-card-manager />
            <!-- APP-CONTENT END -->
        </div>


        <!-- FOOTER -->
        @include('includes.user-footer')
        <!-- FOOTER END -->
        <!-- APP-NAv -->
        @include('includes.user-nav-down')
        <!-- /APP-NAv -->

    </div>

    <!-- CODE CONTROLLER SCRIPT (Handles local actions safely) -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const card = document.getElementById("virtualCard");
            const revealCvvBtn = document.getElementById("revealCvvBtn");
            const cardCvv = document.getElementById("cardCvv");
            const cvvRaw = document.getElementById("cvvRaw");

            // Flip front/back triggers on card zone click
            card.addEventListener("click", function() {
                this.classList.toggle("flipped");
            });

            // Clear event tracking bubbling specifically for nested action buttons
            if (revealCvvBtn) {
                revealCvvBtn.addEventListener("click", function(e) {
                    e.stopPropagation();
                    const icon = this.querySelector("i");
                    if (cardCvv.innerText === "***") {
                        cardCvv.innerText = cvvRaw.innerText;
                        icon.classList.replace("fe-eye", "fe-eye-off");
                    } else {
                        cardCvv.innerText = "***";
                        icon.classList.replace("fe-eye-off", "fe-eye");
                    }
                });
            }
        });

        // Native Interface Switcher Module
        function switchTab(targetPanel) {
            document.getElementById('btnDetails').classList.remove('active');
            document.getElementById('btnAcquire').classList.remove('active');
            document.getElementById('panelDetails').classList.remove('active');
            document.getElementById('panelAcquire').classList.remove('active');

            if (targetPanel === 'details') {
                document.getElementById('btnDetails').classList.add('active');
                document.getElementById('panelDetails').classList.add('active');
            } else {
                document.getElementById('btnAcquire').classList.add('active');
                document.getElementById('panelAcquire').classList.add('active');
            }
        }

        // Clipboard Copy Helper System
        function copyText(text, successMsg) {
            navigator.clipboard.writeText(text).then(() => {
                alert(successMsg);
            }).catch(err => {
                console.error('Failed to copy info: ', err);
            });
        }
    </script>

    <script>
        function switchTab(target) {
            const detailsPanel = document.getElementById('panelDetails');
            const acquirePanel = document.getElementById('panelAcquire');
            const detailsBtn = document.getElementById('btnDetails');
            const acquireBtn = document.getElementById('btnAcquire');

            if (target === 'details' && detailsPanel) {
                detailsPanel.classList.add('active');
                if (acquirePanel) acquirePanel.classList.remove('active');
                if (detailsBtn) detailsBtn.classList.add('active');
                if (acquireBtn) acquireBtn.classList.remove('active');
            } else if (target === 'acquire' && acquirePanel) {
                acquirePanel.classList.add('active');
                if (detailsPanel) detailsPanel.classList.remove('active');
                if (acquireBtn) acquireBtn.classList.add('active');
                if (detailsBtn) detailsBtn.classList.remove('active');
            }
        }
    </script>

    <!-- CONTAINER END -->
    @include('includes.user-scripts')>

</body>

</html>
