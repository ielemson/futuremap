@php
    $setting = \App\Models\Setting::find(1);
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   @if (!empty($news_title))
   @php
   $cleanContent = preg_replace('/style="[^"]*"/i', '', strip_tags($meta_description));
    @endphp
   <title>@yield('title', '') | {{ $setting->website_title }} </title>
   <meta name="description"
       content="{{ $news_title }}">
   <link rel="canonical" href="{{ route("front.single.news", $news_slug) }}">
   <meta property="og:url" content="{{ route('front.single.news', $news_slug) }}">
   <meta property="og:title" content="{{  $news_title }}">
   <meta property="og:description" content="{!! Illuminate\Support\Str::limit($cleanContent, 200) !!}">
   <meta property="og:type" content="website">
   <meta property="og:site_name" content="The Futuremap Media">
   <meta property="og:image:width" content="1200">
   <meta property="og:image:height" content="630">
   <meta property="og:image" content="https://fmapmedia.com/assets/images/news/{{ $socialimage }}">
   <meta property="og:locale" content="en_US" />
   <meta name="bingbot" content="nocache">
   @endif


   @if (!empty($event_title))
   @php
   $cleanContent = preg_replace('/style="[^"]*"/i', '', strip_tags($event_meta_description));
    @endphp
   <title>@yield('title', '') | {{ $setting->website_title }} </title>
   <meta name="description"
       content="{{ $event_title }}">
   <link rel="canonical" href="{{ route("event.magazine.details", $event_slug) }}">
   <meta property="og:url" content="{{ route('event.magazine.details', $event_slug) }}">
   <meta property="og:title" content="{{  $event_title }}">
   <meta property="og:description" content="{!! Illuminate\Support\Str::limit($cleanContent, 200) !!}">
   <meta property="og:type" content="website">
   <meta property="og:site_name" content="The Futuremap Media">
   <meta property="og:image:width" content="1200">
   <meta property="og:image:height" content="630">
   <meta property="og:image" content="{{ asset('assets/images/banners/' . $eventimage) }}">
   <meta property="og:locale" content="en_US" />
   <meta name="bingbot" content="nocache">
   @endif

    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/iconplugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"
        integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
    {{-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/lightbox/css/lightbox.min.css') }}" />

    @stack('extra-css')

</head>

<body>

    <div class="error-area ptb-50">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="error-content">
                    <h1>4 <span>0</span> 4</h1>
                    <h3>Oops! Page Not Found</h3>
                    <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
                    <a href="{{ route("welcome") }}" class="default-btn">
                        Return To Home Page
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('assets/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/js/appear.min.js') }}"></script>
    <script src="{{ asset('assets/js/tweenMax.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script async src="{{ asset('assets/lightbox/js/lightbox.min.js') }}" charset="utf-8"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
    {{-- <script src="https://checkout.flutterwave.com/v3.js"></script> --}}
    {{-- <script src="https://unpkg.com/aos@next/dist/aos.js"></script> --}}
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'>
    </script>

  
</body>

</html>
