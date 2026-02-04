<?php

namespace App\Livewire\Public;

use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\Services;

class CategoryServices extends Component
{
    public $categoryId;

    public function mount($id)
    {
        $this->categoryId = $id;
    }

    public function render()
    {
        $category = ServiceCategory::findOrFail($this->categoryId);
        $services = Services::where('kategori_id', $this->categoryId)
                            ->where('status', 'aktif')
                            ->latest()
                            ->get();

        return view('livewire.public.category-services', [
            'category' => $category,
            'services' => $services,
        ])->layout('layouts.public');
    }
}
