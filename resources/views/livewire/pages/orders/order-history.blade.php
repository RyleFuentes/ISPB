<div x-transition x-data = "{filter: false}" class="bg-white rounded shadow-sm container p-3">
    @include('livewire.messages.message')

   
    <div>
        <div>
            <button class="btn btn-primary btn-sm rounded-pill me-2" wire:click='generatePdf'>
                <i class="bi bi-filetype-pdf"></i>
            </button>
            <button  :class="filter ? 'btn-warning ': 'btn-primary'" x-on:click="filter = !filter" class="btn btn-sm  btn-sm"> <i class="bi bi-funnel"></i> Filter </button>
        
            <div x-transition x-show="filter" class="m-3 p-3">
                <h5 class="my-0">Orders Created at until:
                    @if(isset($start) && isset($end))
                        {{ $start }} to {{ $end }}
                    @endif
                </h5>
                <div class="row">
                    <div class="col">
                        <label for="start" class="mt-2">Start Date</label>
                        <input wire:model.live='start' id="start" class="form-control" type="date">
                    </div>
        
                    <div class="col">
                        <label for="end" class="mt-2">End Date</label>
                        <input wire:model.live='end' id="end" class="form-control" type="date">
                    </div>
                </div>
            </div>
        </div>
        
        <table class="table table-striped table-hover">
            <thead>
                <tr class="fw-semibold">
                    <td x-show="filter"></td>
                    <td scope="col" class="text-dark">
                        Ordered Product
                        <select wire:model.live='prod_id' x-transition x-show="filter" class="form-select" aria-label="Default select example">
                            <option value selected >Select Ordered Products</option>
                            @foreach ($products as $item)
                                <option value="{{$item->product_id}}">{{$item->product_name}}</option>
                            @endforeach
        
                        </select>
                    </td>
                    <td scope="col" class="text-dark">Delivery Date</td>
                    <td scope="col" class="text-dark">
                        Recipient
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
                            <td x-show="filter" ><input class="form-check-input" wire:click='checkedItem({{$order->order_id}})'type="checkbox"></td>
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
    </div>
  
    

  

    <div class="mt-3 p-3">
        {{ $orders->links() }}
    </div>
</div>

