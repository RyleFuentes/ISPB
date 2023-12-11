<div class="card d-flex justify-content-center align-items-center table-responsive mt-2 shadow-lg">
    

    <div style="margin: 20px auto; width: 100%;">
        <table class="table table-striped table-hover ">
            <thead>
                <tr class=" fw-semibold">
                    <td scope="col" class="text-secondary ">Name</td>
                    <td scope="col" class="text-secondary ">Email</td>
                    <td scope="col" class="text-secondary ">Role</td>
                    <td scope="col" class="text-secondary ">Actions</td>
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
                                <td>

                                    <div class="dropstart">
                                        <button class="dropdown-toggle action" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu" style="width: 250px; font-size: 13px">
                                            <li wire:click='edit_user({{ $user->id }})'>
                                                <i class="fas fa-edit"></i>
                                                Edit User
                                            </li>
                                            @if ($user->role != 0)
                                                <li
                                                    wire:click='delete_confirm({{ $user->id }})'class="mt-2" style="cursor: pointer">
                                                    <i class="fas fa-trash"></i>
                                                    Delete User
                                                </li>
                                            @endif

                                        </ul>
                                    </div>

                                </td>
                            </tr>
                        @endif
                    @endif

                @endforeach
            </tbody>
        </table>
    </div>
</div>
