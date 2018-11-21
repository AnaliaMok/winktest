<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WinkTest | Blog</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            margin: 0;
        }
        main {
            padding: 2rem;
        }

        img {
            display: inline-block;
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div id="app">
        <main class="content">
            @yield('content')
        </main>
        <example-component></example-component>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>