<div>
    <div class="d-flex" id="wrapper">
        @include('layout.sidebar')
        <div class="container-fluid px-4" id="dashboard">
            @include('layout.navbar')
            <table class="table">
                <thead>
                    <tr class="text-center fs-6">
                        <td scope="col">ID</td>
                        <td scope="col">Name</td>
                        <td scope="col">Email</td>
                        <td scope="col">Role</td>
                        <td scope="col">Actions</td>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($users as $user)
                        @if ($editing == true && $user->id == $editing_id)
                            <tr>
                                <form>
                                    <th scope="row">{{ $user->id }}</th>

                                    <td><input wire:model='edit_name' type="text" class="form-control"
                                            value="{{ $user->name }}"></td>
                                    @error('edit_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <td><input wire:model='edit_email' type="email" class="form-control"
                                            value="{{ $user->email }}"></td>
                                    @error('edit_email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <td>
                                        <select class="form-select" aria-label="Default select example"
                                            wire:model='edit_role'>
                                            <option value="0" {{ $edit_role == 0 ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="1" {{ $edit_role == 1 ? 'selected' : '' }}>
                                                Inventory Clerk
                                            </option>
                                        </select>
                                    </td>
                                    @error('edit_role')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <td class="d-flex justify-content-evenly">
                                        <button wire:click='cancel_edit' class="btn btn-warning mx-1">Cancel</button>
                                        <button wire:click='save_edit({{ $user->id }})'
                                            class="btn btn-success mx-1">Save</button>
                                    </td>
                                </form>
                            </tr>
                        @else
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
                                <td class="d-flex justify-content-evenly">
                                    <button wire:click='edit_user({{ $user->id }})'
                                        class="btn btn-success mx-1">Edit</button>
                                    <button class="btn btn-danger mx-1">Delete</button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
