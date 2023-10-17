  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form action="">

                    <select class="form-select mt-2" aria-label="Default select example">
                        <option selected>--- select brand ---</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>

                      <div class="form-floating mt-2">
                          <input type="date" class="form-control" placeholder="..." id="due_date">
                          <label for="due_date">Due Date</label>
                      </div>
                      @error('due_date')
                          <span class="text-danger">{{$message}}</span>
                      @enderror

                      <div class="form-floating mt-2">
                          <input type="number" class="form-control" placeholder="..." id="qty">
                          <label for="qty">Quantity</label>
                      </div>
                      @error('order_quantity')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                      <select class="form-select mt-2" aria-label="Default select example">
                          <option selected>Choose product</option>
                          @foreach ($products as $product)
                              <option value="{{ $product->product_id }}">{{ $product->product_name }}</option>
                          @endforeach

                      </select>

                 

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>


                  </form>
              </div>
          </div>
      </div>
  </div>
