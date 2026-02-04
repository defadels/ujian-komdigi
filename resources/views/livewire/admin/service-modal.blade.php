<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form enctype="multipart/form-data">
                <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="nama_layanan" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Nama Layanan:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama_layanan" placeholder="Masukkan Nama Layanan" wire:model="nama_layanan">
                            @error('nama_layanan') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="kategori_id" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Kategori:</label>
                            <select wire:model="kategori_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="kategori_id">
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="url_akses" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">URL Akses:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="url_akses" placeholder="https://example.com" wire:model="url_akses">
                            @error('url_akses') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="deskripsi" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Deskripsi:</label>
                            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="deskripsi" wire:model="deskripsi" placeholder="Masukkan Deskripsi"></textarea>
                            @error('deskripsi') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="thumbnail" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Thumbnail (Image):</label>
                            @if ($thumbnail)
                                <div class="mb-2">
                                    <p class="text-xs text-gray-500">Preview:</p>
                                    <img src="{{ $thumbnail->temporaryUrl() }}" class="h-32 w-auto object-cover rounded shadow">
                                </div>
                            @elseif ($old_thumbnail)
                                <div class="mb-2">
                                    <p class="text-xs text-gray-500">Thumbnail Saat Ini:</p>
                                    <img src="{{ asset('storage/' . $old_thumbnail) }}" class="h-32 w-auto object-cover rounded shadow">
                                </div>
                            @endif
                            <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="thumbnail" wire:model="thumbnail">
                            <div wire:loading wire:target="thumbnail" class="text-blue-500 text-xs mt-1">Uploading...</div>
                            @error('thumbnail') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Status:</label>
                            <select wire:model="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="status">
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Nonaktif</option>
                            </select>
                            @error('status') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ms-3 sm:w-auto">
                        <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" wire:loading.attr="disabled">
                            Simpan
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 dark:border-gray-600 px-4 py-2 bg-white dark:bg-gray-800 text-base leading-6 font-medium text-gray-700 dark:text-gray-200 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Batal
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
