<div>
    @include('modals.add-products-modal')
    @include('modals.add-brand-modal')
    <div class="container rounded p-3 " style="background: hsl(0, 0%, 0%, .7)">
        <div class="container-fluid d-flex " >
            <div class="container">

                <form >
                     <div class="form-floating w-50" >
                         <input type="text" id="search" class="form-control " placeholder="...">
                         <label for="search">Search</label>
                     </div>
                </form>
            </div>
     
            <div class="container d-flex align-items-center " style="justify-content: end">
                <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#addBrand"><i class="bi bi-patch-plus-fill"></i> Brands</button>
                <button class="btn btn-outline-light m-2" data-bs-toggle="modal" data-bs-target="#addProducts"><i class="bi bi-patch-plus-fill"></i> Products</button>
            </div>
        </div>
    </div>

    <div class="container mt-2 rounded " style="height: 100vh; background: hsl(39, 100%, 50%, .3)">

    </div>
    
</div>
