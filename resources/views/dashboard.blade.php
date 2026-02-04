<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Layanan Tersedia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-6">
                <!-- Status Cards -->
                <!-- <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-6 flex items-center space-x-6 hover:shadow-md transition-shadow">
                        <div class="h-14 w-14 bg-blue-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-100 dark:shadow-none">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Permohonan Baru</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">0</p>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-6 flex items-center space-x-6 hover:shadow-md transition-shadow">
                        <div class="h-14 w-14 bg-teal-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-teal-100 dark:shadow-none">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Permohonan Terbit</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">0</p>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-6 flex items-center space-x-6 hover:shadow-md transition-shadow">
                        <div class="h-14 w-14 bg-red-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-red-100 dark:shadow-none">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Permohonan Ditolak</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">0</p>
                        </div>
                    </div>
                </div> -->

                <!-- User Detail Card -->
                <!-- <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
                    <div class="px-8 py-6 border-b border-gray-50 dark:border-gray-700 flex justify-between items-center bg-gray-50/50 dark:bg-gray-700/50">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">Detail pengguna OSS HUB Kominfo</h3>
                        <button class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-indigo-100 dark:shadow-none">
                            + Tambah Permohonan
                        </button>
                    </div>
                    <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6">
                        <div class="space-y-4">
                            <div class="flex justify-between border-b border-gray-50 dark:border-gray-700 pb-2">
                                <span class="text-sm font-medium text-gray-400 uppercase tracking-wider">Email</span>
                                <span class="text-sm font-bold text-gray-700 dark:text-gray-200">{{ auth()->user()->email }}</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-50 dark:border-gray-700 pb-2">
                                <span class="text-sm font-medium text-gray-400 uppercase tracking-wider">Nama user proses</span>
                                <span class="text-sm font-bold text-gray-700 dark:text-gray-200">{{ auth()->user()->name }}</span>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between border-b border-gray-50 dark:border-gray-700 pb-2">
                                <span class="text-sm font-medium text-gray-400 uppercase tracking-wider">NIB</span>
                                <span class="text-sm font-bold text-gray-400 italic font-normal">-</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-50 dark:border-gray-700 pb-2">
                                <span class="text-sm font-medium text-gray-400 uppercase tracking-wider">Tanggal Terbit NIB</span>
                                <span class="text-sm font-bold text-gray-400 italic font-normal">Invalid Date</span>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Service Explorer / Main Section -->
                <div class="mt-10">
                    <div class="flex items-center space-x-2 mb-6">
                        <div class="h-6 w-1 bg-indigo-600 rounded-full"></div>
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Layanan Tersedia</h2>
                    </div>
                    <livewire:user.service-explorer />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
