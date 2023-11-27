  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Add Order</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form>

                      <div class="form-group mt-2">
                        <label for="brand">Brand</label>
                          <select id='brand' wire:model.lazy='add_order.brand' wire:change='updateProducts' class="form-select mt-2"
                              aria-label="Default select example">
                              <option  selected >--- select brand ---</option>
                              @foreach ($brands as $brand)
                                  <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                              @endforeach

                          </select>
                      </div>

                      {{-- @if ($products ?? null)

                          <div class="form-group mt-2">
                              <select wire:model.lazy='add_order.product' class="form-select mt-2"
                                  aria-label="Default select example">
                                  <option selected>--- select product ---</option>
                                  @foreach ($products as $product)
                                      <option value="{{ $product->product_id }}">{{ $product->product_name }}</option>
                                  @endforeach
                              </select>
                          </div>

                      @endif --}}

                   
                        @if ($add_order->brand)
                            <div class="mt-2">
                                <label for="product">Product</label>
                                <select wire:model="product" id="product" class="form-select mt-2">
                                    <option value="">Select a product</option>
                                    @foreach ($products as $product)
                                        <option  value="{{ $product->product_id }}">{{ $product->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
        

                      <div class="form-floating mt-2">
                          <input type="date" class="form-control" placeholder="..." id="due_date">
                          <label for="due_date">Due Date</label>
                      </div>
                      @error('due_date')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                      <div class="form-floating mt-2">
                          <input type="number" class="form-control" placeholder="..." id="qty">
                          <label for="qty">Quantity</label>
                      </div>
                      @error('order_quantity')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror




              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Proceed Order</button>


                  </form>
              </div>
          </div>
      </div>
  </div>
