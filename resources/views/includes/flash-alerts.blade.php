@php
    $flashMessages = [];

    if (session()->has('error')) {
        $flashMessages[] = ['type' => 'danger', 'icon' => 'fe-alert-circle', 'title' => 'Action failed.', 'text' => session('error')];
    }

    if (session()->has('success')) {
        $flashMessages[] = ['type' => 'success', 'icon' => 'fe-check-circle', 'title' => 'Success.', 'text' => session('success')];
    }
@endphp

@if (count($flashMessages))
    <div class="rx-alerts">
        @foreach ($flashMessages as $flash)
            <div class="alert alert-{{ $flash['type'] }} alert-dismissible fade show" role="alert">
                <span class="alert-inner--icon"><i class="fe {{ $flash['icon'] }}"></i></span>
                <span class="alert-inner--text"><strong>{{ $flash['title'] }}</strong> {{ $flash['text'] }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    </div>
@endif
