<div class="space-y-6">
    <!-- Admin Hero Section -->
    <div class="bg-indigo-600 rounded-3xl p-8 text-white relative overflow-hidden shadow-2xl shadow-indigo-200 dark:shadow-none">
        <div class="relative z-10">
            <h1 class="text-3xl font-black mb-2">Selamat Datang di Panel Admin, {{ explode(' ', $adminUser->name)[0] }}! 👋</h1>
            <p class="text-indigo-100 max-w-xl">Kelola layanan, kategori, dan pengguna dengan mudah melalui dashboard terintegrasi ini.</p>
        </div>
        <!-- Decorative Circle -->
        <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
    </div>

    <!-- Statistics Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Active Services -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-xl transition-all duration-300 group">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-blue-50 dark:bg-blue-900/20 rounded-2xl group-hover:scale-110 transition-transform duration-300">
                    <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                </div>
                <span class="text-sm font-bold text-green-500 bg-green-50 px-2 py-1 rounded-lg">Aktif</span>
            </div>
            <p class="text-sm font-medium text-gray-500 uppercase tracking-widest">Layanan Aktif</p>
            <h3 class="text-3xl font-black text-gray-900 dark:text-white mt-1">{{ $totalServices }}</h3>
        </div>

        <!-- Total Users -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-xl transition-all duration-300 group">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-indigo-50 dark:bg-indigo-900/20 rounded-2xl group-hover:scale-110 transition-transform duration-300">
                    <svg class="h-6 w-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
                <span class="text-sm font-bold text-indigo-500 bg-indigo-50 px-2 py-1 rounded-lg">Total</span>
            </div>
            <p class="text-sm font-medium text-gray-500 uppercase tracking-widest">User Terdaftar</p>
            <h3 class="text-3xl font-black text-gray-900 dark:text-white mt-1">{{ $totalUsers }}</h3>
        </div>

        <!-- Categories -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-xl transition-all duration-300 group">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-purple-50 dark:bg-purple-900/20 rounded-2xl group-hover:scale-110 transition-transform duration-300">
                    <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                </div>
                <span class="text-sm font-bold text-purple-500 bg-purple-50 px-2 py-1 rounded-lg">Items</span>
            </div>
            <p class="text-sm font-medium text-gray-500 uppercase tracking-widest">Kategori</p>
            <h3 class="text-3xl font-black text-gray-900 dark:text-white mt-1">{{ $totalCategories }}</h3>
        </div>

        <!-- Slides -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-xl transition-all duration-300 group">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-teal-50 dark:bg-teal-900/20 rounded-2xl group-hover:scale-110 transition-transform duration-300">
                    <svg class="h-6 w-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                </div>
                <span class="text-sm font-bold text-teal-500 bg-teal-50 px-2 py-1 rounded-lg">Aktif</span>
            </div>
            <p class="text-sm font-medium text-gray-500 uppercase tracking-widest">Carousel</p>
            <h3 class="text-3xl font-black text-gray-900 dark:text-white mt-1">{{ $totalCarousels }}</h3>
        </div>
    </div>

    <!-- Admin Detail & Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Admin Profile Detail -->
        <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-3xl border border-gray-100 dark:border-gray-700 overflow-hidden shadow-sm">
            <div class="px-8 py-6 border-b border-gray-50 dark:border-gray-700 flex items-center justify-between bg-gray-50/50 dark:bg-gray-700/50">
                <h3 class="text-xl font-black text-gray-900 dark:text-white">Informasi Akun Admin</h3>
                <span class="px-3 py-1 bg-red-100 text-red-600 text-[10px] font-black uppercase rounded-full tracking-widest">Full Access</span>
            </div>
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div class="group">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] block mb-1">Nama Lengkap</span>
                            <p class="text-md font-bold text-gray-800 dark:text-gray-200 group-hover:text-indigo-600 transition-colors">{{ $adminUser->name }}</p>
                        </div>
                        <div class="group">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] block mb-1">Alamat Email</span>
                            <p class="text-md font-bold text-gray-800 dark:text-gray-200 group-hover:text-indigo-600 transition-colors">{{ $adminUser->email }}</p>
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div class="group">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] block mb-1">Status Peran</span>
                            <p class="text-md font-bold text-gray-800 dark:text-gray-200 uppercase">{{ $adminUser->role }}</p>
                        </div>
                        <div class="group">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] block mb-1">Terdaftar Sejak</span>
                            <p class="text-md font-bold text-gray-800 dark:text-gray-200">{{ $adminUser->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions / System Info -->
        <div class="bg-white dark:bg-gray-800 rounded-3xl border border-gray-100 dark:border-gray-700 p-8 shadow-sm">
            <h3 class="text-xl font-black text-gray-900 dark:text-white mb-6">Aksi Cepat</h3>
            <div class="space-y-3">
                <a href="{{ route('admin.services') }}" class="flex items-center justify-between p-4 bg-blue-50 dark:bg-blue-900/10 rounded-2xl hover:bg-blue-100 transition-all group">
                    <span class="font-bold text-blue-700 dark:text-blue-400">Kelola Layanan</span>
                    <svg class="h-5 w-5 text-blue-600 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" /></svg>
                </a>
                <a href="{{ route('admin.categories') }}" class="flex items-center justify-between p-4 bg-purple-50 dark:bg-purple-900/10 rounded-2xl hover:bg-purple-100 transition-all group">
                    <span class="font-bold text-purple-700 dark:text-purple-400">Lihat Kategori</span>
                    <svg class="h-5 w-5 text-purple-600 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" /></svg>
                </a>
                <a href="{{ route('admin.users') }}" class="flex items-center justify-between p-4 bg-indigo-50 dark:bg-indigo-900/10 rounded-2xl hover:bg-indigo-100 transition-all group">
                    <span class="font-bold text-indigo-700 dark:text-indigo-400">Manajemen User</span>
                    <svg class="h-5 w-5 text-indigo-600 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" /></svg>
                </a>
            </div>
        </div>
    </div>
</div>
