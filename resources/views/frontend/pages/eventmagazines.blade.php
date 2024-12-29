@extends('layouts.front')

@section('content')
@section('title', "Event Magazine")
@include('frontend.include.innerBanner', [
    'banner_title_1' => 'Event Magazine',
    'banner_title_2' => 'vents & Happenings',
])

<div class="event-area pt-100 pb-100">
    <div class="container">
        <div class="section-title text-center mb-45">
            <h2>Events & Happenings</h2>
        </div>
        <div class="row">
            @foreach ($events as $event)
            <div class="col-lg-6">
                <div class="event-item box-shadow">
                    <div class="event-img">
                        <a href="{{ route("event.magazine.details",$event->slug) }}">
                            <img src="{{ asset('assets/images/banners/' .$event->image_banner) }}" alt="Events">
                        </a>
                    </div>
                    <div class="event-content">
                        <ul class="event-list">
                            <li><i class="ri-calendar-todo-fill"></i>{{ Carbon\Carbon::parse($event->created_at)->diffForHumans() }}</li>
                            <li><i class="ri-map-pin-fill"></i>{{ $event->location }}</li>
                        </ul>
                        <h3><a href="{{ route("event.magazine.details",$event->slug) }}">{{ $event->title }}</a></h3>
                       
                    </div>
                </div>
            </div>
            @endforeach

            @if ($events->links()->paginator->hasPages())
            <div class="col-lg-12 col-md-12 text-center">
                <div class="pagination-area">
                    {{ $events->links() }}
                </div>
            </div>
          @endif
          
        </div>
    </div>
</div>
@endsection
