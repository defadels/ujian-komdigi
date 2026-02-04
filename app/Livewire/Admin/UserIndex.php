<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function changeRole($userId, $role)
    {
        $user = User::findOrFail($userId);
        
        // Prevent changing own role if it's the current admin (safety first)
        if ($user->id === auth()->id()) {
            session()->flash('error', 'Anda tidak dapat mengubah role anda sendiri.');
            return;
        }

        $user->update(['role' => $role]);
        session()->flash('message', 'Role user berhasil diperbarui.');
    }

    public function deleteUser($userId)
    {
        if ($userId === auth()->id()) {
            session()->flash('error', 'Anda tidak dapat menghapus akun anda sendiri.');
            return;
        }

        User::findOrFail($userId)->delete();
        session()->flash('message', 'User berhasil dihapus.');
    }

    public function render()
    {
        $users = User::query()
            ->where(function($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.user-index', [
            'users' => $users,
        ]);
    }
}
