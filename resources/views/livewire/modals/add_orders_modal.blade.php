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
                          <label for="brand" class="modal-input-label">Brand</label>
                          <select id='brand' wire:model.live='add_order.brandID'
                              class="modal-input-field form-select mt-2">
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
                          <label for="product" class="modal-input-label">Product</label>
                          <select wire:model="add_order.product" id="product"
                              class="modal-input-field form-select mt-2">
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


                          <label for="retail" class="modal-input-label">
                              <input id="retail" type="radio" wire:model.live='add_order.type_order'
                                  class='form-radio' value='1' />
                              retail
                          </label>

                          <label for="wholesale" class="modal-input-label">
                              <input id="wholesale" type="radio" wire:model.live='add_order.type_order'
                                  class='form-radio' value='2' />
                              wholesale
                          </label>

                      </div>

                      @error('add_order.type_order')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror


                      <div class="form-floating mt-2">
                          <label for="due_date" class="modal-input-label">Due Date</label>

                          <input wire:model='add_order.deliver_date' type="date"
                              class="modal-input-field form-control" placeholder="..." id="due_date">
                      </div>
                      @error('add_order.deliver_date')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                      @if ($toggle_input)
                          @if ($toggle_input == 1)
                              <div class="mt-2">
                                  <label for="Kilo" class="modal-input-label">Kilo</label>
                                  <input type="text" class="modal-input-field form-control " placeholder="..."
                                      id="Kilo" wire:model='add_order.order_amount' pattern="^\d+(\.\d{1,2})?$"
                                      title="Please enter a valid number with up to two decimal places.">
                              </div>
                              @error('add_order.order_amount')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          @else
                              <div class="mt-2">
                                  <label for="qty" class="modal-input-label">Quantity</label>
                                  <input wire:model='add_order.order_amount' type="number"
                                      class="modal-input-field form-control" placeholder="..." id="qty">
                              </div>
                              @error('add_order.order_amount')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          @endif
                      @endif



                      <div class="mt-2">
                          <input wire:model='add_order.recipient' type="text" class="modal-input-field form-control"
                              placeholder="..." id="recipient">
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
