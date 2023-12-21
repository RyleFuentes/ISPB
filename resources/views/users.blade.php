<div >
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div>

        <div class="max-w-7xl mx-auto lg:px-2">
            <div class="px-3 d-flex justify-content-end">
               
                   
                </button>

            </div>
            <div>


                    @include('livewire.pages.users.users_management')
              


                <div class="d-flex justify-content-center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
