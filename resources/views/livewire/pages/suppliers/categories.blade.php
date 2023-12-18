<div class="p-3">
    
    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addCategory">Add categories</button></span>

    <div class="mt-3 p-3 flex gap-3 overflow-x-auto">
        @foreach ($categories as $item)
            <div wire:key='{{$item->id}}' class="mt-3 bg-white p-3 rounded-pill shadow-lg">
                {{$item->category}}
            </div>
        @endforeach
    </div>


    @include('livewire.modals.add-categories')
</div>
