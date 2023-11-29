<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto lg:px-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <livewire:pages.users.users_table />
            </div>
        </div>
    </div>
</x-app-layout>
