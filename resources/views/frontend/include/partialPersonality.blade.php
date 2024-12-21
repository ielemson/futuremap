@if (count($personalities)>0)
<div class="blog-area section-bg pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center mb-45">
            <div class="col-lg-8">
                <div class="section-title mt-rs-20">
                    {{-- <span>{{__('Latest News')}}</span> --}}
                    <h2>{{__('Personalities')}}</h2>
                </div>
            </div>
            <div class="col-lg-4 text-end">
                <a href="{{route("front.personality.list")}}" class="default-btn border-radius-50">View all personalities</a>
            </div>
        </div>
        <div class="row">
            @foreach ($personalities as $personality)
        <div class="col-lg-4 col-md-4">
        <div class="blog-card">
            <a href="{{route('front.personality.details',$personality->slug)}}">
                <img src="{{asset('assets/images/personalities/')}}/{{$personality->image}}" alt="{{$personality->name}}">
            </a>
            <div class="content">
                <ul>
                    <li>
                        <i class="ri-calendar-todo-fill"></i>
                        {{-- Jan 12,2022 --}}
                        {{ Carbon\Carbon::parse($personality->created_at)->isoFormat('MMM DD YY') }}
                        {{-- {{ Carbon\Carbon::parse($latest->created_at)->diffForHumans() }} --}}
                    </li>
                    <li>
                        <i class="ri-price-tag-3-fill"></i>
                        <a href="{{route("front.personality.details",$personality->slug)}}">{{$personality->type}}</a>
                    </li>
                </ul>
                <h3>
                    <a href="{{route('front.personality.details',$personality->slug)}}">
                        {{$personality->name}}
                    </a>
                </h3>
                
                <p>{!! Illuminate\Support\Str::limit($personality->story, 150) !!}</p>
                <a href="{{route('front.personality.details',$personality->slug)}}" class="read-btn">Read More</a>
            </div>
        </div>
    </div>
    @endforeach
        </div>
    </div>
</div>
@else
    
@endif