<div class="d-flex" id="wrapper">

    @include('layout.sidebar')
    <div class="container-fluid px-4" id="dashboard">
        @include('layout.navbar')

        @include('livewire.messages.success')


        <div class="mt-5 row g-3">

            <div class="col col-md-4 col-xl-3">
                <div class="card bg-c-green order-card shadow">
                    <div class="card-block">
                        <div class="m-b-20 fw-bold text-primary">SALES</div>
                        <h2 class="text-right">
                            <i class="fa fa-tag me-2"></i><span>486</span>
                        </h2>
                        <p class="m-b-0 fw-bold">Total Sales: 351</p>
                    </div>
                </div>
            </div>

            <div class="col col-md-4 col-xl-3">
                <div class="card bg-c-green order-card shadow">
                    <div class="card-block">
                        <div class="m-b-20 fw-bold text-primary">PRODUCTS</div>
                        <h2 class="text-right">
                            <i class="fa fa-box me-2"></i><span>486</span>
                        </h2>
                        <p class="m-b-0 fw-bold">Products Left: 351</p>
                    </div>
                </div>
            </div>

            <div class="col col-md-4 col-xl-3">
                <div class="card bg-c-green order-card shadow">
                    <div class="card-block">
                        <div class="m-b-20 fw-bold text-primary">ORDERS</div>
                        <h2 class="text-right">
                            <i class="fa fa-shopping-bag me-2"></i><span>486</span>
                        </h2>
                        <p class="m-b-0 fw-bold">Total Orders: 351</p>
                    </div>
                </div>
            </div>

            <div class="col col-md-4 col-xl-3">
                <div class="card bg-c-green order-card shadow">
                    <div class="card-block">
                        <div class="m-b-20 fw-bold text-primary">ORDERS</div>
                        <h2 class="text-right">
                            <i class="fa fa-tag me-2"></i><span>486</span>
                        </h2>
                        <p class="m-b-0 fw-bold">Total Sales: 351</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col col-md-8">
                <div class="card shadow p-3" style="height: 50vh">
                    
                        <livewire:livewire-column-chart {{-- key="{{ $columnChartModel->reactiveKey() }}" --}} :column-chart-model="$columnChartModel" />
                    
                </div>
            </div>

            <div class="col col-md-4">
                <div class="card shadow p-3" style="height: 50vh">
                    <livewire:livewire-area-chart :area-chart-model="$areaChartModel" />
                </div>
            </div>
        </div>
    </div>
</div>
