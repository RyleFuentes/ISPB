  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">

      <div class="modal-dialog">
          <div class="modal-content">

              @include('livewire.messages.modal_message')
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Add Order</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                  <form wire:submit='submit_order'>

                      <div class="form-group mt-2">
                          <label for="brand">Brand</label>
                          <select id='brand' wire:model.live='add_order.brandID' class="form-select mt-2">
                              <option selected>--- select brand ---</option>
                              @foreach ($add_order->brands() as $brand)
                                  <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                              @endforeach

                          </select>
                      </div>
                      @error('add_order.brandID')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                      <div class="mt-2">
                          <label for="product">Product</label>
                          <select wire:model="add_order.product" id="product" class="form-select mt-2">
                              <option value="">Select a product</option>
                              @foreach ($add_order->products() as $product)
                                  <option value="{{ $product->product_id }}">{{ $product->product_name }}</option>
                              @endforeach
                          </select>
                      </div>

                      @error('add_order.product')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror






                      <div class=" mt-2 d-flex gap-3">


                          <label for="retail">
                              <input id="retail" type="radio" wire:model.live='add_order.type_order'
                                  class='form-radio' value='1' />
                              retail
                          </label>

                          <label for="wholesale">
                              <input id="wholesale" type="radio" wire:model.live='add_order.type_order'
                                  class='form-radio' value='2' />
                              wholesale
                          </label>

                      </div>

                      @error('add_order.type_order')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror


                      <div class="form-floating mt-2">
                          <input wire:model='add_order.deliver_date' type="date" class="form-control"
                              placeholder="..." id="due_date">
                          <label for="due_date">Due Date</label>
                      </div>
                      @error('add_order.deliver_date')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                      @if ($toggle_input)
                          @if ($toggle_input == 1)
                              <div class="form-floating mt-2">
                                  <input type="text" class="form-control" placeholder="..." id="Kilo"
                                      wire:model='add_order.order_amount' pattern="^\d+(\.\d{1,2})?$"
                                      title="Please enter a valid number with up to two decimal places.">
                                  <label for="Kilo">Kilo</label>
                              </div>
                              @error('add_order.order_amount')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          @else
                              <div class="form-floating mt-2">
                                  <input wire:model='add_order.order_amount' type="number" class="form-control"
                                      placeholder="..." id="qty">
                                  <label for="qty">Quantity</label>
                              </div>
                              @error('add_order.order_amount')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          @endif
                      @endif



                      <div class="form-floating mt-2">
                          <input wire:model='add_order.recipient' type="text" class="form-control" placeholder="..."
                              id="recipient">
                          <label for="recipient">For</label>
                      </div>
                      @error('add_order.recipient')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror



                      <div class="form-group mt-2">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" type="button" class="btn btn-primary">Proceed Order</button>

                      </div>


                  </form>
              </div>

          </div>
      </div>
  </div>
