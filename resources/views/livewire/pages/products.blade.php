<div>

    <div class="container rounded p-3 " style="background: hsl(0, 0%, 0%, .7)">
        <div class="container-fluid d-flex ">
            <div class="container">

                <form>
                    <div class="form-floating w-50">
                        <input type="text" id="search" class="form-control " placeholder="...">
                        <label for="search">Search</label>
                    </div>
                </form>
            </div>

            <div class="container d-flex align-items-center " style="justify-content: end">
                <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#addBrand"><i
                        class="bi bi-patch-plus-fill"></i> Brands</button>
                <button class="btn btn-outline-light m-2" wire:click='addProductMode'><i
                        class="bi bi-patch-plus-fill"></i> Products</button>
            </div>
        </div>
    </div>

    @if (!$addProduct)
        <div class="container mt-2 rounded " style="height: 100vh; background: hsl(39, 100%, 50%, .3)">

        </div>
    @else
        <div class="container p-3 d-flex justify-content-center align-items-center mt-2 rounded">
            <div class="container p-5 rounded bg-dark ">
                <form action="">
                    <div class="form-group mt-2">

                        <input type="file" accept="image/png, image/jpg" id="image" class="form-control">
                    </div>

                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" placeholder="..." id="name">
                        <label for="name">Product Name</label>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="number" class="form-control" placeholder="..." id="quantity">
                        <label class="text-dark" for="quantity">Quantity</label>
                    </div>

                    <div class="form-group   mt-2 ">
                        <label for="Dropdown">Select Class</label>
                        <select class="form-select  " >
                            <option value="">Select a brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>
    @endif


    @include('livewire.modals.add-brand-modal')

</div>


@push('dismiss-add-brand-script')
    <script>
        window.AddEventListener('hide:add-brand-modal', funciton() {
            $('#addBrand').modal('hide');
        })
    </script>
@endpush
