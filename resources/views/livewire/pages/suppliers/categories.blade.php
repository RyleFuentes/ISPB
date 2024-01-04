<div class="p-3">
    @include('livewire.messages.message')
    

    <div class="mt-2 p-3 flex gap-3 overflow-x-auto">
        @foreach ($categories as $item)
            <div  wire:key='{{$item->id}}' class="flex gap-1 mt-3 shadow-md border border-1  transition-all ease-in-out hover:cursor-pointer bg-white p-3 rounded-pill ">
                {{$item->category}}
            </div>
        @endforeach
    </div>


    @include('livewire.modals.add-categories')
</div>
