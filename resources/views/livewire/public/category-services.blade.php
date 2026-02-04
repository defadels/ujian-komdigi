<div>
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/" class="text-sm text-gray-700 hover:text-blue-600 inline-flex items-center" wire:navigate>
                            <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                            Beranda
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">{{ $category->nama_kategori }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="mb-10 text-center">
                <div class="inline-flex items-center justify-center p-3 bg-blue-100 text-blue-600 rounded-full mb-4">
                    {!! $category->icon !!}
                </div>
                <h1 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">{{ $category->nama_kategori }}</h1>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
                    {{ $category->deskripsi }}
                </p>
            </div>

            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @forelse($services as $service)
                <div class="bg-gray-50 overflow-hidden border border-gray-100 rounded-xl transition duration-300 hover:shadow-md">
                    <div class="h-48 overflow-hidden">
                        @if($service->thumbnail)
                            <img src="{{ asset('storage/' . $service->thumbnail) }}" class="w-full h-full object-cover transition duration-300 hover:scale-105" alt="{{ $service->nama_layanan }}">
                        @else
                            <div class="w-full h-full bg-blue-100 flex items-center justify-center text-blue-300">
                                <svg class="h-16 w-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $service->nama_layanan }}</h3>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-2">
                            {{ $service->deskripsi }}
                        </p>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('public.service.detail', $service->id) }}" class="text-blue-600 font-semibold hover:text-blue-800 text-sm" wire:navigate>
                                Selengkapnya
                            </a>
                            <a href="{{ $service->url_akses }}" target="_blank" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                Akses Layanan
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-12 text-center text-gray-500">
                    Belum ada layanan untuk kategori ini.
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
