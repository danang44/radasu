<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SEWAIN</title>
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('dist/img/favicon.ico') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/76f2dc9b0b.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/popper.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gideon+Roman&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gideon+Roman&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gideon+Roman&family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #d9dddc;


        } 
        .container {
            max-width: 3000px !important;
        }


        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        a,
        button {
            font-family: 'Gideon Roman', cursive;
            /* font-family: 'Gideon Roman', cursive;
            font-family: 'Poppins', sans-serif; */
        }
    </style>
</head>

<body>

@include('layouts_user.header')
    @yield('content')
    @include('layouts_user.footer')
</body>

</html>