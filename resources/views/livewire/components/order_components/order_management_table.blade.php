<div>
    @include('livewire.messages.message')
    <div class="card d-flex justify-content-center align-items-center table-responsive mt-5 shadow-lg">
        <div class="mb-4 px-4 mt-3 w-100">
            <div class="d-flex justify-content-between align-items-center">
                <button class="btn btn-primary btn-sm rounded-pill me-2" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="fa fa-plus me-2 text-light"></i>Add Order
                </button>

                <form class="d-flex mt-2">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        style="border-bottom-color: #6c3ca4;">
                    <button class="btn btn-primary me-3" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>

        <div style="margin: 20px auto; width: 100%;">
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="fw-semibold">
                        
                        <td scope="col" class="text-secondary">Ordered Product</td>
                        <td scope="col" class="text-secondary">Delivery Date</td>
                        <td scope="col" class="text-secondary">Quantity(bags)</td>
                        <td scope="col" class="text-secondary">Total Price</td>
                        <td scope="col" class="text-secondary">Status</td>
                        <td scope="col" class="text-secondary">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pending_orders as $order)
                        @if ($order->status === 0)
                            <tr>
                                
                                <td>{{$order->product->product_name}}</td>
                                <td>{{$order->due_date}}</td>
                                <td>{{$order->order_quantity}}</td>
                                <td>₱ {{$order->total_price}}</td>
                                <td><span class="badge text-bg-warning">Pending</span></td>
                                <td>
                                    <button wire:click.prevent='completeOrder({{$order->order_id}})' class="btn btn-primary btn-sm">Complete order</button>
                                    <button wire:click.prevent='cancelOrder({{$order->order_id}})' class="btn btn-danger btn-sm">Cancel</button>
                                </td>
                            </tr>
                        @endif
                        
                    @endforeach

                </tbody>

                
            </table>

            <div class="mt-3 p-3">
                {{$pending_orders->links()}}
            </div>
        </div>
    </div>
    @include('livewire.modals.add_orders_modal')
</div>
