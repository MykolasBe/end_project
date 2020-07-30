<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'End-Project') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('partials.nav', $nav)

        <main class="py-4">
            @yield('content')
        </main>
        <footer>
            <div class="footer-wrap container" >
                <p>{!! view('partials.link',['href'=>route('home'),'text'=>'Home']) !!}</p>
                <p>{!! view('partials.link',['href'=>route('jobs.index'),'text'=>'Jobs']) !!}</p>
                <p>All rights reserved ©Mykolas Bėčius 2020</p>
                <p>{!! view('partials.link',['href'=>route('application.create'),'text'=>'Send Application']) !!}</p>
                <p>{!! view('partials.link',['href'=>route('login'),'text'=>'Login']) !!}</p>
            </div>
        </footer>
    </div>
</body>
</html>
