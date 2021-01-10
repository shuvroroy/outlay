<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;

final class DashboardComponent extends Component
{
    public function render(): View
    {
        return view('dashboard')
            ->layout('components.layouts.auth', [
                'title' => 'Dashboard'
            ]);
    }
}
