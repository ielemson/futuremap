@if (count($scholarships) > 0)
    <div class="courses-area-two pt-70 pb-70">
        <div class="container">
            <div class="row align-items-center mb-45">
                <div class="col-lg-8">
                    <div class="section-title mt-rs-20">
                        {{-- <span>{{__('Ch')}}</span> --}}
                        <h2>{{ __('Scholarship/Grants Opportunities') }}</h2>
                        <p>Stay informed with the latest news and updates on Scholarship/Grants Opportunities.</p>
                    </div>
                </div>
                <div class="col-lg-4 text-end">
                    <a href="{{ route('front.news.list') }}" class="default-btn">View all news</a>
                </div>
            </div>
            {{-- Container - SLider Goes Here --}}
            <div class="course-slider-two owl-carousel owl-theme owl-loaded owl-drag">
                <div class="owl-stage-outer owl-height" style="height: 537.917px;">
                    <div class="owl-stage"
                        style="transform: translate3d(-1074px, 0px, 0px); transition: 0.25s; width: 2150px;">
                        @foreach ($scholarships as $scholarship)
                            <div class="owl-item cloned" style="width: 238.667px; margin-right: 30px;">
                                <div class="courses-item">
                                    <a href="{{ route('front.scholarship_grants_opportunity.show', $scholarship->slug) }}">
                                        <img src="{{ asset('assets/images/news') }}/{{ $scholarship->image }}"
                                            alt="{{ $scholarship->title }}" />
                                    </a>
                                    <div class="content">
                                        <a href="{{ route('front.scholarship_grants_opportunity.show', $scholarship->slug) }}"
                                            class="tag-btn">{{ $scholarship->category->name }}</a>
                                        <h3><a
                                                href="{{ route('front.scholarship_grants_opportunity.show', $scholarship->slug) }}">{{ $scholarship->title }}</a>
                                        </h3>
                                        <p>{!! Illuminate\Support\Str::limit($scholarship->details, 200) !!}</p>
                                        <ul class="course-list">
                                            <li><i class="ri-time-fill"></i>
                                                {{ Carbon\Carbon::parse($scholarship->created_at)->diffForHumans() }}
                                            </li>

                                        </ul>
                                        <div class="bottom-content">
                                            <div class="rating2">
                                                <div class="btn-group" role="group" aria-label="Social media buttons">
                                                    <button type="button"
                                                        class="btn btn-sm btn-default fb-share-button "
                                                        data-href="{{ route('front.scholarship_grants_opportunity.show', $scholarship->slug) }}">
                                                        <i class="fab fa-facebook-f me-2 text-primary"></i>
                                                    </button>

                                                    <a class="btn btn-sm btn-default" rel="noopener noreferrer"
                                                        href="https://twitter.com/intent/tweet?text={{ route('front.scholarship_grants_opportunity.show', $scholarship->slug) }}"
                                                        data-size="large" data-text="{{ $scholarship->slug }}"
                                                        data-url="{{ route('front.scholarship_grants_opportunity.show', $scholarship->slug) }}"
                                                        data-hashtags="" data-via="{{ url('/') }}"
                                                        data-related="{{ $scholarship->category->name }}">
                                                        <i class="fab fa-twitter me-2 text-info"></i>
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="bottom-price">
                                                <a href="{{ route('front.scholarship_grants_opportunity.show', $scholarship->slug) }}"
                                                    class="default-btn" style="pointer-events: all; cursor: pointer;">
                                                    Read More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                            class="flaticon-left-arrow"></i></button><button type="button" role="presentation"
                        class="owl-next"><i class="flaticon-chevron"></i></button>
                </div>
                <div class="owl-dots disabled"></div>
            </div>
            {{-- Container - SLider Goes Here --}}
        </div>
    </div>
@endif
