@extends('layouts.front', ['scholarshipimg' => $scholarship->image, 'scholarship_title' => $scholarship->title, 'scholarship_description' => $scholarship->details, 'scholarship_slug' => $scholarship->slug])

@section('content')

@section('title', $scholarship->title)
@include('frontend.include.innerBanner', ['banner_title_1' => $scholarship->title,'banner_title_2'=>'Scholarships & Grants'])

<div class="blog-details-area  pt-100 pb-70">
    <div class="container">
        <div class="row ">
            <div class="col-lg-8">
                <div class="blog-details-content pr-20">
           
                    <div class="blog-preview-img-bg">
                        <a href="" class="play-btn">
                            {{-- <i class="flaticon-play-button-arrowhead"></i> --}}
                            <img src="{{ asset('assets/images/news') }}/{{ $scholarship->image }}"
                                alt="{{ $scholarship->title }}" style="height:35vw; width:100%">
                        </a>
                    </div>
                    <ul class="tag-list">
                        <li>
                            <i class="ri-calendar-todo-fill"></i>
                            {{ Carbon\Carbon::parse($scholarship->created_at)->isoFormat('MMM DD YY') }}
                        </li>
                        <li>
                            <i class="ri-price-tag-3-fill"></i>
                            <a href="#">{{ $scholarship->category->name }}</a>
                        </li>
                    </ul>
                    <h2>{{ $scholarship->title }}</h2>
                    <p style="text-align: justify !mportant">{!! $scholarship->details !!}</p>
                    <div class="article-share">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="article-tag">
                                    <ul>
                                        <li class="title">
                                            <i class="ri-price-tag-3-fill"></i>
                                        </li>
                                        Scholarships & Grants
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="article-social-icon">
                                    <ul class="social-icon">
                                        <li class="title">Share :</li>
                                       
                                        <li>
                                            <a target="_blank" rel="noopener noreferrer"
                                                href="https://www.facebook.com/sharer/sharer.php?u={{route('front.scholarship_grants_opportunity.show',$scholarship->slug)}}">
                                                <i class="ri-facebook-fill"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" rel="noopener noreferrer"
                                                href="https://twitter.com/intent/tweet?text={{route('front.scholarship_grants_opportunity.show',$scholarship->slug)}}"
                                                data-size="large" data-text="{{ $scholarship->slug }}"
                                                data-url="{{route('front.scholarship_grants_opportunity.show',$scholarship->slug)}}"
                                                data-hashtags="" data-via="{{ url('/') }}"
                                                data-related="{{ $scholarship->category->name }}">
                                                <i class="ri-twitter-fill"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://api.whatsapp.com/send?text={{route('front.scholarship_grants_opportunity.show',$scholarship->slug)}}"
                                                target="_blank">
                                                <i class="ri-whatsapp-fill"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
            {{-- Aside --}}
            @if (count($scholarships)>0)
            <div class="col-lg-4">
                <div class="side-bar-area">  
                    <div class="side-bar-widget">
                        <h3 class="title">Scholarships & Grants</h3>
                        <div class="widget-popular-post">
                            @foreach ($scholarships as $scholarship_grant)

                            <article class="item">
                                <a href="{{route('front.scholarship_grants_opportunity.show',$scholarship_grant->slug)}}" class="thumb">
                                    <span class="full-image cover bg3" role="img" style="background-image:url('{{asset('assets/images/news')}}/{{$scholarship_grant->image}}')">
                                        {{-- <img src="{{asset('assets/images/news')}}/{{$scholarship_grant->image}}" alt="{{$scholarship_grant->title}}"> --}}
                                    </span>
                                </a>
                                <div class="info">
                                    <p>{{ Carbon\Carbon::parse($scholarship_grant->created_at)->isoFormat('MMM DD YY') }}</p>
                                    <h4 class="title-text">
                                        <a href="{{route('front.scholarship_grants_opportunity.show',$scholarship_grant->slug)}}">
                                            {{$scholarship_grant->title}}
                                        </a>
                                    </h4>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
