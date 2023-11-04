<div class="card d-flex justify-content-center align-items-center table-responsive mt-5 shadow-lg">
    <div class="mb-4 ms-auto">
        <form class="d-flex mt-2">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                style="border-bottom-color: #6c3ca4;">
            <button class="btn btn-primary me-3" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div style="margin: 20px auto; width: 100%;">
        <table class="table table-striped table-hover ">
            <thead>
                <tr class=" fw-semibold">
                    <td scope="col" class="text-secondary text-center">Name</td>
                    <td scope="col" class="text-secondary text-center">Email</td>
                    <td scope="col" class="text-secondary text-center">Role</td>
                    <td scope="col" class="text-secondary text-center--">Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if ($user->role == 0 || $user->role == 1)
                        @if ($editing == true && $user->id == $editing_id)
                            <tr>
                                <form>
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
                                    <a wire:click='cancel_edit' class="text-danger mx-1" style="cursor: pointer">
                                        <i class="fas fa-cancel fs-5"></i>
                                    </a>
                                    <a wire:click='save_edit({{ $user->id }})' class="mx-1 text-success"
                                        style="cursor: pointer">
                                        <i class="fas fa-save fs-5"></i>
                                    </a>
                                </td>
                            </form>
                        </tr>
                    @else
                        <tr>
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
                                <a wire:click='edit_user({{ $user->id }})' class="mx-1 text-primary"
                                    style="cursor: pointer">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @if ($user->role == 0)
                                    <a class="text-secondary mx-1" style="cursor: pointer">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                @else

                                    <a wire:click='delete_confirm({{$user->id}})' class="text-danger mx-1" style="cursor: pointer">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endif

                @endforeach
            </tbody>
        </table>
    </div>
</div>
