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
                <div class="flex-shrink-0 flex items-center px-4 mb-8">
                    <div class="flex items-center space-x-2">
                        <div class="h-8 w-8 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold italic">K</div>
                        <span class="font-bold text-xl tracking-tight text-gray-800 dark:text-gray-100">KOMDIGI</span>
                    </div>
                </div>
                    <div class="px-2">
                        <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">DASHBOARD</p>
                        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 rounded-lg px-3 py-2 text-sm transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-100 dark:shadow-none' : 'text-gray-500 hover:bg-gray-50 dark:hover:bg-gray-700' }}" wire:navigate>
                            <svg class="h-5 w-5 {{ request()->routeIs('dashboard') ? 'text-indigo-100' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                            <span class="font-medium">{{ __('Dashboard') }}</span>
                        </a>
                    </div>

                    @if(auth()->user()->role === 'admin')
                    <div class="px-2">
                        <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">MANAJEMEN</p>
                        <div class="space-y-1">
                            <a href="{{ route('admin.categories') }}" class="flex items-center space-x-3 rounded-lg px-3 py-2 text-sm {{ request()->routeIs('admin.categories') ? 'bg-indigo-600 text-white shadow-md' : 'text-gray-500 hover:bg-gray-50' }}" wire:navigate>
                                <svg class="h-5 w-5 {{ request()->routeIs('admin.categories') ? 'text-indigo-100' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" /></svg>
                                <span>{{ __('Kategori Layanan') }}</span>
                            </a>
                            <a href="{{ route('admin.services') }}" class="flex items-center space-x-3 rounded-lg px-3 py-2 text-sm {{ request()->routeIs('admin.services') ? 'bg-indigo-600 text-white shadow-md' : 'text-gray-500 hover:bg-gray-50' }}" wire:navigate>
                                <svg class="h-5 w-5 {{ request()->routeIs('admin.services') ? 'text-indigo-100' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                <span>{{ __('Layanan') }}</span>
                            </a>
                            <a href="{{ route('admin.carousel') }}" class="flex items-center space-x-3 rounded-lg px-3 py-2 text-sm {{ request()->routeIs('admin.carousel') ? 'bg-indigo-600 text-white shadow-md' : 'text-gray-500 hover:bg-gray-50' }}" wire:navigate>
                                <svg class="h-5 w-5 {{ request()->routeIs('admin.carousel') ? 'text-indigo-100' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                <span>{{ __('Carousel') }}</span>
                            </a>
                            <a href="{{ route('admin.users') }}" class="flex items-center space-x-3 rounded-lg px-3 py-2 text-sm {{ request()->routeIs('admin.users') ? 'bg-indigo-600 text-white shadow-md' : 'text-gray-500 hover:bg-gray-50' }}" wire:navigate>
                                <svg class="h-5 w-5 {{ request()->routeIs('admin.users') ? 'text-indigo-100' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                <span>{{ __('Manajemen User') }}</span>
                            </a>
                        </div>
                    </div>
                    @endif

                    <!-- Others Group -->
                    <div class="px-2">
                        <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">LAINNYA</p>
                        <a href="#" class="flex items-center space-x-3 rounded-lg px-3 py-2 text-sm text-gray-400 hover:bg-gray-50">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span>Bantuan</span>
                        </a>
                    </div>
                </nav>
            </div>
            <div class="flex-shrink-0 flex p-4 pb-12">
                <button wire:click="logout" class="w-full flex items-center justify-center space-x-3 px-3 py-2 text-sm font-bold text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition-colors duration-150">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                    <span>{{ __('KELUAR') }}</span>
                </button>
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
                    <div class="flex items-center flex-shrink-0 px-6 mb-10">
                        <div class="flex items-center space-x-3">
                            <div class="h-10 w-10 bg-blue-600 rounded-xl flex items-center justify-center text-white font-bold italic shadow-lg shadow-blue-200 dark:shadow-none">K</div>
                            <span class="font-bold text-xl tracking-tight text-gray-900 dark:text-white">KOMDIGI</span>
                        </div>
                    </div>
                    <nav class="mt-5 flex-1 px-4 space-y-8">
                        <!-- Dashboard Group -->
                        <div>
                            <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-[0.1em] mb-3">DASHBOARD</p>
                            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-all duration-200 group {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white shadow-xl shadow-indigo-100 dark:shadow-none' : 'text-gray-500 hover:bg-indigo-50 dark:hover:bg-gray-700' }}" wire:navigate>
                                <svg class="h-5 w-5 mr-3 {{ request()->routeIs('dashboard') ? 'text-indigo-100' : 'text-gray-400 group-hover:text-indigo-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                                <span>{{ __('Dashboard') }}</span>
                            </a>
                        </div>

                        @if(auth()->user()->role === 'admin')
                        <!-- Management Group -->
                        <div>
                            <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-[0.1em] mb-3">MANAJEMEN</p>
                            <div class="space-y-1">
                                <a href="{{ route('admin.categories') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.categories') ? 'bg-indigo-600 text-white shadow-xl shadow-indigo-100 dark:shadow-none' : 'text-gray-500 hover:bg-indigo-50 dark:hover:bg-gray-700' }}" wire:navigate>
                                    <svg class="h-5 w-5 mr-3 {{ request()->routeIs('admin.categories') ? 'text-indigo-100' : 'text-gray-400 group-hover:text-indigo-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" /></svg>
                                    <span>{{ __('Kategori Layanan') }}</span>
                                </a>
                                <a href="{{ route('admin.services') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.services') ? 'bg-indigo-600 text-white shadow-xl shadow-indigo-100 dark:shadow-none' : 'text-gray-500 hover:bg-indigo-50 dark:hover:bg-gray-700' }}" wire:navigate>
                                    <svg class="h-5 w-5 mr-3 {{ request()->routeIs('admin.services') ? 'text-indigo-100' : 'text-gray-400 group-hover:text-indigo-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                    <span>{{ __('Layanan') }}</span>
                                </a>
                                <a href="{{ route('admin.carousel') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.carousel') ? 'bg-indigo-600 text-white shadow-xl shadow-indigo-100 dark:shadow-none' : 'text-gray-500 hover:bg-indigo-50 dark:hover:bg-gray-700' }}" wire:navigate>
                                    <svg class="h-5 w-5 mr-3 {{ request()->routeIs('admin.carousel') ? 'text-indigo-100' : 'text-gray-400 group-hover:text-indigo-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                    <span>{{ __('Carousel') }}</span>
                                </a>
                                <a href="{{ route('admin.users') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.users') ? 'bg-indigo-600 text-white shadow-xl shadow-indigo-100 dark:shadow-none' : 'text-gray-500 hover:bg-indigo-50 dark:hover:bg-gray-700' }}" wire:navigate>
                                    <svg class="h-5 w-5 mr-3 {{ request()->routeIs('admin.users') ? 'text-indigo-100' : 'text-gray-400 group-hover:text-indigo-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                    <span>{{ __('Manajemen User') }}</span>
                                </a>
                            </div>
                        </div>
                        @endif

                        <!-- Others Group -->
                        <div>
                            <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-[0.1em] mb-3">LAINNYA</p>
                            <a href="#" class="flex items-center px-4 py-3 text-sm font-bold text-gray-500 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-gray-700 rounded-xl transition-all duration-200 group">
                                <svg class="h-5 w-5 mr-3 text-gray-400 group-hover:text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                <span>Bantuan</span>
                            </a>
                        </div>
                    </nav>
                </div>
                <div class="p-6">
                    <button wire:click="logout" class="w-full flex items-center justify-center space-x-3 px-4 py-4 text-sm font-black text-red-600 bg-red-50 hover:bg-red-100 dark:bg-red-900/10 dark:hover:bg-red-900/20 rounded-2xl transition-all duration-200 group">
                        <svg class="h-5 w-5 transform group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                        <span>KELUAR</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
