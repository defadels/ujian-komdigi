<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div>
    <div 
        x-show="sidebarOpen" 
        class="fixed inset-0 flex z-40 sm:hidden" 
        x-ref="dialog" 
        aria-modal="true"
        style="display: none;"
    >
        <!-- Off-canvas menu overlay -->
        <div 
            x-show="sidebarOpen"
            x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-600 bg-opacity-75" 
            @click="sidebarOpen = false"
        ></div>

        <!-- Off-canvas menu -->
        <div 
            x-show="sidebarOpen"
            x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="relative flex-1 flex flex-col max-w-xs w-full bg-white dark:bg-gray-800"
        >
            <div class="absolute top-0 right-0 -mr-12 pt-2">
                <button @click="sidebarOpen = false" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Close sidebar</span>
                    <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                <div class="flex-shrink-0 flex items-center px-4">
                    <x-application-logo class="h-8 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    <span class="ml-3 font-bold text-xl text-gray-800 dark:text-gray-200">Dashboard</span>
                </div>
                <nav class="mt-5 px-2 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.categories')" :active="request()->routeIs('admin.categories')" wire:navigate>
                        {{ __('Kategori Layanan') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.services')" :active="request()->routeIs('admin.services')" wire:navigate>
                        {{ __('Layanan') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.carousel')" :active="request()->routeIs('admin.carousel')" wire:navigate>
                        {{ __('Carousel') }}
                    </x-responsive-nav-link>
                </nav>
            </div>
            <div class="flex-shrink-0 flex border-t border-gray-200 dark:border-gray-700 p-4">
                <div class="flex-shrink-0 group block">
                    <div class="flex items-center">
                        <div class="ml-3">
                            <p class="text-base font-medium text-gray-700 dark:text-gray-200" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></p>
                            <button wire:click="logout" class="text-sm font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                                {{ __('Logout') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-shrink-0 w-14">
            <!-- Force sidebar to shrink to fit close button -->
        </div>
    </div>

    <!-- Static sidebar for desktop -->
    <div class="hidden sm:flex sm:flex-shrink-0">
        <div class="flex flex-col w-64">
            <div class="flex-1 flex flex-col min-h-0 border-r border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
                <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                    <div class="flex items-center flex-shrink-0 px-4">
                        <x-application-logo class="h-8 w-auto fill-current text-gray-800 dark:text-gray-200" />
                        <span class="ml-3 font-bold text-xl text-gray-800 dark:text-gray-200">Admin Panel</span>
                    </div>
                    <nav class="mt-8 flex-1 px-4 space-y-2">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors duration-150" wire:navigate>
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.categories')" :active="request()->routeIs('admin.categories')" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors duration-150" wire:navigate>
                            {{ __('Kategori Layanan') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.services')" :active="request()->routeIs('admin.services')" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors duration-150" wire:navigate>
                            {{ __('Layanan') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.carousel')" :active="request()->routeIs('admin.carousel')" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors duration-150" wire:navigate>
                            {{ __('Carousel') }}
                        </x-nav-link>
                    </nav>
                </div>
                <div class="flex-shrink-0 flex border-t border-gray-200 dark:border-gray-700 p-4">
                    <div class="flex-shrink-0 w-full group block">
                        <div class="flex items-center">
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-700 dark:text-gray-200" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></p>
                                <div class="flex space-x-2 mt-1">
                                    <a href="{{ route('profile') }}" class="text-xs font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300" wire:navigate>Profile</a>
                                    <button wire:click="logout" class="text-xs font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                                        {{ __('Logout') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
