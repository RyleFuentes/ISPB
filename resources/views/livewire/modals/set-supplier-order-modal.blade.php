
  <div wire:ignore.self class="modal fade" id="SetOrder" tabindex="-1" aria-labelledby="SetOrderLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="SetOrderLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form wire:submit='add_order'>
            @csrf

            <div class="mt-2 form-group">
                <label for="product">Product name: </label>
                <input wire:model='set_order.prod_name' type="text" id="product" class="form-control">

                {{-- <x-error_msg type="error" :value="$set_order->prod_name"  /> --}}
            </div>

            <div class="mt-2 form-group">
                <label for="qty">Quantity: </label>
                <input wire:model='set_order.quantity' type="number" id="qty" class="form-control">
                {{-- <x-error_msg type="error" :value="$set_order->quantity"   /> --}}
            </div>

            <div class="mt-2 form-group">
                <label for="delivery">Delivery date: </label>
                <input wire:model='set_order.date' type="date" id="delivery" class="form-control">
                {{-- <x-error_msg type="error" :value="$set_order->date"  /> --}}
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>

            </form>
        </div>
      </div>
    </div>
  </div>