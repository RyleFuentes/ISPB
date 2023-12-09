<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ISPB') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="icon" type="image/x-icon" href="/images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('/bootstrap-5.3.2-dist/css/bootstrap.css') }}">
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css') }}"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/style.css">
    <!-- Scripts -->
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>






    <script src="/bootstrap-5.3.2-dist/js/popper.js"></script>
    <script src="/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
    <script src="/bootstrap-5.3.2-dist/js/bootstrap.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/app.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <x-livewire-alert::scripts />

    @livewireChartsScripts
</body>

</html>
