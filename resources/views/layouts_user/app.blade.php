<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/76f2dc9b0b.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gideon+Roman&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gideon+Roman&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gideon+Roman&family=Poppins&display=swap" rel="stylesheet">
    <!-- /// -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap');


        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        a,
        button {
            font-family: 'Poppins', sans-serif;
        }

        .container {
            max-width: 3000px !important;
            padding-left: 0px !important;
            padding-right: 0px !important;

        }

        #app {
            max-width: 100%;
            overflow-x: hidden;
        }
    </style>
    <livewire:styles />
    <livewire:scripts />

</head>

<body>

    <div id="app">
        <livewire:navbar />
        <main class="mt-0">
            @yield('content')
        </main>
    </div>

</body>

</html>