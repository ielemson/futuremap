@extends('layouts.front',['socialimage'=>$single_news->image,'news_title'=>$single_news->title,'meta_description'=>$single_news->meta_description,'news_slug'=>$single_news->slug])

@section('content')
@section('title', $single_news->title)
@if ($single_news->category->name == "Scholarship/Grants opportunities")
@include('frontend.include.innerBanner', ['banner_title' => 'Scholarship/Grants Opportunities']) 
@else
@include('frontend.include.innerBanner', ['banner_title' => 'Our News'])  
@endif

<div class="blog-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-content pr-20">
                    {{-- <div class="blog-preview-img-bg">
                        <a href="{{route('front.single.news',$single_news->slug)}}">
                            <img src="{{asset('assets/images/news')}}/{{$single_news->image}}" alt="{{$single_news->title}}">
                        </a>
                    </div> --}}
                    <div class="blog-preview-img-bg">
                        <a href="" class="play-btn">
                            {{-- <i class="flaticon-play-button-arrowhead"></i> --}}
                            <img src="{{asset('assets/images/news')}}/{{$single_news->image}}" alt="{{$single_news->title}}" style="height:35vw; width:100%">
                        </a>
                    </div>
                    <ul class="tag-list">
                        <li>
                            <i class="ri-calendar-todo-fill"></i>
                            {{ Carbon\Carbon::parse($single_news->created_at)->isoFormat('MMM DD YY') }}
                        </li>
                        <li>
                            <i class="ri-price-tag-3-fill"></i>
                            <a href="#">{{$single_news->category->name}}</a>
                        </li>
                    </ul>
                    <h2>{{$single_news->title}}</h2>
                    <p style="text-align: justify !mportant">{!!$single_news->details!!}</p>
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
                                                     <li><a href="{{route('front.news.category',$category->slug)}}">{{$category->name}}</a></li>
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
                                            {{-- <a href="https://www.facebook.com/sharer/sharer.php?u=http://fmapmedia.com/show/news/{{$single_news->slug}}" target="_blank">
                                                <i class="ri-facebook-fill"></i>
                                            </a> --}}
                                            <div class="fb-share-button btn btn-primary btn-sm" 
                                            data-href="{{route('front.single.news',$single_news->slug)}}"
                                            data-layout="button_count">
                                            </div>
                                        </li>
                                        <li>
                                            <a 
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            href="https://twitter.com/intent/tweet?text={{route("front.single.news",$single_news->slug)}}"
                                            data-size="large"
                                            data-text="{{$single_news->slug}}"
                                            data-url="{{route("front.single.news",$single_news->slug)}}"
                                            data-hashtags=""
                                            data-via="{{url('/')}}"
                                            data-related="{{$single_news->category->name}}"
                                            >
                                                <i class="ri-twitter-fill"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://api.whatsapp.com/send?text={{route("front.single.news",$single_news->slug)}}" target="_blank">
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
                                 <li><a href="{{route('front.news.category',$category->slug)}}">{{$category->name}}</a></li>
                             @endforeach
                             
                         </ul>
                     </div>
                 </div> 
                 @endif
                 
                </div>
                <div class="side-bar-widget">
                    <h3 class="title">Popular News</h3>
                    <div class="widget-popular-post">
                @foreach ($news as $popular)
                     <article class="item">
                            <a href="{{ route('front.single.news', $popular->slug) }}" class="thumb">
                                <span class="full-image cover bg2" role="img">
                                    <img src="{{asset('assets/images/news')}}/{{$popular->image}}" style="width: 100%; height:25vh "/>
                                </span>
                            </a>
                            <div class="info">
                                <p>{{ Carbon\Carbon::parse($popular->created_at)->diffForHumans() }}</p>
                                <h4 class="title-text">
                                    <a href="{{ route('front.single.news', $popular->slug) }}">
                                       {{ $popular->title}}
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

@endsection
