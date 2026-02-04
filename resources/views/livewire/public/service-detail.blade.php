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
                    <li class="inline-flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ route('public.category.services', $service->kategori_id) }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2" wire:navigate>
                            {{ $service->kategori->nama_kategori }}
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">{{ $service->nama_layanan }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="lg:flex lg:gap-x-12">
                <div class="lg:w-2/3">
                    <div class="bg-gray-100 rounded-3xl overflow-hidden mb-8">
                        @if($service->thumbnail)
                            <img src="{{ asset('storage/' . $service->thumbnail) }}" class="w-full h-auto object-cover" alt="{{ $service->nama_layanan }}">
                        @else
                            <div class="w-full h-64 bg-blue-100 flex items-center justify-center text-blue-300">
                                <svg class="h-24 w-24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            </div>
                        @endif
                    </div>

                    <h1 class="text-4xl font-extrabold text-gray-900 mb-6">{{ $service->nama_layanan }}</h1>
                    
                    <div class="prose max-w-none text-gray-600">
                        <p class="whitespace-pre-line text-lg leading-relaxed">
                            {{ $service->deskripsi }}
                        </p>
                    </div>
                </div>

                <div class="lg:w-1/3 mt-12 lg:mt-0">
                    <div class="sticky top-24">
                        <div class="bg-gray-50 rounded-2xl p-8 border border-gray-100">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Informasi Layanan</h3>
                            
                            <div class="space-y-4 mb-8">
                                <div class="flex items-center p-3 bg-white rounded-xl shadow-sm">
                                    <div class="h-10 w-10 flex-shrink-0 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600 me-4">
                                        {!! $service->kategori->icon !!}
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Kategori</p>
                                        <p class="text-sm font-bold text-gray-900">{{ $service->kategori->nama_kategori }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center p-3 bg-white rounded-xl shadow-sm">
                                    <div class="h-10 w-10 flex-shrink-0 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600 me-4">
                                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Status</p>
                                        <p class="text-sm font-bold text-green-600">Layanan Aktif</p>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ $service->url_akses }}" target="_blank" class="w-full flex items-center justify-center px-6 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl transition duration-300 shadow-md hover:shadow-lg">
                                Akses Layanan Sekarang
                                <svg class="ms-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                            </a>
                            
                            <p class="mt-4 text-xs text-gray-400 text-center">
                                Klik tombol di atas untuk menuju halaman portal resmi layanan ini.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
