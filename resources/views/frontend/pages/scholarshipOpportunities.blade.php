@extends('layouts.front')


@section('content')
@section('title', 'Our News')
@include('frontend.include.innerBanner', ['banner_title_1' => 'Scholarship / Grants','banner_title_2'=>"Scholarship Opportunities"])

@if (count($scholarships) > 0)
<div class="blog-widget-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
              <div class="row">
            @if (count($scholarships)>0)
            @foreach ($scholarships as $scholarship_grant)
                <div class="col-lg-4 col-md-4">
                <div class="blog-card">
                    <a href="{{route('front.scholarship_grants_opportunity.show',$scholarship_grant->slug)}}">
                        <img src="{{asset('assets/images/news')}}/{{$scholarship_grant->image}}" alt="{{$scholarship_grant->title}}">
                    </a>
                    <div class="content">
                        <ul>
                            <li>
                                <i class="ri-calendar-todo-fill"></i>
                                {{-- Jan 12,2022 --}}
                                {{ Carbon\Carbon::parse($scholarship_grant->created_at)->isoFormat('MMM DD YY') }}
                                {{-- {{ Carbon\Carbon::parse($scholarship_grant->created_at)->diffForHumans() }} --}}

                            </li>
                            <li>
                                <i class="ri-price-tag-3-fill"></i>
                                <a href="{{route('front.scholarship_grants_opportunity.show',$scholarship_grant->slug)}}">{{$scholarship_grant->category->name}}</a>
                            </li>
                        </ul>
                        <h3>
                            <a href="{{route("front.scholarship_grants_opportunity.show",$scholarship_grant->slug)}}">
                                {{$scholarship_grant->title}}
                            </a>
                        </h3>
                        
                        <p>{!! Illuminate\Support\Str::limit($scholarship_grant->details, 150) !!}</p>
                        <a href="{{route('front.scholarship_grants_opportunity.show',$scholarship_grant->slug)}}" class="read-btn">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
             
            @endif
          
            @if ($scholarships->links()->paginator->hasPages())
        
            <div class="col-lg-12 col-md-12 text-center">
                <div class="pagination-area">
                    {{ $scholarships->links() }}
                </div>
            </div>
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
