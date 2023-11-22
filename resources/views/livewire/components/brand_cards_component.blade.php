<div class="mt-3 p-5 bg-white shadow-sm rounded fs-40 fw-40">
    @include('livewire.messages.message')

    <div class="mt-3 d-flex flex-wrap justify-content-evenly" style="gap: 5px">
        @foreach ($brands as $brand)
            <div class="card  shaw-sm" style="width: 18rem;">
                <img src="{{ Storage::url($brand->brand_image) }}" class="card-img-top"
                    alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$brand->brand_name}}</h5>
                    <a href="#" class="btn btn-primary">products</a>
                </div>
            </div>
        @endforeach



    </div>
</div>