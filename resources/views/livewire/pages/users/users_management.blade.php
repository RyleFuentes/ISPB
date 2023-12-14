<div class="card d-flex justify-content-center align-items-center table-responsive mt-2 shadow-lg">
    

    <div style="margin: 20px auto; width: 100%;">
        <table class="table table-striped table-hover ">
            <thead>
                <tr class=" fw-semibold">
                    <td scope="col" class="text-secondary ">slkdjf</td>
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
                                    <td>{{$user->email}}</td>
                                   
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
                                        <span class="badge bg-danger">Admin</span>
                                    @else
                                        <span class="badge bg-warning">Inventory Clerk</span>
                                    @endif
                                </td>
                                <td style="font-size: 12px">

                                    <button class="btn btn-primary px-3" wire:click='edit_user({{ $user->id }})'>
                                        <i class="fas fa-edit"></i>
                                        Edit User
                                    </li>
                                    @if ($user->role != 0)
                                        <button
                                            wire:click='delete_confirm({{ $user->id }})'class="btn btn-danger ms-2 px-3">
                                            <i class="fas fa-trash"></i>
                                            Delete User
                                        </button>
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
