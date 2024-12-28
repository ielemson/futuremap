<div class="event-area section-bg pb-100 pt-50">
    <div class="container">
        <div class="section-title text-center mb-45">
            <span>EVENTS</span>
            <h2>Events & Happenings</h2>
        </div>
        <div class="event-slider owl-carousel owl-theme owl-loaded owl-drag">
            <div class="owl-stage-outer owl-height" style="height: 582.458px;">
                <div class="owl-stage"
                    style="transform: translate3d(-1466px, 0px, 0px); transition: 0.25s; width: 2567px;">
                    @foreach ($events as $event)
                 <div class="owl-item cloned" style="width: 336.667px; margin-right: 30px;">
                    <div class="event-item">
                        <div class="event-img">
                            <a href="javascript:;">
                                <img src="{{ asset('assets/images/banners/' .$event->image_banner) }}" alt="Events">
                            </a>
                        </div>
                        <div class="event-content">
                            <ul class="event-list">
                                <li><i class="ri-calendar-todo-fill"></i>{{ Carbon\Carbon::parse($event->created_at)->diffForHumans() }}</li>
                                <li><i class="ri-map-pin-fill"></i>{{ $event->location }}</li>
                                {{-- <li><i class="ri-time-fill"></i> 11:00 AM</li> --}}
                            </ul>
                            <h3><a href="{{ route("event.magazine.details",$event->slug) }}">{{ $event->title }}</a></h3>
                        </div>
                    </div>
                </div>
               
                    @endforeach
                   
                </div>
            </div>
            <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                        aria-label="Previous">‹</span></button><button type="button" role="presentation"
                    class="owl-next"><span aria-label="Next">›</span></button>
            </div>
        </div>
    </div>
</div>
