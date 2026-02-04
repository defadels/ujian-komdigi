<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Services;
use App\Models\ServiceCategory;
use Livewire\WithPagination;

class ServiceExplorer extends Component
{
    use WithPagination;

    public $search = '';
    public $categoryId = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategoryId()
    {
        $this->resetPage();
    }

    public function render()
    {
        $services = Services::query()
            ->where('status', 'aktif')
            ->when($this->search, function($query) {
                $query->where('nama_layanan', 'like', '%' . $this->search . '%')
                      ->orWhere('deskripsi', 'like', '%' . $this->search . '%');
            })
            ->when($this->categoryId, function($query) {
                $query->where('kategori_id', $this->categoryId);
            })
            ->with('kategori')
            ->latest()
            ->paginate(9);

        return view('livewire.user.service-explorer', [
            'services' => $services,
            'categories' => ServiceCategory::where('status', 'aktif')->get(),
        ]);
    }
}
