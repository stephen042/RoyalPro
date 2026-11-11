@props([
    'eyebrow' => '',
    'title' => '',
    'subtitle' => '',
])

<div class="rx-pagehead">
    <div>
        @if ($eyebrow)
            <span class="rx-pagehead__eyebrow">{!! $eyebrow !!}</span>
        @endif
        <h1 class="rx-pagehead__title">{{ $title }}</h1>
        @if ($subtitle)
            <p class="rx-pagehead__sub">{{ $subtitle }}</p>
        @endif
    </div>

    @isset($actions)
        <div class="rx-pagehead__actions">
            {{ $actions }}
        </div>
    @endisset
</div>
