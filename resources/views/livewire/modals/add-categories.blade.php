
  
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addCategoryLabel">Add Categories</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @include('livewire.messages.modal_message')
          <form wire:submit='store'>
            <div class="form-floating mt-2">
                <input wire:model='name' type="text" placeholder="..." class="form-control" id="category">
                <label for="category">Category</label>
            </div>

            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror

          <div class="mt-3 flex justify-content-end gap-2">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
          </div>

        </form>
        
      </div>
    </div>
  </div>