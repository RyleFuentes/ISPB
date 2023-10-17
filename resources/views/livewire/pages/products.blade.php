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
                            <div class="card-framez">
                                <img class="imgz" src="{{ Storage::url($product->product_image) }}" alt="product image">
                                <div class="card-boxz">
                                    <div class="contentz">
                                        <h3>{{ $product->product_name }}</h3>
                                         <p class="card-text c-text">Quantity: {{ $product->quantity }}</p>
                                         <p class="card-text c-text">Retail Price: {{ $product->retail_price }}</p>
                                         <p class="card-text c-text">Wholesale Price: {{ $product->wholesale_price }}</p>
                                         <p class="card-text c-text">Brand: {{ optional($product->brand)->brand_name }}.</p>
                                         <div class="d-flex">
                                             <button class="btn btn-sm c-text" style="background-color: #7d5ea3">Delete</button>
                                             <button class="btn btn-sm c-text" style="background-color: #c6a4f0">Edit</button>
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
