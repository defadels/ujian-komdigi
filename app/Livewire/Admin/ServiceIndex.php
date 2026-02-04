<?php

namespace App\Livewire\Admin;

use Livewire\Component;

use App\Models\Services;
use App\Models\ServiceCategory;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ServiceIndex extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $nama_layanan, $deskripsi, $kategori_id, $url_akses, $status = 'aktif', $serviceId, $thumbnail, $old_thumbnail;
    public $isOpen = false;
    public $search = '';

    protected $rules = [
        'nama_layanan' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'kategori_id' => 'required|exists:service_category,id',
        'url_akses' => 'required|url',
        'status' => 'required|in:aktif,nonaktif',
        'thumbnail' => 'nullable|image|max:2048',
    ];

    public function render()
    {
        return view('livewire.admin.service-index', [
            'services' => Services::with('kategori')
                ->where('nama_layanan', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(10),
            'categories' => ServiceCategory::where('status', 'aktif')->get()
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
        $this->nama_layanan = '';
        $this->deskripsi = '';
        $this->kategori_id = '';
        $this->url_akses = '';
        $this->status = 'aktif';
        $this->serviceId = '';
        $this->thumbnail = '';
        $this->old_thumbnail = '';
    }

    public function store()
    {
        $this->validate();

        $data = [
            'nama_layanan' => $this->nama_layanan,
            'deskripsi' => $this->deskripsi,
            'kategori_id' => $this->kategori_id,
            'url_akses' => $this->url_akses,
            'status' => $this->status,
        ];

        if ($this->thumbnail) {
            if ($this->old_thumbnail) {
                Storage::disk('public')->delete($this->old_thumbnail);
            }
            $data['thumbnail'] = $this->thumbnail->store('services', 'public');
        }

        Services::updateOrCreate(['id' => $this->serviceId ?: null], $data);

        session()->flash('message', 
            $this->serviceId ? 'Layanan berhasil diperbarui.' : 'Layanan berhasil ditambahkan.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $service = Services::findOrFail($id);
        $this->serviceId = $id;
        $this->nama_layanan = $service->nama_layanan;
        $this->deskripsi = $service->deskripsi;
        $this->kategori_id = $service->kategori_id;
        $this->url_akses = $service->url_akses;
        $this->status = $service->status;
        $this->old_thumbnail = $service->thumbnail;

        $this->openModal();
    }

    public function delete($id)
    {
        $service = Services::find($id);
        if ($service->thumbnail) {
            Storage::disk('public')->delete($service->thumbnail);
        }
        $service->delete();
        session()->flash('message', 'Layanan berhasil dihapus.');
    }
}
