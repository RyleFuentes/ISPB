  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">

      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content rounded-4">


              @include('livewire.messages.modal_message')

              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Add Order</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body px-4">

                  <form wire:submit='submit_order'>

                      <label for="mode" class="modal-input-label">Mode of Delivery</label>
                      <div class="form-group">
                          <select wire:model.live='add_order.mode_order' name="" id="mode"
                              wire:model.live='add_order.mode_order'
                              class="modal-input-field form-select">
                              <option value="" selected>Choose the mode of order</option>
                              <option value="1">Delivery</option>
                              <option value="2">Pick up</option>
                          </select>
                      </div>
                      @error('add_order.mode_order')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                      <div class="form-group mt-2">
                          <label for="brand" class="modal-input-label">Brand</label>
                          <select id='brand' wire:model.live='add_order.brandID'
                              class="modal-input-field form-select">
                              <option selected>Choose a Brand</option>
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
                          <select wire:model="add_order.product" id="product" class="modal-input-field form-select">
                              <option value="">Choose a product</option>
                              @foreach ($add_order->products() as $product)
                                  <option value="{{ $product->product_id }}">{{ $product->product_name }}</option>
                              @endforeach
                          </select>
                      </div>
                      @error('add_order.product')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                      <div class="mt-3">
                          <label for="retail" class="modal-input-label">Order Type: </label>
                          <br>
                          <div class="d-flex justify-content-around">
                            @if ($add_order->mode_order == 2)
                                
                                <label for="retail" class="modal-input-label">
                                    <input id="retail" type="radio" wire:model.live='add_order.type_order'
                                        class='form-radio' value='1' />
                                    Retail <span class="text-secondary"> (per kilograms)</span>
                                </label>
                            @endif

                             
                                <label for="wholesale" class="modal-input-label">
                                    <input id="wholesale" type="radio" wire:model.live='add_order.type_order'
                                        class='form-radio' value='2' />
                                    Wholesale <span class="text-secondary"> (per bags)</span>
                                </label>
                             

                          </div>
                      </div>
                      @error('add_order.type_order')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror


                      @if ($add_order->mode_order == 1)
                          <div class="mt-2">
                              <label for="delivery_fee">Delivery fee</label>
                              <input type="text" class="modal-input-field form-control "
                                      placeholder="Enter delivery fee" id="delivery_fee"
                                      wire:model='add_order.delivery_fee' pattern="^\d+(\.\d{1,2})?$"
                                      title="Please enter a valid number with up to two decimal places.">
                            </div>

                            @error('add_order.delivery_fee')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          
                      @endif


                      <div class="mt-2">
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
                                  <input type="text" class="modal-input-field form-control "
                                      placeholder="Enter order per Kilograms" id="Kilo"
                                      wire:model='add_order.order_amount' pattern="^\d+(\.\d{1,2})?$"
                                      title="Please enter a valid number with up to two decimal places.">
                              </div>
                              @error('add_order.order_amount')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          @else
                              <div class="mt-2">
                                  <label for="qty" class="modal-input-label">Quantity</label>
                                  <input wire:model='add_order.order_amount' type="number"
                                      class="modal-input-field form-control" placeholder="Enter Quantity"
                                      id="qty">
                              </div>
                              @error('add_order.order_amount')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          @endif
                      @endif



                      <div class="mt-2">
                          <label for="recipient" class="modal-input-label">For</label>
                          <input wire:model='add_order.recipient' type="text"
                              class="modal-input-field form-control" placeholder="Enter recipient" id="recipient">
                      </div>
                      @error('add_order.recipient')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                      <div class="form-group mt-4 text-center">

                          <button type="button"
                              class="cancel fw-semibold text-secondary text-decoration-underline px-5"
                              data-bs-dismiss="modal" style="font-size: 13px">Cancel</button>
                          <button type="submit" class="fw-semibold btn btn-primary" style="font-size: 13px">
                              <i class="fa-sharp fa-solid fa-plus"></i> Proceed Order</button></button>
                          </button>
                      </div>


                  </form>
              </div>

          </div>
      </div>
  </div>
