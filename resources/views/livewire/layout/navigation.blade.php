<?php

use App\Livewire\Actions\Logout;
use App\Livewire\Forms\LogoutForm;
use Livewire\Volt\Component;

new class extends Component {




    
    public function logout(Logout $logout)
    {
        $logout();

        return redirect()->route('login');
    }
}; ?>

<nav x-data="{ open: false }" class="mt-2">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8  shadow-sm sm:rounded-lg bg-white">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <i class="fas fa-align-justify primary-text fs-4 me-3 text-primary" id="menu-toggle"></i>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 fw-medium">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (auth()->user()?->profile?->profile_image !== null)
                            <div class="profile-icon me-3 border">
                                <img src="{{ Storage::url(auth()->user()->profile->profile_image) }}"
                                    class="img rounded-circle" alt="preview" style="object-fit: cover; width: 100%; height: 100%;">
                            </div>
                        @else
                            <div class="profile-icon me-3 border d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-user rounded-circle"></i>
                            </div>
                        @endif

                        </button>
                    </x-slot>

                    <x-slot name="content" class="w-100">
                        <div
                            class="mb-4 border-bottom d-flex justify-content-center flex-column align-items-center w-100">
                            <p class="mt-2 text-center text-uppercase fw-semibold">
                                {{ auth()->user()->name }}
                            </p>
                            @if (auth()->user()?->profile?->profile_image !== null)
                                <div class="profile-dropdown border border-dark mb-2">
                                    <img src="{{ Storage::url(auth()->user()->profile->profile_image) }}"
                                        class="img-fluid rounded-circle" alt="preview" style="object-fit: cover; width: 100%; height: 100%;">
                                </div>
                            @else
                                <div
                                    class="profile-dropdown border border-dark mb-2 d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-user rounded-circle"></i>
                                </div>
                            @endif
                            <p class="text-center text-secondary text-lowercase fw-medium" style="font-size: 12px">
                                {{ auth()->user()->email }}
                            </p>
                        </div>

                        <x-dropdown-link :href="route('profile')" wire:navigate>
                            <i class="fas fa-user me-3"></i>
                            {{ __('PROFILE') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link>
                                <i class="fas fa-sign-out me-3"></i>
                                {{ __('LOG OUT') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800" x-data="{ name: '{{ auth()->user()->name }}' }" x-text="name"
                    x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
