<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
	<title>@yield('title','') | Radmin - Laravel Admin Starter</title>
	<!-- initiate head with meta tags, css and script -->
	@include('include.head')


</head>

<body id="app">

    <div class="wrapper">
        <!-- initiate header-->
        @include('include.header')
        <div class="page-wrap">
            <!-- initiate sidebar-->
            @include('include.sidebar')

            <div class="main-content">
                <!-- yeild contents here -->
                @yield('content')
            </div>

            <!-- initiate chat section-->
            @include('include.chat')


            <!-- initiate footer section-->
            @include('include.footer')

        </div>
    </div>
    <!-- initiate modal menu section-->
    @include('include.modalmenu')

    <!-- initiate scripts-->
    @include('include.script')
     {{-- <script src="{{ asset('dist/js/jquery-3.6.4.min.js') }}"></script> --}}
     {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script> --}}
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    {{-- <script src="{{ asset('all.js') }}"></script> --}}
    <!-- Stack array for including inline js or scripts -->
   
    {{-- <script src="{{ asset('dist/js/theme.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/chat.js') }}"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script> --}}
    {{-- @stack('script') --}}
</body>

</html>
