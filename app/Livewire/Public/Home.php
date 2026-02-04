<?php

namespace App\Livewire\Public;

use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\Carousel;

class Home extends Component
{
    public function render()
    {
        return view('livewire.public.home', [
            'carousels' => Carousel::where('status', 'aktif')->latest()->get(),
            'categories' => ServiceCategory::where('status', 'aktif')->get(),
        ])->layout('layouts.public');
    }
}
