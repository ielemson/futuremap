@extends('layouts.front', ['eventimage' => $eventDetails->image_banner, 'event_title' => $eventDetails->title, 'event_meta_description' => $eventDetails->content, 'event_slug' => $eventDetails->slug])

@section('content')
@section('title', $eventDetails->title)
@include('frontend.include.innerBanner', [
    'banner_title_1' => $eventDetails->title,
    'banner_title_2' => 'Events Magazine',
])

<!-- Event Details Area -->
<div class="blog-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-content pr-20">
                    <div class="event-preview-img">
                        <img src="{{ asset("assets/images/banners/$eventDetails->image_banner") }}"
                            alt="{{ $eventDetails->title }}">
                    </div>
                    <h2>{{ $eventDetails->title }}</h2>
                    <p>
                        {!! $eventDetails->content !!}
                    </p>

                    <h3>Location</h3>
                    <p>
                        {{ $eventDetails->location }}
                    </p>
                    @if ($eventDetails->gallery)
                    @php
                        $galleryImages = json_decode($eventDetails->gallery, true);
                        // dd($galleryImages);
                    @endphp
                    <h3>Event Gallery</h3>

                    <div class="blog-preview-slider owl-carousel owl-theme owl-loaded owl-drag">
                        <div class="owl-stage-outer owl-height" style="height: 309.573px;">
                            <div class="owl-stage"
                                style="transform: translate3d(-970px, 0px, 0px); transition: all; width: 3398px;">
                                @foreach ($galleryImages as $index => $image)
                                <div class="owl-item active {{ ($index == 0) ? 'active' : 'cloned' }}" style="width: 455.333px; margin-right: 30px;">
                                    <div class="blog-preview-img">
                                        <img src="{{ asset('assets/images/gallery/' . $image) }}" alt="{{ $eventDetails->title }}">
                                    </div>
                                </div>
                                @endforeach
                                
                               
                            </div>
                        </div>
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                    class="flaticon-left-arrow"></i></button><button type="button" role="presentation"
                                class="owl-next"><i class="flaticon-chevron"></i></button></div>
                        <div class="owl-dots disabled"></div>
                    </div>
                    @endif
                    <div class="article-share">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="article-tag">
                                    <ul>
                                        <li class="title"><i class="ri-price-tag-3-fill"></i></li>
                                        <li><a href="javascript:;" target="_blank">Events</a></li>
                                        <li><a href="javascript:;" target="_blank">Magazine</a></li>
                                        {{-- <li><a href="tags.html" target="_blank">Physics</a></li> --}}
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="article-social-icon">
                                    <ul class="social-icon">
                                        <li class="title">Share :</li>
                                        <li>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('event.magazine.details', $eventDetails->slug) }}"
                                                target="_blank">
                                                <i class="ri-facebook-fill"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" rel="noopener noreferrer"
                                                href="https://twitter.com/intent/tweet?text={{ route('event.magazine.details', $eventDetails->slug) }}"
                                                data-size="large" data-text="{{ $eventDetails->slug }}"
                                                data-url="{{ route('event.magazine.details', $eventDetails->slug) }}"
                                                data-hashtags=""
                                                data-via="{{ route('event.magazine.details', $eventDetails->slug) }}}">
                                                <i class="ri-twitter-fill"></i>
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
                <div class="event-sidebar">
                    <h3 class="title">Events description</h3>
                    <ul>
                        <li>Location: <span>{{ $eventDetails->location }}</span></li>
                        <li>Date: <span>{{ Carbon\Carbon::parse($eventDetails->created_at)->diffForHumans() }}</span>
                        </li>
                    </ul>
                </div>

                <div class="event-popular-post">
                    @foreach ($events as $latestEvent)
                        <article class="item">
                            <a href="{{ route('event.magazine.details', $latestEvent->slug) }}" class="thumb">
                                <span class="full-image" role="img">
                                    <img src="{{ asset("assets/images/banners/$latestEvent->image_banner") }}"
                                        alt="{{ $latestEvent->title }}" style="width:100%; height:15vh;">
                                </span>
                            </a>
                            <div class="info">

                                <h4 class="title-text">
                                    <a href="{{ route('event.magazine.details', $latestEvent->slug) }}">
                                        {{ $latestEvent->title }}
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
<!-- Event Details Area End -->
@endsection
