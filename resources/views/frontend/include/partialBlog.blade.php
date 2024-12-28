<div class="courses-area-two pt-70 pb-70">
    <div class="container">
        <div class="row align-items-center mb-45">
            <div class="col-lg-8">
                <div class="section-title mt-rs-20">
                    {{-- <span>{{__('Ch')}}</span> --}}
                    <h2>{{ __('Latest News') }}</h2>
                    <p>Stay informed with the latest news and updates on a variety of topics.</p>
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
            @foreach ($news as $latest)
            <div class="owl-item cloned" style="width: 238.667px; margin-right: 30px;">
                <div class="courses-item">
                    <a href="{{ route('front.single.news', $latest->slug) }}">
                        <img src="{{ asset('assets/images/news') }}/{{ $latest->image }}" alt="{{ $latest->title }}" />
                    </a>
                    <div class="content">
                        <a href="{{ route('front.single.news', $latest->slug) }}"
                            class="tag-btn">{{ $latest->category->name }}</a>
                        <h3><a href="{{ route('front.single.news', $latest->slug) }}">{{ $latest->title }}</a></h3>
                        <p>{!! Illuminate\Support\Str::limit($latest->details, 200) !!}</p>
                        <ul class="course-list">
                            <li><i class="ri-time-fill"></i>
                                {{ Carbon\Carbon::parse($latest->created_at)->diffForHumans() }}</li>
        
                        </ul>
                        <div class="bottom-content">
                            <div class="rating2">
                                <div class="btn-group" role="group" aria-label="Social media buttons">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('front.single.news', $latest->slug) }}" class="btn btn-sm btn-default fb-share-button">
                                      <i class="fab fa-facebook-f me-2 text-primary"></i> 
                                    </a>

                                    <a 
                                    class="btn btn-sm btn-default"
                                            rel="noopener noreferrer"
                                            href="https://twitter.com/intent/tweet?text={{route("front.single.news",$latest->slug)}}"
                                            data-size="large"
                                            data-text="{{$latest->slug}}"
                                            data-url="{{route("front.single.news",$latest->slug)}}"
                                            data-hashtags=""
                                            data-via="{{url('/')}}"
                                            data-related="{{$latest->category->name}}"
                                     >
                                      <i class="fab fa-twitter me-2 text-info"></i> 
                                    </a>
                                  </div>
                                  
                            </div>
                            <div class="bottom-price">
                                <a href="{{ route('front.single.news', $latest->slug) }}" class="default-btn"
                                    style="pointer-events: all; cursor: pointer;">
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

