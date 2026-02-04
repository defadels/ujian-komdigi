<div>
    <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="flex-1">
            <input wire:model.live="search" type="text" placeholder="Cari layanan..." class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <div class="w-full md:w-64">
            <select wire:model.live="categoryId" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">Semua Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($services as $service)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300 rounded-xl border border-gray-100 dark:border-gray-700">
                <div class="h-40 overflow-hidden relative group">
                    @if($service->thumbnail)
                        <img src="{{ asset('storage/' . $service->thumbnail) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="{{ $service->nama_layanan }}">
                    @else
                        <div class="w-full h-full bg-blue-50 dark:bg-gray-700 flex items-center justify-center text-blue-300">
                            <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        </div>
                    @endif
                    <div class="absolute top-2 right-2">
                        <span class="px-2 py-1 text-[10px] font-bold uppercase tracking-wider bg-white/90 dark:bg-gray-800/90 text-blue-600 dark:text-blue-400 rounded-md shadow-sm">
                            {{ $service->kategori->nama_kategori ?? 'Umum' }}
                        </span>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 line-clamp-1">{{ $service->nama_layanan }}</h3>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mb-4 line-clamp-2 min-h-[40px]">
                        {{ $service->deskripsi }}
                    </p>
                    <div class="flex items-center justify-between mt-auto">
                        <a href="{{ route('public.service.detail', $service->id) }}" class="text-indigo-600 dark:text-indigo-400 text-sm font-semibold hover:underline">
                            Detail
                        </a>
                        <a href="{{ $service->url_akses }}" target="_blank" class="inline-flex items-center px-3 py-1.5 bg-indigo-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 transition ease-in-out duration-150 shadow-sm">
                            Akses Portal
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-12 text-center text-gray-500 dark:text-gray-400">
                Layanan tidak ditemukan.
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $services->links() }}
    </div>
</div>
