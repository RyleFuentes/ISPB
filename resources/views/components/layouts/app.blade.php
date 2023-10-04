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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <script data-navigate-track src="{{asset('https://code.jquery.com/jquery-3.7.1.js')}}" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    </head>
    <body  style="background-image: url('{{ asset('images/Sprinkle.svg') }}'); background-size: cover; background-repeat: repeat; height: 100vh;">

        @auth
          <div class="container-fluid bg-white" >
            <div class="row " style="height: 100vh;">
              <div class="col-2 bg-white">
                <div class="container rounded p-3 mt-2" style="background-color: #B9A394; ">
                  <ul class="nav flex-column d-flex text-center">

                      <li class="nav-item m-3">
                          <a class="nav-link active" style="color: #010304;"  aria-current="page" href="{{route('dashboard')}}">
                            <img src="{{ asset('images/logo.png') }}" alt="logo" style="width: 80px;">
                          </a>
                      </li>
                      <li class="nav-item m-3">
                          <a class="nav-link text-white" href="#"><i class="logo bi bi-people"></i> Employee</a>
                      </li>
                      <li class="nav-item m-3">
                          <a class="nav-link text-white" href="{{route('products')}}">Products</a>
                      </li>
                      <li class="nav-item m-3">
                          <a class="nav-link text-white" href="#">Orders</a>
                      </li>
                      <li class="nav-item" style="cursor: pointer;">

                        <livewire:components.logout />
                    
                      </li>
                  </ul>

                </div>
              </div>
              <div class="col mt-2" style="background-color: #f8fafc;">
                {{ $slot }}
              </div>
            </div>
          </div>
        @endauth

        @guest
          <div class="container position-absolute top-50 start-50 translate-middle">
              {{ $slot }}
          </div>
        @endguest
      </div>

      @stack('dismiss-add-brand-script')

    </body>
</html>
