<div>
    @if ($pending_user_count > 0)
        <div class="card d-flex justify-content-center align-items-center table-responsive mt-5 shadow-lg">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <td scope="col" class="text-secondary text-center">Name</td>
                        <td scope="col" class="text-secondary text-center">Email</td>

                        <td scope="col" class="text-secondary text-center">Actions</td>
                    </tr>
                </thead>

                <tbody class="text-center">
                    @foreach ($pending_users as $item)
                        <tr wire:key='{{ $item->id }}'>
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center">{{ $item->email }}</td>
                            <td class="text-center">
                                <button wire:click='accept_confirm({{ $item->id }})'
                                    class="btn btn-primary px-3"><i class="fas fa-check"></i>
                                    Approve User
                                </button>
                                <button wire:click='delete_confirm({{$item->id}})' class="btn btn-danger px-3"><i class="fas fa-trash"></i></i>
                                    Cancel
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="p-3 mt-3 bg-white  rounded shadow-sm">
            <p class="fs-30 fw-20">There are no pending users at the moment</p>
        </div>
    @endif
</div>
