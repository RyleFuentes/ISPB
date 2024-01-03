<div class="p-3">
    @include('livewire.messages.message')
    
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">Add categories</button></span>

    <div class="mt-3 p-3 flex gap-3 overflow-x-auto">
        @foreach ($categories as $item)
            <div  wire:key='{{$item->id}}' class="mt-3 shadow-md border border-1  transition-all ease-in-out hover:cursor-pointer bg-white p-3 rounded-pill ">
                <button class="text-danger" wire:click='deleteCategory({{$item->id}})'><i class="bi bi-x-circle"></i></button>
                {{$item->category}}
            </div>
        @endforeach
    </div>


    @include('livewire.modals.add-categories')
</div>
