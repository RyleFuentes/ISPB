<div wire:ignore.self class="modal fade" id="addSuppliersModal" tabindex="-1" aria-labelledby="addSuppliersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            @include('livewire.messages.modal_message')
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Suppliers</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body overflow-hidden">
                <form wire:submit='add_supplier'>

                    <div class="mt-3">
                        <label for="brands">Brand</label>
                        <select class="form-select" name="" id="brands" wire:model='form.brand_id'>
                            <option value="" selected>---Choose a brand---</option>
                            @foreach ($form->brands() as $item)
                                <option key="{{ $item->brand_id }}" value="{{ $item->brand_id }}">
                                    {{ $item->brand_name }}</option>
                            @endforeach
                        </select>

                        <x-input-error class="mt-2" :messages="$errors->get('form.brand_id')" />
                    </div>


                    <div class="mt-3">
                        <x-input-label for="agent" :value="__('Agent Name')" />
                        <x-text-input wire:model="form.name" id="contact" name="agent" type="text"
                            placeholder="John Doe" class="mt-1 block w-full" autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('form.name')" />
                    </div>

                    <div class="mt-3">
                        <x-input-label for="email" :value="__('Supplier Email')" />
                        <x-text-input wire:model="form.email" wire:model='form.email' type="email" id="email"
                            placeholder="supplier@gmail.com" class="mt-1 block w-full" autofocus="email" />
                        <x-input-error class="mt-2" :messages="$errors->get('form.email')" />
                    </div>




                    <div class="mt-3">
                        <x-input-label for="agent_number" :value="__('Agent number (Format: 09*******06)')" />
                        <x-text-input wire:model="form.agent_number" pattern="^09[0-9]{9}$" id="contact"
                            name="agent_number" type="tel" placeholder="09817281106" class="mt-1 block w-full"
                            autofocus autocomplete="agent_number" />
                        <x-input-error class="mt-2" :messages="$errors->get('form.agent_number')" />
                    </div>


                    <div class="mt-3">
                        <x-input-label for="desc" :value="__('Supplier Description')" />
                        <textarea class="form-control" name="desc" wire:model='form.desc' id="desc" cols="30" rows="3"></textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('form.desc')"></x-input-error>
                    </div>

                    <div class="mt-3">
                        <x-input-label for="desc" :value="__('Category')" />
                        @foreach ($this->categories as $item)
                            <input type="checkbox" name="" id="" class="form-check-input overflow-y-auto"
                                wire:model='form.categories' value="{{ $item->id }}"> {{ $item->category }}
                        @endforeach
                        <x-input-error class="mt-2" :messages="$errors->get('form.categories')"></x-input-error>
                    </div>

                    <div class="mt-3 flex justify-end gap-2">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
