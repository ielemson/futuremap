@extends('layouts.front')


@section('content')
@section('title', 'Our Top Management Team')  
@include('front.include.innerBanner',['banner_title'=>'Our Top Management Team'])

<div class="blog-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-details-content pr-20">
                    <ul class="tag-list">
                        
                        <li>
                            <i class="ri-price-tag-3-fill"></i>
                            <a href="#">{{$feature->title}}</a>
                        </li>
                    </ul>
                    <h2>{{$feature->title}}</h2>
                    
                    <div class="blog-preview-img">
                        <img src="{{asset('assets/images/features')}}/{{$feature->image}}" alt="{{$feature->title}}">
                    </div>
                   
                    <p>
                        {!!$feature->content!!}
                    </p>
                  
                </div>
            </div>
           
        </div>
    </div>
</div>

@endsection