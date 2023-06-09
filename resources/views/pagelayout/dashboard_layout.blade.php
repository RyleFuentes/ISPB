<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-gZYsVvJRH/7xB8zjZu58ecVajnNkx69+gsONXJyDj2nF1E+Rm2W8FZgDnZJjKv4IUr7W8qyMGg1tjJlEwCpMzg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="@yield('css')">
    <link rel="stylesheet" href="manualcss/dashboard_navbar.css">
    
</head>
<body>
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark p-4">
        <div class="container-fluid justify-content-space-between ">
            <div class="nav-item">
                <a class="navbar-brand text-white" href="{{route('dashboard.index')}}">DASHBOARD</a>
            </div>

            <div class="nav-item dashboard_links">
                <a href="{{route('users-list.index')}}" class="nav-link">Users</a>
                <a href="{{route('products-list.index')}}" class="nav-link">Products</a>
                <a href="{{route('orders.index')}}" class="nav-link">Orders</a>
                <a href="{{route('profile.index')}}" class="nav-link">Profile</a>
                <button class="btn btn-link nav-link text-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop">History</button>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel">History</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
                            <div class="card-header">
                                <strong>07/02/2023!</strong> 

                            </div>
                            <p>
                                <li>

                                    Changes: New added products into the system.
                                </li>
                                <li>

                                    Changes: Deleted item from the system.
                                </li>
                                
                            </p> 

                            <div class="card-footer ">
                                Modified by: Ryle Fuentes
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
                            <div class="card-header">

                                <strong>07/12/2023!</strong> 
                            </div>
                            <li>

                                Changes: New added products into the system.
                            </li>
                            <li>

                                Changes: Deleted item from the system.
                            </li>

                            <div class="card-footer ">
                                Modified by: Vincent Beato
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div class="alert alert-secondary alert-dismissible fade show m-2" role="alert">
                            <div class="card-header">

                                <strong>07/03/2023!</strong> 
                            </div>

                            <li>

                                Changes: New added products into the system.
                            </li>
                            <li>

                                Changes: Deleted item from the system.
                            </li>

                            <div class="card-footer ">
                                Modified by: Vincent Beato
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
                <a href="" class="nav-link">Logout</a>
            </div>
            
        </div>
    </nav>


    <section>
        @yield('content')
    </section>



    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js" integrity="sha512-s+ig1dc29JlU60fXU5y6am5/i5dNnKKsv/CN8Nk6zQ2GcyDv6JysNZX9zlU6/5U5+DvemCryjz3ZmVLMygbyag==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



</body>
</html>