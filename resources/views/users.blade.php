<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto lg:px-2">
            <div>
                @if ($pending_user_mode == true)
                    <div class="p-3 d-flex justify-content-end">
                        <button class="btn btn-primary btn-sm rounded-pill me-2" wire:click='pending_user_mode_off'>
                            User Management
                        </button>

                    </div>
                    @include('livewire.pages.users.pending_user_management')
                    @else
                    <div class="p-3 d-flex justify-content-end">
                        <button class="btn btn-primary btn-sm rounded-pill me-2" wire:click='pending_user_mode_on'>
                            <span class="badge text-bg-light">{{ $pending_user_count }}</span> Pending Users
                        </button>

                    </div>
                    @include('livewire.pages.users.users_management')
                @endif

                <div class="d-flex justify-content-center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
