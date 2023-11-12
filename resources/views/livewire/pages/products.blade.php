 <div class="d-flex" id="wrapper">
     @include('layout.sidebar')
     <div class="container-fluid px-4" id="dashboard">
         @include('layout.navbar')
         @include('livewire.messages.message')
         <div class="p-3 d-flex justify-content-end">
             <button class="btn btn-light btn-sm rounded-pill me-2" data-bs-toggle="modal" data-bs-target="#addBrand">
                 <i class="fa fa-plus-circle me-2 text-primary"></i>Add Brand
             </button>
             <button class="btn btn-light btn-sm rounded-pill me-2" wire:click='addProductMode'>
                 <i class="fa fa-plus-circle me-2 text-primary"></i>Add Products
             </button>
         </div>

         @if (!$addProduct)
             <div class="card d-flex justify-content-center align-items-center table-responsive mt-5 shadow-lg">
                 <div class="mb-4 ms-auto">
                     <form class="d-flex mt-2">
                         <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                             style="border-bottom-color: #6c3ca4;">
                         <button class="btn btn-primary me-3" type="submit">
                             <i class="fas fa-search"></i>
                         </button>
                     </form>
                 </div>

                 <div style="margin: 20px auto; width: 100%;">
                     <table class="table table-striped table-hover ">
                         <thead>
                             <tr class=" fw-semibold">
                                 <td scope="col" class="text-secondary">Image</td>
                                 <td scope="col" class="text-secondary">Product Name</td>
                                 <td scope="col" class="text-secondary">Brand</td>
                                 <td scope="col" class="text-secondary">Quantity</td>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($products as $product)
                                 <tr class="fw-semibold">
                                     <td>Test</td>
                                     <td>{{$product->product_name}}</td>
                                     <td>{{$product->brand}}</td>
                                     <td>{{$product->quantity}}</td>
                                 </tr>
                             @endforeach

                         </tbody>
                     </table>
                 </div>
             </div>
         @else
             @include('livewire.components.add_products_component')
         @endif


         @include('livewire.modals.add-brand-modal')
     </div>
 </div>

 @push('dismiss-add-brand-script')
     <script>
         window.AddEventListener('hide:add-brand-modal', function() {
             $('#addBrand').modal('hide');
         })
     </script>
 @endpush
