<div x-data = "{filter: false}" class="bg-white rounded shadow-sm container p-3">
    @include('livewire.messages.message')
    <h3>Order history</h3>

    <div>
        <button  :class="filter ? 'btn-warning ': 'btn-dark'" x-on:click="filter = !filter" class="btn btn-sm  btn-sm"> <i class="bi bi-funnel"></i> Filter </button>
        
        <div x-transition x-show="filter" class="m-3 p-3">
            <div>
                <label for="start" class="mt-2">Start Date</label>
                <input id="start" class="form-control" type="date">

                <label for="end" class="mt-2">End Date</label>
                <input id="end" class="form-control" type="date">
            </div>


        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr class="fw-semibold">
                <td x-show="filter"></td>
                <td scope="col" class="text-dark">
                    Ordered Product
                    <select x-show="filter" class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                </td>
                <td scope="col" class="text-dark">Delivery Date</td>
                <td scope="col" class="text-dark">
                    Recipient
                    
                    <div  x-transition x-show="filter">
                        <select  class="form-select" aria-label="Default select example">
                            <option selected>Recipient :)</option>
                            <option value="1">Completed</option>
                            <option value="2">Cancelled</option>

                        </select>
                    </div>
                </td>
                <td scope="col" class="text-dark">Amount</td>
                <td scope="col" class="text-dark">Total Price</td>
                <td scope="col" class="text-dark ">
                    Status

                    <div  x-transition x-show="filter">
                        <select wire:model.live='toggleStatus' class="form-select" aria-label="Default select example">
                            <option selected>All :)</option>
                            <option value="1">Completed</option>
                            <option value="2">Cancelled</option>

                        </select>
                    </div>
                </td>

            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                @if ($order->status === 1 || $order->status === 2)
                    <tr wire:key='{{ $order->order_id }}'>
                        <td x-show="filter" ><input class="form-control" type="checkbox"></td>
                        <td>{{ $order->product->product_name }}</td>
                        <td>{{ $order->due_date }}</td>
                        <td>{{ $order->recipient }}</td>
                        @if ($order->order_type === 1)
                            <td>{{ $order->order_kilo }} kg <i class="bi bi-basket2-fill text-primary"></i></td>
                        @else
                            <td>{{ $order->order_quantity }} bags<i class="bi bi-handbag-fill text-primary"></i></td>
                        @endif
                        <td>₱ {{ $order->total_price }}</td>
                        <td>
                            @if ($order->status === 1)
                                <span class="badge text-bg-success">Completed</span>
                            @elseif($order->status === 2)
                                <span class="badge text-bg-danger">Cancelled</span>
                            @endif
                        </td>

                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <div class="mt-3 p-3 w-50">
        <label for="paginate_number">Per Page</label>
        <select id='paginate_number' wire:model.live='paginate_number' class="form-select"
            aria-label="Default select example">
            <option value="10" selected>10</option>
            <option value="20">20</option>
            <option value="50">30</option>
            <option value="100">40</option>
        </select>
    </div>

    <div class="mt-3 p-3">
        {{ $orders->links() }}
    </div>
</div>
