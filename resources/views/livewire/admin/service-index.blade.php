<div>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Kelola Layanan') }}
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
                <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Tambah Layanan</button>
                <input wire:model.live="search" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Cari layanan...">
            </div>

            @if($isOpen)
                @include('livewire.admin.service-modal')
            @endif

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-200">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Thumbnail</th>
                        <th class="px-4 py-2">Nama Layanan</th>
                        <th class="px-4 py-2">Kategori</th>
                        <th class="px-4 py-2">URL</th>
                        <th class="px-4 py-2 w-32">Status</th>
                        <th class="px-4 py-2 w-48">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                    <tr class="text-gray-700 dark:text-gray-300 border-b border-gray-200 dark:border-gray-700">
                        <td class="px-4 py-2 text-center">{{ ($services->currentPage()-1) * $services->perPage() + $loop->index + 1 }}</td>
                        <td class="px-4 py-2 text-center">
                            @if($service->thumbnail)
                                <img src="{{ asset('storage/' . $service->thumbnail) }}" class="h-10 w-10 object-cover rounded mx-auto">
                            @else
                                <span class="text-gray-400">No Image</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $service->nama_layanan }}</td>
                        <td class="px-4 py-2 text-center">{{ $service->kategori->nama_kategori ?? 'N/A' }}</td>
                        <td class="px-4 py-2 text-center"><a href="{{ $service->url_akses }}" target="_blank" class="text-blue-500 hover:underline">Link</a></td>
                        <td class="px-4 py-2 text-center">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $service->status == 'aktif' ? 'green' : 'red' }}-100 text-{{ $service->status == 'aktif' ? 'green' : 'red' }}-800">
                                {{ ucfirst($service->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2 text-center">
                            <button wire:click="edit({{ $service->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">Edit</button>
                            <button wire:click="delete({{ $service->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded ml-2" onclick="confirm('Apakah Anda yakin ingin menghapus layanan ini?') || event.stopImmediatePropagation()">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $services->links() }}
            </div>
        </div>
    </div>
</div>
</div>
