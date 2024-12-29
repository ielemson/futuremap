@extends('layouts.front', ['socialimage' => $news_details->image, 'news_title' => $news_details->title, 'meta_description' => $news_details->details, 'news_slug' => $news_details->slug])

@section('content')

@section('title', $news_details->title)
@include('frontend.include.innerBanner', ['banner_title_1' => $news_details->title,'banner_title_2'=>'News Details'])

<div class="blog-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-content pr-20">
           
                    <div class="blog-preview-img-bg">
                        <a href="" class="play-btn">
                            {{-- <i class="flaticon-play-button-arrowhead"></i> --}}
                            <img src="{{ asset('assets/images/news') }}/{{ $news_details->image }}"
                                alt="{{ $news_details->title }}" style="height:35vw; width:100%">
                        </a>
                    </div>
                    <ul class="tag-list">
                        <li>
                            <i class="ri-calendar-todo-fill"></i>
                            {{ Carbon\Carbon::parse($news_details->created_at)->isoFormat('MMM DD YY') }}
                        </li>
                        <li>
                            <i class="ri-price-tag-3-fill"></i>
                            <a href="#">{{ $news_details->category->name }}</a>
                        </li>
                    </ul>
                    <h2>{{ $news_details->title }}</h2>
                    <p style="text-align: justify !mportant">{!! $news_details->details !!}</p>
                    <div class="article-share">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="article-tag">
                                    <ul>
                                        <li class="title">
                                            <i class="ri-price-tag-3-fill"></i>
                                        </li>
                                        @if (count($categories) > 0)
                                            @foreach ($categories as $category)
                                                <li><a
                                                        href="{{ route('front.news.category', $category->slug) }}">{{ $category->name }}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="article-social-icon">
                                    <ul class="social-icon">
                                        <li class="title">Share :</li>
                                       
                                        <li>
                                            <a target="_blank" rel="noopener noreferrer"
                                                href="https://www.facebook.com/sharer/sharer.php?u={{ route('front.single.news', $news_details->slug) }}">
                                                <i class="ri-facebook-fill"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" rel="noopener noreferrer"
                                                href="https://twitter.com/intent/tweet?text={{ route('front.single.news', $news_details->slug) }}"
                                                data-size="large" data-text="{{ $news_details->slug }}"
                                                data-url="{{ route('front.single.news', $news_details->slug) }}"
                                                data-hashtags="" data-via="{{ url('/') }}"
                                                data-related="{{ $news_details->category->name }}">
                                                <i class="ri-twitter-fill"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://api.whatsapp.com/send?text={{ route('front.single.news', $news_details->slug) }}"
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
            <div class="col-lg-4">
                <div class="side-bar-area">
                    @if (count($categories) > 0)
                        <div class="side-bar-widget">
                            <h3 class="title">Categories</h3>
                            <div class="side-bar-categories">
                                <ul>
                                    @foreach ($categories as $category)
                                        <li><a
                                                href="{{ route('front.news.category', $category->slug) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="side-bar-widget">
                        <h3 class="title">Popular post</h3>
                        <div class="widget-popular-post">
                            
                            @foreach ($topnewslist as $popular)
                            <article class="item">
                                <a href="{{route('front.single.news',$popular->slug)}}" class="thumb">
                                    <span class="full-image cover bg3" role="img" style="background-image:url('{{asset('assets/images/news')}}/{{$popular->image}}') "></span>
                                </a>
                                <div class="info">
                                    <p>  {{ Carbon\Carbon::parse($popular->created_at)->isoFormat('MMM DD YY') }}</p>
                                    <h4 class="title-text">
                                        <a href="{{route('front.single.news',$popular->slug)}}">
                                            {{$popular->title}}
                                        </a>
                                    </h4>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div> 
                </div>
               
            </div>
        </div>
    </div>
</div>

@endsection
