<div class="p-3 rounded shadow-sm bg-white">
    <div class="row">
        <div class="col">
            <form wire:submit='add_brand'>
                <div class="form-floating mt-3">
                    <input type="text" id='brand_name' class="form-control" placeholder="..." wire:model='add_brands_form.brand_name'>
                    <label for="brand_name">Brand Name</label>
                </div>
                @error('add_brands_form.brand_name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
        
                <div class="form-group mt-3">
                    <label for="brand_image">Brand Image</label>
                    <input type="file" accept="image/png, image/jpeg" id='brand_image' class="form-control" placeholder="..." wire:model='add_brands_form.brand_image'>
                </div>

                @error('add_brands_form.brand_image')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group mt-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Add Brand</button>
                </div>
            </form>
        </div>

        <div class="col col-sm col-md">
            @if ($add_brands_form->brand_image)
                
                    <div class="col rounded d-flex flex-column justify-content-center align-items-center mt-3 mt-sm-0">
                        <img src="{{$add_brands_form->brand_image->temporaryUrl() }}" class="image-fluid rounded sm" alt="preview" width="250" height="250">
                    </div>

            @else

                <div class="col rounded d-flex flex-column justify-content-center align-items-center mt-3 mt-sm-0">
                    <img class="img-fluid" src="{{ asset('images/logo.png') }}" alt="logo">
                </div>

            @endif
        </div>
    </div>
    
</div>