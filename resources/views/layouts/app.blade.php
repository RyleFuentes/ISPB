<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ISPB') }}</title>
    <link rel="icon" type="image/x-icon" href="/images/logo.png">
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css') }}"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/bootstrap.js', 'resources/js/bootstrap.min.js', 'resources/js/app.js', 'resources/css/bootstrap.css', 'resources/css/style.css', 'resources/js/jquery-3.6.0.min.js', 'resources/js/script.js'])
</head>

<body class="font-sans antialiased">
    <div class="d-flex" id="wrapper">
        <livewire:layout.sidebar />
            
        <div class="container-fluid min-h-screen bg-gray-100">
            <livewire:layout.navigation/>
            <!-- Page Heading -->
            @if (isset($header))
                <header>
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
