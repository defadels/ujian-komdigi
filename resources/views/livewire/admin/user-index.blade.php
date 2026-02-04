<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Manajemen User') }}
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

            @if (session()->has('error'))
                <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="flex justify-between mb-4">
                <input wire:model.live="search" type="text" placeholder="Cari user..." class="w-full md:w-1/3 rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-200 text-left">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2 w-48">Role</th>
                        <th class="px-4 py-2 w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="text-gray-700 dark:text-gray-300 border-b border-gray-200 dark:border-gray-700">
                        <td class="px-4 py-2">{{ ($users->currentPage()-1) * $users->perPage() + $loop->iteration }}</td>
                        <td class="px-4 py-2 font-semibold text-gray-900 dark:text-white">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">
                            <select wire:change="changeRole({{ $user->id }}, $event.target.value)" 
                                    class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 text-sm focus:ring-indigo-500 focus:border-indigo-500
                                    {{ $user->role === 'admin' ? 'text-indigo-600 border-indigo-200' : 'text-gray-600' }}">
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </td>
                        <td class="px-4 py-2 text-center">
                            @if($user->id !== auth()->id())
                                <button wire:click="deleteUser({{ $user->id }})" 
                                        wire:confirm="Apakah anda yakin ingin menghapus user ini?"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs transition duration-150">
                                    Hapus
                                </button>
                            @else
                                <span class="text-xs text-gray-400 italic">Akun Anda</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
