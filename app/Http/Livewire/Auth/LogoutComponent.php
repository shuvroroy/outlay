<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Redirector;

final class LogoutComponent extends Component
{
    public function logout(): Redirector
    {
        Auth::guard('web')->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function render(): string
    {
        return <<<'blade'
            <div>
                <a href="#" wire:click.prevent="logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150">
                    Sign out
                </a>
            </div>
        blade;
    }
}
