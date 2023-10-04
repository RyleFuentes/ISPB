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

    <div class="container mt-2 rounded p-3 ">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->role == 0)
                                <span class="text-danger">Admin</span>
                            @else
                                <span class="text-warning">Inventory Clerk</span>
                            @endif
                        </td>
                        <td>
                            <button wire:click='edit_user({{$user->id}})' class="btn btn-success">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>
