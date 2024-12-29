@extends('layouts.front')


@section('content')
@section('title', 'Our News')
@include('frontend.include.innerBanner', ['banner_title_1' => 'Read News','banner_title_2'=>"Our News"])


@if (count($news) > 0)
<div class="blog-widget-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mt-rs-20 pb-5">
                    <h2>Latest from our blogs</h2>
                    <p>
                        Dive into engaging stories, expert tips, and trending topics tailored just for you. Stay inspired and informed!
                    </p>
                </div>
              <div class="row">
            @foreach ($news as $latest)
                <div class="col-lg-4 col-md-4">
                <div class="blog-card">
                    <a href="{{route('front.single.news',$latest->slug)}}">
                        <img src="{{asset('assets/images/news')}}/{{$latest->image}}" alt="{{$latest->title}}">
                    </a>
                    <div class="content">
                        <ul>
                            <li>
                                <i class="ri-calendar-todo-fill"></i>
                                {{-- Jan 12,2022 --}}
                                {{ Carbon\Carbon::parse($latest->created_at)->isoFormat('MMM DD YY') }}
                                {{-- {{ Carbon\Carbon::parse($latest->created_at)->diffForHumans() }} --}}

                            </li>
                            <li>
                                <i class="ri-price-tag-3-fill"></i>
                                <a href="{{route('front.single.news',$latest->slug)}}">{{$latest->category->name}}</a>
                            </li>
                        </ul>
                        <h3>
                            <a href="{{route('front.single.news',$latest->slug)}}">
                                {{$latest->title}}
                            </a>
                        </h3>
                        
                        <p>{!! Illuminate\Support\Str::limit($latest->details, 150) !!}</p>
                        <a href="{{route('front.single.news',$latest->slug)}}" class="read-btn">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        
            @if ($news->links()->paginator->hasPages())

            <div class="pagination-area">
                {{ $news->links() }}
            </div>

            {{-- <div class="col-lg-12 col-md-12 text-center">
                <div class="pagination-area">
                
                </div>
            </div> --}}
        @endif
           
        </div>
            </div>
          
        </div>
        
    </div>
</div>

@else
<div class="coming-soon-area ptb-100">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container-fluid">
                <div class="coming-soon-content">
                    <h1>Oops!</h1>
                    <p>
                       No news posted at the moment. Please check back at a later time
                    </p>
                  </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
