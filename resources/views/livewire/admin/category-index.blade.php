<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Kelola Kategori Layanan') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="flex justify-between items-center mb-4">
                <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Tambah Kategori</button>
                <input wire:model.live="search" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Cari kategori...">
            </div>

            @if($isOpen)
                @include('livewire.admin.category-modal')
            @endif

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-200">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2 w-20">Icon</th>
                        <th class="px-4 py-2">Nama Kategori</th>
                        <th class="px-4 py-2">Deskripsi</th>
                        <th class="px-4 py-2 w-32">Status</th>
                        <th class="px-4 py-2 w-48">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr class="text-gray-700 dark:text-gray-300 border-b border-gray-200 dark:border-gray-700">
                        <td class="px-4 py-2 text-center">{{ ($categories->currentPage()-1) * $categories->perPage() + $loop->index + 1 }}</td>
                        <td class="px-4 py-2 text-center">{!! $category->icon !!}</td>
                        <td class="px-4 py-2">{{ $category->nama_kategori }}</td>
                        <td class="px-4 py-2">{{ Str::limit($category->deskripsi, 50) }}</td>
                        <td class="px-4 py-2 text-center">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $category->status == 'aktif' ? 'green' : 'red' }}-100 text-{{ $category->status == 'aktif' ? 'green' : 'red' }}-800">
                                {{ ucfirst($category->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2 text-center">
                            <button wire:click="edit({{ $category->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">Edit</button>
                            <button wire:click="delete({{ $category->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded ml-2" onclick="confirm('Apakah Anda yakin ingin menghapus kategori ini?') || event.stopImmediatePropagation()">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
