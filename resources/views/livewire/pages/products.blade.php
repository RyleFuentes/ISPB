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
                                 <td scope="col" class="text-secondary text-center">Product Name</td>
                                 <td scope="col" class="text-secondary text-center">Quantity</td>
                                 <td scope="col" class="text-secondary text-center">RSP</td>
                                 <td scope="col" class="text-secondary text-center">WSP</td>
                                 <td scope="col" class="text-secondary text-center">Action</td>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($products as $product)
                                 <tr class="fw-semibold">
                                     <td class="text-center">{{ $product->product_name }}</td>
                                     <td class="text-center">{{ $product->quantity }}</td>
                                     <td class="text-center">50</td>
                                     <td class="text-center">1200</td>
                                     <td class="text-center">
                                         <button type="button" class="btn" data-bs-toggle="modal"
                                             data-bs-target="#viewProduct">
                                             <i class="fas fa-eye fs-6 text-success"></i>
                                         </button>
                                         <button wire:click='' class="btn text-primary mx-1" style="cursor: pointer">
                                             <i class="fas fa-edit fs-6"></i>
                                         </button>
                                         <button wire:click='' class="btn mx-1 text-danger" style="cursor: pointer">
                                             <i class="fas fa-trash fs-6"></i>
                                         </button>
                                     </td>
                                 </tr>
                                 @include('livewire.modals.view_product_modal')
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
