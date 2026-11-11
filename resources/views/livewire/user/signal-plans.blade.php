<div class="card-body">
    <div class="row g-3">
        @forelse ($signal_plans as $key => $data)
            <div class="col-xl-4 col-lg-6 col-md-6" wire:key="{{ $key }}">
                <div class="rx-plan">
                    <form wire:submit.throttle.1000.prevent="signal_plans({{ $data->id }})">
                        @csrf
                        <div class="rx-plan__head">
                            <span class="rx-plan__eyebrow"><i class="fe fe-activity"></i> Signal plan</span>
                            <h3 class="rx-plan__name">{{ $data->name }}</h3>
                        </div>
                        <div class="rx-plan__body">
                            <div class="rx-plan__price"><span>$</span>{{ number_format((float) $data->amount, 2) }}</div>
                            <div class="rx-plan__rows">
                                <div class="rx-plan__row">
                                    <span>Duration</span>
                                    <strong>{{ $data->duration }}</strong>
                                </div>
                                <div class="rx-plan__row">
                                    <span>Signal strength</span>
                                    <strong>{{ $data->signal_strength }}%</strong>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100 please-wait-btn" type="submit">
                                <i class="fe fe-shopping-bag"></i> Purchase plan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="rx-empty">
                    <div class="rx-empty__icon"><i class="fe fe-activity"></i></div>
                    <h3 class="rx-empty__title">No signal plans available</h3>
                    <p class="rx-empty__text">New signal packages will appear here when they are published.</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
