<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Expense;
use App\Models\Income;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

final class ExpenseComponent extends Component
{
    use WithPagination;

    public Expense $expense;
    public Collection $categories;
    public string $search = '';
    public string $modalHeadingText = '';
    public bool $showSaveModal = false;
    public bool $showDeleteModal = false;

    public function mount(): void
    {
        $this->categories = Category::active()->get();
        $this->expense = Expense::make(['entry_date' => now()]);
    }

    public function rules(): array
    {
        return [
            'expense.title' => 'required|string|max:255',
            'expense.category_id' => 'required|exists:categories,id',
            'expense.amount' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'expense.entry_date' => 'sometimes|date',
        ];
    }

    public function selectedItem(Expense $expense): void
    {
        $this->expense = $expense;

        $this->showDeleteModal = true;
    }

    public function create(): void
    {
        $this->resetErrorBag();

        $this->modalHeadingText = 'Add Income';

        $this->expense = Expense::make(['entry_date' => now()]);

        $this->showSaveModal = true;
    }

    public function edit(Expense $expense): void
    {
        $this->resetErrorBag();

        $this->modalHeadingText = 'Edit Income';

        $this->expense = $expense;

        $this->showSaveModal = true;
    }

    public function save(): void
    {
        $this->validate();

        Auth::user()->expenses()->save($this->expense);

        $this->showSaveModal = false;

        $this->dispatchBrowserEvent('notify', 'Expense record saved successfully!');
    }

    public function destroy(): void
    {
        $this->expense->delete();

        $this->showDeleteModal = false;

        $this->dispatchBrowserEvent('notify', 'Expense record deleted successfully!');
    }

    public function render(): View
    {
        return view('expense', ['expenses' => Expense::search($this->search)->latest()->paginate(10)])
            ->layout('components.layouts.auth', [
                'title' => 'Expense'
            ]);
    }
}
