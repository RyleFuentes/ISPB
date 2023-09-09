<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'ISPB' }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>

      <div style="background-image: url('{{ asset('images/Sprinkle.svg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center center; height: 100vh;">
        <nav class="navbar navbar-expand-lg bg-dark shadow sticky-top">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">ISPB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
              </ul>
              @auth 
                <ul class="navbar-nav d-flex">
                  <li class="nav-item">
                    <a class="nav-link" href="#">JonahLynn</a>
                  </li>
                </ul>
              @endauth
            </div>
          </div>
        </nav>

        @auth
          <div class="p-1 mt-3">
              <div class="row w-100" style="height: 100vh;">
                  <div class="col-3 border  fixed-top">
                      <ul class="nav flex-column">
                          <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="#">Active</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">Link</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">Link</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                          </li>
                          <livewire:components.logout />
                      </ul>
                  </div>
                  <div class="col border border-danger scrollable">
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

    </body>
</html>
