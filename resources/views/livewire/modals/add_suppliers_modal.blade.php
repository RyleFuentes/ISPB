<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="addSuppliersModal" tabindex="-1" aria-labelledby="addSuppliersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        @include('livewire.messages.modal_message')
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Suppliers</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form wire:submit='add_supplier'>
            <div class="mt-2">
                <label for="name" class="modal-input-label">Supplier Name</label>
                <input wire:model='form.name' type="text" id="name" placeholder="Enter Supplier" class="modal-input-field form-control">
            </div>
            @error('form.name')
                <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="mt-2">
              <label  for="email" class="modal-input-label">Supplier Email</label>

                <input wire:model='form.email' type="email" id="email" placeholder="Enter Supplier Email" class="modal-input-field form-control">
            </div>
            @error('form.email')
                <span class="text-danger">{{$message}}</span>
            @enderror
            
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>