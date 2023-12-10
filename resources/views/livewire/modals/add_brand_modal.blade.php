<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addBrandModalLabel">Add Brand</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                <div>
                    <form wire:submit='add_brand'>
                        <div class="mt-3">
                            <label for="brand_name" class="modal-input-label">Brand Name</label>
                            <input type="text" id='brand_name' class="modal-input-field  form-control"
                                placeholder="Enter Brand Name" wire:model='add_brands_form.brand_name'>
                        </div>
                        @error('add_brands_form.brand_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group mt-3">
                            <label for="brand_image" class="modal-input-label">Brand Image</label>


                            <div class="col mt-3 col-sm col-md">
                                @if ($add_brands_form->brand_image)
                                    <div
                                        class="col rounded d-flex flex-column justify-content-center align-items-center mt-3 mt-sm-0">
                                        <img src="{{ $add_brands_form->brand_image->temporaryUrl() }}"
                                            class="image-fluid rounded sm" alt="preview" width="250" height="250">

                                        <label for="brand_image" class="custom-file-input bg-primary">Change Uploaded Photo</label>
                                        <input type="file" accept="image/png, image/jpeg" id='brand_image'
                                            class="form-control" placeholder="..."
                                            wire:model='add_brands_form.brand_image'>
                                    </div>
                                @else
                                    <div
                                        class="d-flex justify-content-center align-items-center col rounded mt-3 mt-sm-0">
                                        <div
                                            class="brand-image-upload d-flex px-3 justify-content-center align-items-center flex-column">
                                            <p class="text-secondary">
                                                <i class="fa-solid fa-image"></i>
                                                Upload Image Here
                                            </p>
                                            <label for="brand_image" class="custom-file-input bg-primary">Upload Image
                                                File</label>
                                            <input type="file" accept="image/png, image/jpeg" id='brand_image'
                                                class="form-control" placeholder="..."
                                                wire:model='add_brands_form.brand_image'>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @error('add_brands_form.brand_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group mt-5 gap-2 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary px-5" style="font-size: 12px">
                                <i class="fa-sharp fa-solid fa-plus"></i> Add Brand</button></button>
                            </button>
                            <button type="button" class="btn btn-outline-secondary px-5" data-bs-dismiss="modal"
                                style="font-size: 12px">Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>

</div>
