<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\Expense;
use App\Models\Income;
use Illuminate\View\View;
use Livewire\Component;

final class DashboardComponent extends Component
{
    public float $currentMonthIncome;
    public float $currentMonthExpense;

    public function mount(): void
    {
        $this->currentMonthIncome = Income::query()
            ->whereYear('entry_date', now()->year)
            ->whereMonth('entry_date', now()->month)
            ->sum('amount');

        $this->currentMonthExpense = Expense::query()
            ->whereYear('entry_date', now()->year)
            ->whereMonth('entry_date', now()->month)
            ->sum('amount');
    }

    public function render(): View
    {
        return view('dashboard', ['activities' => Activity::latest()->take(10)->get()])
            ->layout('components.layouts.auth', [
                'title' => 'Dashboard'
            ]);
    }
}
