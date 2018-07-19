<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('pages/css/pages.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        @yield('css')
    </head>
    <body>
        @yield('body')

        <!-- Javascript section -->
        <script src="{{ asset('js/app.js') }}'"></script>
        @yield('script')
    </body>
</html>