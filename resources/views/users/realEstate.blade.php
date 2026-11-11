<x-user.layout title="Real Estate">

    @php
        $properties = [
            [
                'title' => 'Bridge Labs at Pegasus Park',
                'image' => 'first-img.png',
                'description' => 'Life science redevelopment within a thriving new biotech-focused campus in Dallas, recognized as one of the top emerging life science markets.',
                'minimum' => '$12K',
                'roi' => '85%',
                'strategy' => 'Fixed income',
                'modal' => 'bridge',
                'documents' => [
                    'Site Plan' => 'assets/pdf/bridge/site-plans.pdf',
                    'Organizational Chart' => 'assets/pdf/bridge/organizational-chart.pdf',
                    'Sponsor Track Record' => 'assets/pdf/bridge/sponsor-track-record.pdf',
                ],
            ],
            [
                'title' => 'Go Store It Nashville',
                'image' => 'second-img.png',
                'description' => "Class A self-storage development in one of Nashville's fastest growing suburbs with constrained supply and a high barrier to entry.",
                'minimum' => '$15K',
                'roi' => '85%',
                'strategy' => 'Fixed income',
                'modal' => 'nashville',
                'documents' => [
                    'Investment Deck' => 'assets/pdf/class/floor-plans.pdf',
                    'Floor Plan' => 'assets/pdf/class/investment-deck.pdf',
                    'Organizational Chart' => 'assets/pdf/class/organizational-chart.pdf',
                    'Sponsor Track Record' => 'assets/pdf/class/sponsor-track-record.pdf',
                ],
            ],
            [
                'title' => 'Palmetto Industrial Park',
                'image' => 'third-img.png',
                'description' => 'Acquisition of a newly constructed three-building industrial property, already garnering interest from prospective tenants.',
                'minimum' => '$25K',
                'roi' => '78%',
                'strategy' => 'Fixed income',
                'modal' => 'palmetto',
                'documents' => [
                    'Webinar Deck' => 'assets/pdf/Palmetto/investment-deck.pdf',
                    'Demographics' => 'assets/pdf/Palmetto/demographics.pdf',
                    'Organizational Chart' => 'assets/pdf/Palmetto/organizational-chart.pdf',
                    'Sponsor Track Record' => 'assets/pdf/Palmetto/sponsor-track-record.pdf',
                ],
            ],
            [
                'title' => 'Hilton Philadelphia City Avenue',
                'image' => 'fourth-img.png',
                'description' => 'Discounted acquisition of a recently renovated hotel property in Philadelphia with below-market, assumable debt.',
                'minimum' => '$33K',
                'roi' => '68.7%',
                'strategy' => 'Growth & income',
                'modal' => 'hilton',
                'documents' => [
                    'Homewood Floor Plan' => 'assets/pdf/Hilton/hilton-floor-plans.pdf',
                    'Hilton Floor Plans' => 'assets/pdf/Hilton/homewood-floor-plans.pdf',
                    'Organizational Chart' => 'assets/pdf/Hilton/organizational-chart.pdf',
                ],
            ],
            [
                'title' => 'Fabian Labs, Palo Alto',
                'image' => 'fifth-img.png',
                'description' => 'Two-building life science conversion in the heart of Silicon Valley and minutes from Stanford University, one of the top U.S. research institutions.',
                'minimum' => '$24K',
                'roi' => '57%',
                'strategy' => 'Growth & income',
                'modal' => 'fabian',
                'documents' => [
                    'Investment Deck' => 'assets/pdf/Fabian/investment-deck.pdf',
                    'Demographics' => 'assets/pdf/Fabian/demographic-deck.pdf',
                    'Sponsor Track Record' => 'assets/pdf/Fabian/sponsor-track-record.pdf',
                ],
            ],
            [
                'title' => 'The Mirage - Texas State Student Housing',
                'image' => 'sixth.png',
                'description' => 'A Texas State University student housing acquisition assuming below-market fixed-rate debt, with a renovation and rebranding strategy to seek higher rents and NOI.',
                'minimum' => '$32.5K',
                'roi' => '84.35%',
                'strategy' => 'Growth & income',
                'modal' => 'mirage',
                'documents' => [
                    'Investment Deck' => 'assets/pdf/Mirage/investment-deck.pdf',
                    'Demographics' => 'assets/pdf/Mirage/demographics.pdf',
                    'Floor Plans' => 'assets/pdf/Mirage/floor-plans.pdf',
                ],
            ],
        ];
    @endphp

    <x-user.page-head
        eyebrow="<i class='fe fe-home'></i> Investments"
        title="Real estate"
        subtitle="Explore selected property opportunities and review the supporting documents.">
        <x-slot:actions>
            <a href="{{ route('user_deposit') }}" class="btn btn-primary">
                <i class="fe fe-plus"></i> Add funds
            </a>
        </x-slot:actions>
    </x-user.page-head>

    <div class="row g-4">
        @foreach ($properties as $property)
            <div class="col-xl-6">
                <div class="rx-property">
                    <div class="rx-property__media">
                        <img src="{{ URL('assets/images/realEstate/' . $property['image']) }}"
                            alt="{{ $property['title'] }}">
                        <span class="rx-badge rx-badge--success rx-property__badge">Open</span>
                    </div>
                    <div class="rx-property__body">
                        <h2 class="rx-property__title">{{ $property['title'] }}</h2>
                        <p class="rx-property__text">{{ $property['description'] }}</p>
                        <div class="rx-property__stats">
                            <div class="rx-property__stat">
                                <small>Minimum</small>
                                <strong>{{ $property['minimum'] }}</strong>
                            </div>
                            <div class="rx-property__stat">
                                <small>ROI</small>
                                <strong>{{ $property['roi'] }}</strong>
                            </div>
                            <div class="rx-property__stat">
                                <small>Strategy</small>
                                <strong>{{ $property['strategy'] }}</strong>
                            </div>
                        </div>
                        <div class="rx-property__actions">
                            <a href="#modal{{ $property['modal'] }}"
                                class="btn btn-light btn-sm" data-bs-toggle="modal">
                                <i class="fe fe-file-text"></i> Documents
                            </a>
                            <a href="#modaldemoRealEstate"
                                class="btn btn-primary btn-sm modal-effect"
                                data-bs-effect="effect-flip-horizontal" data-bs-toggle="modal">
                                <i class="fe fe-trending-up"></i> Invest now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @foreach ($properties as $property)
        <div class="modal fade" id="modal{{ $property['modal'] }}">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="rx-modal__title-block">
                            <h3 class="modal-title">Asset documents</h3>
                            <p>{{ $property['title'] }}</p>
                        </div>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rx-doc-list">
                            @foreach ($property['documents'] as $label => $document)
                                <a href="{{ URL($document) }}" target="_blank" rel="noopener" class="rx-doc-link">
                                    <i class="fe fe-file-text"></i> {{ $label }}
                                    <i class="fe fe-external-link"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="modal fade" id="modaldemoRealEstate">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="rx-modal__title-block">
                        <h3 class="modal-title">Investment details</h3>
                        <p>Tell us how you would like to invest.</p>
                    </div>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="javascript:(void);">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Amount</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control amount" placeholder="Minimum 1000" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Duration</label>
                            <select class="form-control form-select select2" required>
                                <option>Select duration</option>
                                <option value="1 day">1 day</option>
                                <option value="2 days">2 days</option>
                                <option value="3 days">3 days</option>
                                <option value="4 days">4 days</option>
                                <option value="5 days">5 days</option>
                                <option value="6 days">6 days</option>
                            </select>
                        </div>
                        <div class="form-group mb-0">
                            <label>Description</label>
                            <textarea class="form-control" placeholder="Describe what you are investing in" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100" name="invest">Invest</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-user.layout>
