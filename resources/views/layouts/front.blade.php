<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title', '') | Future Map</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/plugins.css">

    <link rel="stylesheet" href="assets/css/iconplugins.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/responsive.css">

    <link rel="stylesheet" href="assets/css/theme-dark.css">

    <link rel="icon" type="image/png" href="assets/images/favicon.png">
</head>

<body>

    @include('front.include.navbar')

    @yield('content')

    @include('front.include.footer')

    <script src="assets/js/jquery.min.js"></script>

    <script src="assets/js/plugins.js"></script>

    <script src="assets/js/custom.js"></script>
</body>

</html>
