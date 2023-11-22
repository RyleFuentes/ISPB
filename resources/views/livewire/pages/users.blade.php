<div>
    @if ($pending_user_mode == true)
                    <div class="p-3 d-flex justify-content-end">
                        <button class="btn btn-light btn-sm rounded-pill me-2" wire:click='pending_user_mode_off'>
                            User Management
                        </button>
    
                    </div>
                    @include('livewire.components.pending_user_management')
                @else
                    <div class="p-3 d-flex justify-content-end">
                        <button class="btn btn-light btn-sm rounded-pill me-2" wire:click='pending_user_mode_on'>
                            <span  class="badge text-bg-info">{{ $pending_user_count }}</span> Pending Users
                        </button>
    
                    </div>
                    @include('livewire.components.user_management')
                @endif
    
                <div class="d-flex justify-content-center">
                        {{ $users->links() }}
                </div>
</div>