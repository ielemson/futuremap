  <div class="blog-area pt-100 pb-70">
            <div class="container">
                <div class="row align-items-center mb-45">
                    <div class="col-lg-8">
                        <div class="section-title mt-rs-20">
                            {{-- <span>{{__('Ch')}}</span> --}}
                            <h2>{{__('Latest News')}}</h2>
                        </div>
                    </div>
                    <div class="col-lg-4 text-end">
                        <a href="{{route('front.news.list')}}" class="default-btn border-radius-50">View all news</a>
                    </div>
                </div>
              
                <div class="course-slider-two owl-carousel owl-theme">
                    @foreach ($news as $latest)
                    <div class="courses-item">
                        <a href="{{route('front.single.news',$latest->slug)}}">
                            <img src="{{asset('assets/images/news')}}/{{$latest->image}}" alt="{{$latest->title}}" />
                        </a>
                        <div class="content">
                            {{-- <div class="course-instructors">
                                <img src="{{ asset("assets/images/settings/admin.png") }}" alt="{{$latest->title}}"  />
                            </div> --}}
                            <a href="{{route('front.single.news',$latest->slug)}}" class="tag-btn">{{$latest->category->name}}</a>
                            <h3><a href="{{route('front.single.news',$latest->slug)}}">T{{$latest->title}}</a></h3>
                            <p>{!! Illuminate\Support\Str::limit($latest->details, 200) !!}</p>
                            <ul class="course-list">
                                <li><i class="ri-time-fill"></i> {{ Carbon\Carbon::parse($latest->created_at)->diffForHumans() }}</li>
                              
                            </ul>
                            <div class="bottom-content">
                                <div class="rating2">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                                <div class="bottom-price">
                                    <a href="{{route('front.single.news',$latest->slug)}}"  class="default-btn" style="pointer-events: all; cursor: pointer;">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                   @endforeach
                   
                </div>
            </div>
         
                    
                </div>
            </div>
</div>

