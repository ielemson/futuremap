@extends('layouts.front')


@section('content')
@section('title', 'Personality Profile')
@include('frontend.include.innerBanner', ['banner_title' => 'Personality Profile'])


@if (count($personalities) > 0)
<div class="blog-widget-area pt-100 pb-70">
    <div class="container">
              <div class="row">
            @foreach ($personalities as $personality)
                <div class="col-lg-4 col-md-4">
                <div class="blog-card">
                    <a href="{{route('front.personality.details',$personality->slug)}}">
                        <img src="{{asset('assets/images/personalities/')}}/{{$personality->image}}" alt="{{$personality->title}}">
                    </a>
                    <div class="content">
                        <ul>
                            <li>
                                <i class="ri-calendar-todo-fill"></i>
                                {{-- Jan 12,2022 --}}
                                {{ Carbon\Carbon::parse($personality->created_at)->format('d M, Y') }}
                                {{-- {{ Carbon\Carbon::parse($personality->created_at)->diffForHumans() }} --}}

                            </li>
                            <li>
                                <i class="ri-price-tag-3-fill"></i>
                                <a href="{{route('front.personality.details',$personality->slug)}}">{{$personality->type}}</a>
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
            @if ($personalities->links()->paginator->hasPages())
        
            <div class="col-lg-12 col-md-12 text-center">
                <div class="pagination-area">
                    {{ $news->links() }}
                </div>
            </div>
        @endif
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
