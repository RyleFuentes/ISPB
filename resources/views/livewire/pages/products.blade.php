 <div class="d-flex" id="wrapper">
     @include('layout.sidebar')
     <div class="container-fluid px-4" id="dashboard">
         @include('layout.navbar')
         <div class="p-3 d-flex justify-content-end">
             <button class="btn btn-light btn-sm rounded-pill me-2" data-bs-toggle="modal" data-bs-target="#addBrand">
                 <i class="fa fa-plus-circle me-2 text-primary"></i>Add Brand
             </button>
             <button class="btn btn-light btn-sm rounded-pill me-2" wire:click='addProductMode'>
                 <i class="fa fa-plus-circle me-2 text-primary"></i>Add Products
             </button>
         </div>

         @if (!$addProduct)
             <div class="container">
                     <div class="row row-cols-lg-3 row-cols-md-2 ">
                         @foreach ($products as $product)
                             <div class="col d-flex justify-content-around">
                                 <div class="card m-1" style="width: 14rem;">
                                     <img src="{{ Storage::url($product->product_image) }}" class="card-img-top"
                                         alt="...">
                                     <div class="card-body">
                                         <p class="card-text">Product name: {{ $product->product_name }}</p>
                                         <p class="card-text">Quantity: {{ $product->quantity }}</p>
                                         <p class="card-text">Retail Price: {{ $product->retail_price }}</p>
                                         <p class="card-text">Wholesale Price: {{ $product->wholesale_price }}</p>
                                         <p class="card-text">Brand: {{ optional($product->brand)->brand_name }}.
                                         </p>

                                         <div>
                                             <button class="btn btn-danger btn-sm">Delete</button>
                                             <button class="btn btn-warning btn-sm">Edit</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         @endforeach
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
