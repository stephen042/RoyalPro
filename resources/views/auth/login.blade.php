<!doctype html>
<html lang="en" dir="ltr">

<head>

    @include('includes.user-head')

</head>

<body class="login-img"
    style="background-image: url('https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=1920&q=80](https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">

    <div
        style="min-height: 100vh; width: 100%; background: radial-gradient(circle at center, rgba(15, 15, 26, 0.40) 0%, rgba(10, 10, 15, 0.85) 100%); display: flex; flex-column; align-items: center; justify-content: center; padding: 20px 0;">

        @include('includes.loader')

        <div class="container" style="max-width: 440px; width: 100%; padding: 0 16px;">

            <div style="text-align: center; margin-bottom: 24px;">
                <div style="display: flex; align-items: center; justify-content: center; gap: 10px; width: 100%;">

                    <div
                        style="display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; background: rgba(5, 195, 251, 0.1); border: 1px solid rgba(5, 195, 251, 0.3); border-radius: 8px; backdrop-filter: blur(4px);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="#05c3fb" stroke-width="2.5" stroke-linecap="round"
                            stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </div>

                    <span
                        style="font-size: 1.35rem; font-weight: 800; letter-spacing: 0.06em; text-transform: uppercase; background: linear-gradient(135deg, #ffffff 40%, #cbd5e1 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                        <a href="{{ route('home') }}"
                            style="text-decoration: none; color: inherit; transition: opacity 0.2s;"
                            onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">
                            {{ env('APP_NAME') }}
                        </a>
                    </span>
                </div>
            </div>

            <div style="width: 100%; margin-bottom: 20px;">
                @if (session()->has('error'))
                    <div class="alert alert-dismissible fade show" role="alert"
                        style="background: rgba(239, 68, 68, 0.12); border: 1px solid rgba(239, 68, 68, 0.25); color: #ef4444; border-radius: 12px; backdrop-filter: blur(8px); font-size: 0.85rem; padding: 14px 40px 14px 14px; margin: 0;">
                        <span style="display: inline-flex; align-items: center; gap: 6px; font-weight: 600;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>
                            Error:
                        </span> {{ session('error') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"
                            style="padding: 1.15rem 1rem; opacity: 0.5; font-size: 0.75rem;"></button>
                    </div>
                @endif

                @if (session()->has('success'))
                    <div class="alert alert-dismissible fade show" role="alert"
                        style="background: rgba(34, 197, 94, 0.12); border: 1px solid rgba(34, 197, 94, 0.25); color: #22c55e; border-radius: 12px; backdrop-filter: blur(8px); font-size: 0.85rem; padding: 14px 40px 14px 14px; margin: 0;">
                        <span style="display: inline-flex; align-items: center; gap: 6px; font-weight: 600;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Success:
                        </span> {{ session('success') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"
                            style="padding: 1.15rem 1rem; opacity: 0.5; font-size: 0.75rem;"></button>
                    </div>
                @endif
            </div>

            <div
                style="background: rgba(20, 20, 35, 0.55); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 20px; box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); overflow: hidden; width: 100%;padding: auto 0;">

                <div>
                    <livewire:auth.login />
                </div>

            </div>
        </div>
    </div> @include('includes.user-scripts')

</body>

</html>
