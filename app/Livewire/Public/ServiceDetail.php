<?php

namespace App\Livewire\Public;

use Livewire\Component;
use App\Models\Services;

class ServiceDetail extends Component
{
    public $serviceId;

    public function mount($id)
    {
        $this->serviceId = $id;
    }

    public function render()
    {
        $service = Services::with('kategori')->findOrFail($this->serviceId);

        return view('livewire.public.service-detail', [
            'service' => $service,
        ])->layout('layouts.public');
    }
}
