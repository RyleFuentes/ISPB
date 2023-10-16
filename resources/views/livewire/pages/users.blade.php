<div>
    <div class="d-flex" id="wrapper">
        @include('layout.sidebar')
        <div class="container-fluid px-4" id="dashboard">
            @include('layout.navbar')
            <div class="card d-flex justify-content-center align-items-center mt-5">
                <table class="table mt-5">
                    <thead>
                        <tr class="text-center fs-6">
                            <td scope="col" class="text-primary">ID</td>
                            <td scope="col" class="text-primary">Name</td>
                            <td scope="col" class="text-primary">Email</td>
                            <td scope="col" class="text-primary">Role</td>
                            <td scope="col" class="text-primary">Actions</td>
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
                                        <td class="text-center">
                                            <a wire:click='cancel_edit' class="text-danger mx-1"  style="cursor: pointer">
                                                <i class="fas fa-cancel fs-5"></i>
                                            </a>
                                            <a wire:click='save_edit({{ $user->id }})'
                                                class="mx-1 text-success" style="cursor: pointer">
                                                <i class="fas fa-save fs-5"></i>
                                            </a>
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
                                    <td class="text-center">
                                        <a wire:click='edit_user({{ $user->id }})'
                                            class="mx-1 text-primary" style="cursor: pointer">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="text-danger mx-1" style="cursor: pointer">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{--  --}}
