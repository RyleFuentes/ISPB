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

                        <input type="image" src="" alt="" class="form-control">
                    </div>

                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" placeholder="..." id="name">
                        <label for="name">Product Name</label>
                    </div>

                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" placeholder="..." id="name">
                        <label for="name">Product Name</label>
                    </div>

                    <div class="form-floating mt-2">
                        <input type="number" class="form-control" placeholder="..." id="quantity">
                        <label class="text-dark" for="quantity">Quantity</label>
                    </div>

                    <div class="form-group mt-2">
                        <div>
                            <input type="text" class="text-dark form-control" wire:model.live='brand_chosen' disabled>
                        </div>

                        <div class="dropdown mt-2">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Brands
                            </a>
                          
                            <ul class="dropdown-menu">
                                @foreach ($brands as $brand)
                                    <li><a wire:model='brand_chosen' class="dropdown-item " href="#" >{{$brand->brand_name}}</a></li>
                                @endforeach
    
                            </ul>
                          </div>
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
