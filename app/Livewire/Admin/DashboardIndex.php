<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Services;
use App\Models\User;
use App\Models\ServiceCategory;
use App\Models\Carousel;

class DashboardIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard-index', [
            'totalServices' => Services::where('status', 'aktif')->count(),
            'totalUsers' => User::count(),
            'totalCategories' => ServiceCategory::count(),
            'totalCarousels' => Carousel::count(),
            'adminUser' => auth()->user(),
        ])->layout('layouts.app');
    }
}
