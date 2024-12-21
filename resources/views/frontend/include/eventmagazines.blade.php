@if (count($events)>0)
    <!-- Events Area -->
<div class="event-area section-bg pb-100 pt-50">
    <div class="container">
        <div class="section-title text-center mb-45">
            <span>EVENTS</span>
            <h2>Upcoming events schedule</h2>
        </div>
        <div class="event-slider owl-carousel owl-theme">
           
           @foreach ($events as $event)
           <div class="event-item">
            <div class="event-img">
                <a href="event-details.html">
                    <img src="{{ asset('assets/images/banners/' .$event->image_banner) }}" alt="Events" />
                </a>
            </div>
            <div class="event-content">
                <ul class="event-list">
                    <li><i class="ri-calendar-todo-fill"></i>{{ Carbon\Carbon::parse($event->created_at)->diffForHumans() }}</li>
                    <li><i class="ri-map-pin-fill"></i>{{ $event->location }}</li>
                </ul>
                <h3><a href="{{ route("event.magazine.details",$event->slug) }}">{{ $event->title }}</p>
            </div>
        </div>
           @endforeach
           
        </div>
    </div>
</div>
<!-- Events Area End -->
    
@endif