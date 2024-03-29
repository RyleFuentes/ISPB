<div>
    @include('livewire.messages.message')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
            <div class=" row g-3">

                <div class="col col-md-4">
                    <div class="card bg-c-green order-card shadow">
                        <div class="card-block">
                            <div class="m-b-20 fw-bold text-primary">SALES</div>
                            <h2 class="text-right">
                                <i class="fa fa-tag me-2"></i><span>{{ $completed_orders }}</span>
                            </h2>
                            <p class="m-b-0 fw-bold">Total Sales: <span class="text-success"> ₱
                                    {{ $total_sales }}</span></p>
                        </div>
                    </div>
                </div>

                <div class="col col-md-4">
                    <div class="card bg-c-green order-card shadow">
                        <div class="card-block">
                            <div class="m-b-20 fw-bold text-primary">PRODUCTS</div>
                            <h2 class="text-right">
                                <i class="fa fa-box me-2"></i><span>{{ $total_products }}</span>
                            </h2>
                            <p class="m-b-0 fw-bold">Products with batches: {{ $products_with_batches }}</p>
                        </div>
                    </div>
                </div>

                <div class="col col-md-4">
                    <div class="card bg-c-green order-card shadow">
                        <div class="card-block">
                            <div class="m-b-20 fw-bold text-primary">BRANDS</div>
                            <h2 class="text-right">
                                <i class="fa fa-shopping-bag me-2"></i><span>{{ $total_brands }}</span>
                            </h2>
                            <p class="m-b-0 fw-bold">Brands with products: {{ $brands_with_products }}</p>
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
                        <div class="m-b-20 fw-bold text-primary">LOW STOCKS</div>
                        <div class="overflow-auto">
                        @if ($least_stocks ?? null)
                            @foreach ($least_stocks as $item)
                                <div class="mt-3 me-2 stock-card bg-red-500 border-l-8 border-red-900 p-3 rounded text-light fw-bold d-flex justify-content-between">
                                    <span class="">{{ $item->product_name }}</span>
                                    <span>({{$item->total_quantity}} bags left)</span>
                                </div>
                            @endforeach
                        @else
                            
                            <!-- <div class="mt-3 bg-purple-400 border border-r-10 border-purple-900 p-3 rounded text-light fw-bold d-flex justify-content-between">
                                <span class="">All stocks are in safe levels</span>
                            </div> -->

                            <div class="mt-3 bg-purple-500 border-l-8 border-purple-900 p-3 rounded text-light font-bold flex justify-between">
                                <span class="">All stocks are in safe levels</span>
                            </div>

                        @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
