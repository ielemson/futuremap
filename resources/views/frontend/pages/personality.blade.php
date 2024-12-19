@extends('layouts.front',['socialimage'=>$personality->image,'news_title'=>$personality->title,'meta_description'=>$personality->meta_description,'news_slug'=>$personality->slug])

@section('content')
@section('title', $personality->name)
@include('frontend.include.innerBanner', ['banner_title' => $personality->name])


<div class="blog-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-details-content pr-20">
                   
                    <div class="blog-preview-img-bg">
                        <a href="" class="play-btn">
                            {{-- <i class="flaticon-play-button-arrowhead"></i> --}}
                            <img src="{{asset('assets/images/personalities')}}/{{$personality->image}}" alt="{{$personality->title}}" style="height:35vw; width:100%">
                        </a>
                    </div>
                    <ul class="tag-list">
                        <li>
                            <i class="ri-calendar-todo-fill"></i>
                            {{ Carbon\Carbon::parse($personality->created_at)->format('d M, Y')}}
                        </li>
                        <li>
                            <i class="ri-price-tag-3-fill"></i>
                            <a href="#">{{$personality->type}}</a>
                        </li>
                    </ul>
                    <h2>{{$personality->name}}</h2>
                    <p style="text-align: justify !mportant">{!!$personality->story!!}</p>
                    <div class="article-share">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="article-social-icon">
                                    <ul class="social-icon">
                                        <li class="title">Share :</li>
                                        <li>
                                            {{-- <a href="https://www.facebook.com/sharer/sharer.php?u=http://fmapmedia.com/show/news/{{$personality->slug}}" target="_blank">
                                                <i class="ri-facebook-fill"></i>
                                            </a> --}}
                                            <div class="fb-share-button btn btn-primary btn-sm" 
                                            data-href="{{route('front.single.news',$personality->slug)}}"
                                            data-layout="button_count">
                                            </div>
                                        </li>
                                        <li>
                                            <a 
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            href="https://twitter.com/intent/tweet?text={{route("front.single.news",$personality->slug)}}"
                                            data-size="large"
                                            data-text="{{$personality->slug}}"
                                            data-url="{{route("front.single.news",$personality->slug)}}"
                                            data-hashtags=""
                                            data-via="{{url('/')}}"
                                            data-related="{{$personality->name}}"
                                            >
                                                <i class="ri-twitter-fill"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://api.whatsapp.com/send?text={{route("front.single.news",$personality->slug)}}" target="_blank">
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
            
        </div>
    </div>
</div>


@endsection
