<div>
    <div class="card d-flex justify-content-center align-items-center table-responsive mt-5 shadow-lg">
        <div class="mb-4 px-4 mt-3 w-100">
            <div class="d-flex justify-content-between align-items-center">
                <button class="btn btn-primary btn-sm rounded-pill me-2" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="fa fa-plus me-2 text-light"></i>Add Order
                </button>

                <form class="d-flex mt-2">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        style="border-bottom-color: #6c3ca4;">
                    <button class="btn btn-primary me-3" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>

        <div style="margin: 20px auto; width: 100%;">
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="fw-semibold">
                        <td scope="col" class="text-secondary">ID</td>
                        <td scope="col" class="text-secondary">Order</td>
                        <td scope="col" class="text-secondary">Date</td>
                        <td scope="col" class="text-secondary">Price</td>
                        <td scope="col" class="text-secondary">Quantity(kg.)</td>
                        <td scope="col" class="text-secondary">Total</td>
                        <td scope="col" class="text-secondary">Status</td>
                        <td scope="col" class="text-secondary">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Integra</td>
                        <td>10/18/2023</td>
                        <td>46.00</td>
                        <td>3</td>
                        <td>138</td>
                        <td><span class="badge text-bg-warning">Pending</span></td>
                        <td>
                            <a wire:click='' class="text-primary mx-1" style="cursor: pointer">
                                <i class="fas fa-edit fs-6"></i>
                            </a>
                            <a wire:click='' class="mx-1 text-danger"
                                style="cursor: pointer">
                                <i class="fas fa-trash fs-6"></i>
                            </a>
                        </td>
                    </tr>
                     <td>2</td>
                        <td>Integra</td>
                        <td>10/17/2023</td>
                        <td>46.00</td>
                        <td>3</td>
                        <td>138</td>
                        <td><span class="badge text-bg-success">Complete</span></td>
                        <td>
                            <a wire:click='' class="text-primary mx-1" style="cursor: pointer">
                                <i class="fas fa-edit fs-6"></i>
                            </a>
                            <a wire:click='' class="mx-1 text-danger"
                                style="cursor: pointer">
                                <i class="fas fa-trash fs-6"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @include('livewire.modals.add_orders_modal')
</div>
