<!-- Button trigger modal -->


<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addSuppliersModal" tabindex="-1" aria-labelledby="addSuppliersModalLabel"
    aria-hidden="true">
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
                        <x-input-label for="name" :value="__('Supplier Name')" />
                        <x-text-input wire:model='form.name' type="text" id="name" placeholder="Enter Supplier"
                            class="mt-1 block w-full" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('form.name')" />
                    </div>

                    <div class="mt-3">
                        <x-input-label for="email" :value="__('Supplier Email')" />
                        <x-text-input wire:model="form.email" wire:model='form.email' type="email" id="email"
                            placeholder="supplier@gmail.com" class="mt-1 block w-full" required autofocus="email" />
                        <x-input-error class="mt-2" :messages="$errors->get('form.email')" />
                    </div>

                    <div class="mt-3">
                        <x-input-label for="agent" :value="__('Agent Name')" />
                        <x-text-input wire:model="agent_name" id="contact" name="agent" type="text"
                            placeholder="John Doe" class="mt-1 block w-full" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('agent')" />
                    </div>



                    <div class="mt-3">
                        <x-input-label for="agent_number" :value="__('Agent number (Format: 09*******06)')" />
                        <x-text-input wire:model="agent_number" pattern="^09[0-9]{9}$" id="contact"
                            name="agent_number" type="tel" placeholder="09817281106" class="mt-1 block w-full"
                            required autofocus autocomplete="agent_number" />
                        <x-input-error class="mt-2" :messages="$errors->get('agent_number')" />
                    </div>


                    <div class="mt-3">
                      <select multiple="multiple" wire:model='test' class="form-select" id="testSelect" aria-label="Default select example">
                        <option selected>Choose category for this product</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>



