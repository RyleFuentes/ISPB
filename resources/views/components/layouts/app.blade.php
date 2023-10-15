<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'ISPB' }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script data-navigate-track defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css')}}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <script data-navigate-track src="{{asset('https://code.jquery.com/jquery-3.7.1.js')}}" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    </head>
    <body>
    <!-- <body  style="background-image: url('{{ asset('images/Sprinkle.svg') }}'); background-size: cover; background-repeat: repeat; height: 100vh;"> -->

        @auth
          <div class="container-fluid bg-white" >
            <div class="row" >
              <div class="col-lg-3 col-sm-4 bg-white">
                <nav class="navbar navbar-expand-sm rounded p-3 mt-2" style="background-color: #d2cfb2; ">
                  <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <div class="d-flex flex-column justify-content-center align-items-center h-100 w-100">
                        <ul class="navbar-nav d-flex flex-column text-center">
                          <li class="nav-item m-3">
                            <a class="nav-link active" style="color: #010304;"  aria-current="page" href="{{route('dashboard')}}">
                              <img src="{{ asset('images/logo.png') }}" alt="logo" style="width: 80px;">
                            </a>
                          </li>
                          <li class="nav-item m-3">
                            <a class="nav-link text-dark" href="{{route('users')}}"><i class="logo bi bi-people"></i> Employee</a>
                          </li>
                          <li class="nav-item m-3">
                            <a class="nav-link text-dark" href="{{route('products')}}">Products</a>
                          </li>
                          <li class="nav-item m-3">
                            <a class="nav-link text-dark" href="#">Orders</a>
                          </li>
                          <li class="nav-item m-3 text-dark" style="cursor: pointer;">
                            <livewire:components.logout />
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </nav>
              </div>
              <div class="col mt-2 mx-2 container" style="background-color: #f1f6ca; height: 100%;">
                {{ $slot }}
              </div>
            </div>
          </div>
        @endauth

        @guest
          <div class="container position-absolute top-50 start-50 translate-middle rounded">
              {{ $slot }}
          </div>
        @endguest
      </div>

      @stack('dismiss-add-brand-script')

    </body>
</html>
