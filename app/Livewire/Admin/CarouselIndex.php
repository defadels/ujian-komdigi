<?php

namespace App\Livewire\Admin;

use Livewire\Component;

use App\Models\Carousel;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CarouselIndex extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $nama_carousel, $deskripsi, $gambar, $status = 'aktif', $carouselId, $old_gambar;
    public $isOpen = false;
    public $search = '';

    protected $rules = [
        'nama_carousel' => 'nullable|string|max:255',
        'deskripsi' => 'nullable|string',
        'gambar' => 'nullable|image|max:2048', // 2MB Max
        'status' => 'required|in:aktif,nonaktif',
    ];

    public function render()
    {
        return view('livewire.admin.carousel-index', [
            'carousels' => Carousel::where('nama_carousel', 'like', '%' . $this->search . '%')
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
        $this->nama_carousel = '';
        $this->deskripsi = '';
        $this->gambar = '';
        $this->status = 'aktif';
        $this->carouselId = '';
        $this->old_gambar = '';
    }

    public function store()
    {
        $this->validate();

        $data = [
            'nama_carousel' => $this->nama_carousel,
            'deskripsi' => $this->deskripsi,
            'status' => $this->status,
        ];

        if ($this->gambar) {
            // Delete old image if exists
            if ($this->old_gambar) {
                Storage::disk('public')->delete($this->old_gambar);
            }
            $data['gambar'] = $this->gambar->store('carousel', 'public');
        }

        Carousel::updateOrCreate(['id' => $this->carouselId ?: null], $data);

        session()->flash('message', 
            $this->carouselId ? 'Carousel berhasil diperbarui.' : 'Carousel berhasil ditambahkan.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $carousel = Carousel::findOrFail($id);
        $this->carouselId = $id;
        $this->nama_carousel = $carousel->nama_carousel;
        $this->deskripsi = $carousel->deskripsi;
        $this->old_gambar = $carousel->gambar;
        $this->status = $carousel->status;

        $this->openModal();
    }

    public function delete($id)
    {
        $carousel = Carousel::find($id);
        if ($carousel->gambar) {
            Storage::disk('public')->delete($carousel->gambar);
        }
        $carousel->delete();
        session()->flash('message', 'Carousel berhasil dihapus.');
    }
}
