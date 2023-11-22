<div class="modal fade" id="viewProduct" tabindex="-1" aria-labelledby="viewProduct" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-primary" id="viewProduct">Product Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <p>Name: {{ $product->product_name}}</p>
                <p>Category: {{ $product->brand->brand_name}}</p>
                <p>Quantity: {{ $product->quantity}}</p>
                <p>Retail price: {{ $product->retail_price}}</p>
                <p>Wholesale price: {{ $product->wholesale_price}} </p>
                <p>Date Purchased: </p>
                <p>Expiry: </p>


            </div>
        </div>
    </div>
</div>