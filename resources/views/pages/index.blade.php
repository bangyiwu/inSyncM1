<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <link href="/css/style.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
        @include('inc.navbar')
        @include('fullcalendar.modal-fastEvents')
        <div class="container">
            @yield('content')
        </div>
        <div>
            <div class="text-center">
                <img class="mb-4" src="{{ URL::to('/assets/images/logo.png') }}" alt="" width="144" height="144">
                <h1>Welcome To inSync</h1>
                <p>The social calendar we all need</p>
                <div class="btn-group">
                    <p><a class="btn btn-primary btn-lg m-1" href="/login" role="button">Login</a></p>
                    <p><a class="btn btn-success btn-lg m-1" href="/register" role="button">Register</a></p>
                </div>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
