@auth
    <div class="d-flex" id="wrapper">   
        @include('layout.sidebar')         
        <div class="container-fluid px-4" id="dashboard">
            @include('layout.navbar')   
            <div class="my-2 row g-3">

                <div class="col col-md-4 col-xl-3">
                    <div class="card bg-c-green order-card">
                        <div class="card-block">
                            <h4 class="m-b-20 fw-bold text-primary">SALES</h4>
                            <h2 class="text-right">
                                <i class="fa fa-tag me-2"></i><span>486</span>
                            </h2>
                            <p class="m-b-0 fw-bold">Total Sales: 351</p>
                        </div>
                    </div>
                </div> 

                <div class="col col-md-4 col-xl-3">
                    <div class="card bg-c-green order-card">
                        <div class="card-block">
                            <h4 class="m-b-20 fw-bold text-primary">Orders</h4>
                            <h2 class="text-right">
                                <i class="fa fa-tag me-2"></i><span>486</span>
                            </h2>
                            <p class="m-b-0 fw-bold">Total Sales: 351</p>
                        </div>
                    </div>
                </div> 

                <div class="col col-md-4 col-xl-3">
                    <div class="card bg-c-green order-card">
                        <div class="card-block">
                            <h4 class="m-b-20 fw-bold text-primary">Orders</h4>
                            <h2 class="text-right">
                                <i class="fa fa-tag me-2"></i><span>486</span>
                            </h2>
                            <p class="m-b-0 fw-bold">Total Sales: 351</p>
                        </div>
                    </div>
                </div> 
            
                <div class="col col-md-4 col-xl-3">
                    <div class="card bg-c-green order-card">
                        <div class="card-block">
                            <h4 class="m-b-20 fw-bold text-primary">Orders</h4>
                            <h2 class="text-right">
                                <i class="fa fa-tag me-2"></i><span>486</span>
                            </h2>
                            <p class="m-b-0 fw-bold">Total Sales: 351</p>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    </div>
@endauth