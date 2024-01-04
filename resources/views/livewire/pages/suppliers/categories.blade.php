<div class="p-3">
    @include('livewire.messages.message')

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">Add categories</button></span>

    <div class="mt-2 p-3 flex gap-3 overflow-x-auto">
        @foreach ($categories as $item)
            <div wire:key='{{ $item->id }}'
                class="flex gap-1 mt-3 shadow-md border border-1 border-secondary px-3 py-2 transition-all ease-in-out hover:cursor-pointer badge text-bg-light">
                <span class="uppercase font-bold text-primary">{{ $item->category }}</span>
            </div>
        @endforeach
    </div>
    @include('livewire.modals.add-categories')
</div>
