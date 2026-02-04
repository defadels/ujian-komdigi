<?php

namespace App\Livewire\Admin;

use Livewire\Component;

use App\Models\ServiceCategory;
use Livewire\WithPagination;

class CategoryIndex extends Component
{
    use WithPagination;

    public $nama_kategori, $deskripsi, $status = 'aktif', $categoryId, $icon;
    public $isOpen = false;
    public $search = '';

    protected $rules = [
        'nama_kategori' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'status' => 'required|in:aktif,nonaktif',
        'icon' => 'nullable|string',
    ];

    public function render()
    {
        return view('livewire.admin.category-index', [
            'categories' => ServiceCategory::where('nama_kategori', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(10)
        ])->layout('layouts.app');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->nama_kategori = '';
        $this->deskripsi = '';
        $this->status = 'aktif';
        $this->categoryId = '';
        $this->icon = '';
    }

    public function store()
    {
        $this->validate();

        ServiceCategory::updateOrCreate(['id' => $this->categoryId], [
            'nama_kategori' => $this->nama_kategori,
            'deskripsi' => $this->deskripsi,
            'status' => $this->status,
            'icon' => $this->icon,
        ]);

        session()->flash('message', 
            $this->categoryId ? 'Kategori berhasil diperbarui.' : 'Kategori berhasil ditambahkan.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $category = ServiceCategory::findOrFail($id);
        $this->categoryId = $id;
        $this->nama_kategori = $category->nama_kategori;
        $this->deskripsi = $category->deskripsi;
        $this->status = $category->status;
        $this->icon = $category->icon;

        $this->openModal();
    }

    public function delete($id)
    {
        ServiceCategory::find($id)->delete();
        session()->flash('message', 'Kategori berhasil dihapus.');
    }
}
