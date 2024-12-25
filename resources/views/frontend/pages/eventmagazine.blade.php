@extends('layouts.front', ['eventimage' => $event->image_banner, 'event_title' => $event->title, 'meta_description' => $event->content, 'event_slug' => $event->slug])

@section('content')
@section('title', $event->title)
@include('frontend.include.innerBanner', ['banner_title' => $event->title])



<!-- Event Details Area -->
<div class="event-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="event-details-content pr-20">
                    <div class="event-preview-img">
                        <img src="{{ asset("assets/images/banners/$event->image_banner") }}" alt="{{ $event->title }}">
                    </div>
                    <h2>{{ $event->title }}</h2>
                    <p>
                        {!! $event->content !!}
                    </p>

                    <h3>Location</h3>
                    <p>
                        {{ $event->location }}
                    </p>
                </div>

                {{-- Gallery --}}
                <h3>Event Gallery</h3>
                @if ($event->gallery)
                    @php
                        $galleryImages = json_decode($event->gallery, true);
                    @endphp

                    <div class="row">
                        @foreach ($galleryImages as $image)
                            <div class="col-md-4 mb-3">
                                <a class="example-image-link" href="{{ asset('assets/images/gallery/' . $image) }}"
                                    data-lightbox="example-set" data-title="{{ $event->title }}">
                                    <img class="example-image thumbnail" src="{{ asset('assets/images/gallery/' . $image) }}"
                                    alt="{{ $event->title }}" /></a>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>

            <div class="col-lg-4">
                <div class="event-sidebar">
                    <h3 class="title">Events description</h3>
                    <ul>
                        <li>Location: <span>{{ $event->location }}</span></li>
                        <li>Date: <span>{{ Carbon\Carbon::parse($event->created_at)->diffForHumans() }}</span></li>
                        {{-- <li>Time: <span>11:30 AM</span></li> --}}
                        {{-- <li>Phone: <span>011-325-143-2567</span></li> --}}
                        {{-- <li>Website: <span>www.ledu.com</span> </li> --}}
                        {{-- <li>Organizer: <span>Ledu</span> </li> --}}
                    </ul>
                </div>

                <div class="event-popular-post">
                    @foreach ($events as $latest)
                        <article class="item">
                            <a href="{{ route('event.magazine.details', $latest->slug) }}" class="thumb">
                                <span class="full-image" role="img">
                                    <img src="{{ asset("assets/images/banners/$latest->image_banner") }}"
                                        alt="{{ $event->title }}" style="width:100%; height:15vh;">
                                </span>
                            </a>
                            <div class="info">

                                <h4 class="title-text">
                                    <a href="{{ route('event.magazine.details', $latest->slug) }}">
                                        {{ $latest->title }}
                                    </a>
                                </h4>
                                <p>
                                    {!! Illuminate\Support\Str::limit($latest->content, 50) !!}
                                </p>
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
