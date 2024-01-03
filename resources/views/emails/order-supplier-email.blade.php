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
    <link rel="stylesheet" href="{{ asset('/bootstrap-5.3.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/bootstrap-5.3.2-dist/css/bootstrap.css') }}"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css') }}"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/style.css">
    <!-- Scripts -->
</head>

<body class="font-sans antialiased">
    <div class="container">
        <div class="mb-4 text-sm text-gray-600 card shadow-lg mt-5 p-5 text-center">
            <i class="fs-2 fas fa-user"></i>
            <p class="fw-semibold px-3 ">Good day {{ $supplier->agent_name }} this email is to inform you that a new set of orders will be
                sent to you for the next following days.</p>

                <ul>
                    @foreach ($orders as $order)
                        <li>{{$order->prod_name}}</li>
                        <li>{{$order->quantity}}</li>
                        <li>{{$order->delivery_date}}</li>
                    @endforeach
                </ul>
        </div>

        <livewire:actions.email-order-btn />
    </div>

    <script src="/bootstrap-5.3.2-dist/js/popper.js"></script>
    <script src="/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
    <script src="/bootstrap-5.3.2-dist/js/bootstrap.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

</body>

</html>
