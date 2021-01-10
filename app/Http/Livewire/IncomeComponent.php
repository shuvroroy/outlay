<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Income;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

final class IncomeComponent extends Component
{
    use WithPagination;

    public Income $income;
    public Collection $categories;
    public string $search = '';
    public string $modalHeadingText = '';
    public bool $showSaveModal = false;
    public bool $showDeleteModal = false;

    public function mount(): void
    {
        $this->categories = Category::active()->get();
        $this->income = Income::make(['entry_date' => now()]);
    }

    public function rules(): array
    {
        return [
            'income.title' => 'required|string|max:255',
            'income.category_id' => 'required|exists:categories,id',
            'income.amount' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'income.entry_date' => 'sometimes|date',
        ];
    }

    public function selectedItem(Income $income): void
    {
        $this->income = $income;

        $this->showDeleteModal = true;
    }

    public function create(): void
    {
        $this->resetErrorBag();

        $this->modalHeadingText = 'Add Income';

        $this->income = Income::make(['entry_date' => now()]);

        $this->showSaveModal = true;
    }

    public function edit(Income $income): void
    {
        $this->resetErrorBag();

        $this->modalHeadingText = 'Edit Income';

        $this->income = $income;

        $this->showSaveModal = true;
    }

    public function save(): void
    {
        $this->validate();

        Auth::user()->incomes()->save($this->income);

        $this->showSaveModal = false;

        $this->dispatchBrowserEvent('notify', 'Income record saved successfully!');
    }

    public function destroy(): void
    {
        $this->income->delete();

        $this->showDeleteModal = false;

        $this->dispatchBrowserEvent('notify', 'Income record deleted successfully!');
    }

    public function render(): View
    {
        return view('income', ['incomes' => Income::search($this->search)->latest()->paginate(10)])
            ->layout('components.layouts.auth', [
                'title' => 'Income'
            ]);
    }
}
