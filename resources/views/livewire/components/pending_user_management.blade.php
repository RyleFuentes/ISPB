<div  class="card d-flex justify-content-center align-items-center table-responsive mt-5 shadow-lg">
    <div class="mb-4 ms-auto">
        <form class="d-flex mt-2">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                style="border-bottom-color: #6c3ca4;">
            <button class="btn btn-primary me-3" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr class="text-center fs-6">
                <td scope="col" class="text-primary">ID</td>
                <td scope="col" class="text-primary">Name</td>
                <td scope="col" class="text-primary">Email</td>

                <td scope="col" class="text-primary">Actions</td>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($pending_users as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>
                    <button wire:confirm="Are you sure?" wire:click='accept_user({{$item->id}})' class="btn btn-outline-success"><i class="bi bi-check2-circle"></i></button>
                    <button class="btn btn-outline-danger"><i class="bi bi-trash"></i></i></button>
                </td>
            </tr>
            @endforeach
           
        </tbody>
    </table>
</div>