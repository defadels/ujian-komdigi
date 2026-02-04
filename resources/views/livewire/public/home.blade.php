<div>
    <!-- Carousel Section -->
    @if($carousels->count() > 0)
    <div x-data="{ 
            activeSlide: 0, 
            slides: {{ $carousels->count() }},
            init() {
                setInterval(() => {
                    this.activeSlide = (this.activeSlide + 1) % this.slides;
                }, 5000);
            }
         }" class="relative bg-gray-900 overflow-hidden h-[400px] md:h-[550px]">
        @foreach($carousels as $index => $carousel)
        <div x-show="activeSlide === {{ $index }}" 
             x-transition:enter="transition ease-out duration-700"
             x-transition:enter-start="opacity-0 transform scale-110"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-500"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-110"
             class="absolute inset-0">
            <img src="{{ asset('storage/' . $carousel->gambar) }}" class="w-full h-full object-cover opacity-50" alt="{{ $carousel->nama_carousel }}">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-60"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-center px-4 max-w-4xl">
                    <h2 class="text-4xl md:text-6xl font-black text-white mb-6 drop-shadow-2xl leading-tight">
                        {{ $carousel->nama_carousel }}
                    </h2>
                    <p class="text-lg md:text-2xl text-gray-100 mb-10 max-w-2xl mx-auto drop-shadow-lg font-medium opacity-90">
                        {{ $carousel->deskripsi }}
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="#layanan" class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl transition-all shadow-xl shadow-blue-500/20">
                            Mulai Sekarang
                        </a>
                        <a href="{{ route('about') }}" class="px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-bold rounded-2xl backdrop-blur-md transition-all border border-white/20">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Navigation Arrows -->
        <button @click="activeSlide = activeSlide === 0 ? slides - 1 : activeSlide - 1" class="absolute left-6 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/30 backdrop-blur-lg text-white p-4 rounded-2xl focus:outline-none transition-all group border border-white/20">
            <svg class="h-6 w-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" /></svg>
        </button>
        <button @click="activeSlide = activeSlide === slides - 1 ? 0 : activeSlide + 1" class="absolute right-6 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/30 backdrop-blur-lg text-white p-4 rounded-2xl focus:outline-none transition-all group border border-white/20">
            <svg class="h-6 w-6 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" /></svg>
        </button>
        
        <!-- Indicators -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex space-x-3">
            @for($i = 0; $i < $carousels->count(); $i++)
            <button @click="activeSlide = {{ $i }}" 
                    :class="activeSlide === {{ $i }} ? 'bg-blue-600 w-10' : 'bg-white/40 w-3'" 
                    class="h-1.5 rounded-full focus:outline-none transition-all duration-300"></button>
            @endfor
        </div>
    </div>
    @else
    <!-- Hero Section -->
    <div class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                    <polygon points="50,0 100,0 50,100 0,100" />
                </svg>

                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">Kementerian Komunikasi</span>
                            <span class="block text-blue-600 xl:inline">dan Digital</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Mewujudkan kedaulatan digital dan transformasi masyarakat yang adaptif di era teknologi informasi. Berkomitmen untuk memberikan layanan publik yang transparan dan akuntabel.
                        </p>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Networking">
        </div>
    </div>
    @endif

    <!-- Category Section -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Layanan</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Berbagai Kemudahan Untuk Masyarakat
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Pilih kategori layanan yang Anda butuhkan untuk mendapatkan informasi lebih lanjut.
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($categories as $category)
                    <div class="bg-white overflow-hidden shadow rounded-xl transition duration-300 hover:shadow-lg hover:-translate-y-1">
                        <div class="p-6">
                            <div class="h-12 w-12 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600 mb-4">
                                {!! $category->icon !!}
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $category->nama_kategori }}</h3>
                            <p class="text-gray-500 text-sm mb-4">
                                {{ Str::limit($category->deskripsi, 100) }}
                            </p>
                            <a href="{{ route('public.category.services', $category->id) }}" class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-800" wire:navigate>
                                Lihat Layanan
                                <svg class="ms-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
