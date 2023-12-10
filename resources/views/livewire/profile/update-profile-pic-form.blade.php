<div>
    @include('livewire.messages.message')
    <section>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Picture') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile Picture.") }}
        </p>

        <form wire:submit='update_pic'>
            @if ($profilePic)
                <div class="col rounded d-flex flex-column mt-3 mt-sm-0">
                    <img src="{{ $profilePic->temporaryUrl() }}" class="image-fluid rounded sm"
                        alt="preview" width="250" height="250">
                </div>
            @else
                <div class="d-flex justify-content-center align-items-center col rounded mt-3 mt-sm-0">
                    <div class="brand-image-upload d-flex px-3 justify-content-center align-items-center flex-column">
                        <p class="text-secondary">
                            <i class="fa-solid fa-image"></i>
                            Upload Image Here
                        </p>
                        <label for="brand_image" class="custom-file-input bg-primary">Upload Image
                            File</label>
                        <input type="file" accept="image/png, image/jpeg" id='brand_image' class="form-control"
                            placeholder="..." wire:model='profilePic'>
                    </div>
                </div>
            @endif


            <div class="mt-2 p-2">
                @error('profilePic')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="mt-3">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                <x-action-message class="me-3" on="profile-updated">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
        </form>


    </section>
</div>
