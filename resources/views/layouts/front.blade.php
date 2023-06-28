<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title', '') | Future Map</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{asset('assets/css/plugins.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/iconplugins.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/theme-dark.css')}}">

    <link rel="icon" type="image/png" href="{{asset('assets/images/favicon.png')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/v4-shims.min.css" integrity="sha512-p++g4gkFY8DBqLItjIfuKJPFvTPqcg2FzOns2BNaltwoCOrXMqRIOqgWqWEvuqsj/3aVdgoEo2Y7X6SomTfUPA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    @include('front.include.navbar')

    @yield('content')

    @include('front.include.footer')

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/meanmenu.min.js')}}"></script>
    <script src="{{asset('assets/js/ajaxchimp.min.js')}}"></script>
    <script src="{{asset('assets/js/form-validator.min.js')}}"></script>
    <script src="{{asset('assets/js/contact-form-script.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/aos.js')}}"></script>
    <script src="{{asset('assets/js/odometer.min.js')}}"></script>
    <script src="{{asset('assets/js/appear.min.js')}}"></script>
    <script src="{{asset('assets/js/tweenMax.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
</body>

</html>
