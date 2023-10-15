<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'ISPB' }}</title>
        <link rel="icon" type="image/x-icon" href="/images/logo.png">
        <link rel="stylesheet" href="/bootstrap-5.3.2-dist/css/bootstrap.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        {{$slot}}
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="/bootstrap-5.3.2-dist/js/bootstrap.js"></script>
        <script src="js/jquery-3.3.1.min.js"></script>
    </body>
</html>
