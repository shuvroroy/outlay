<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

final class CategoryComponent extends Component
{
    use WithPagination;

    public Category $category;
    public string $search = '';
    public string $modalHeadingText = '';
    public bool $showModal = false;

    public function rules(): array
    {
        return [
            'category.name' => 'required|string|max:50|unique:categories,name,'. $this->category->id .',id,user_id,'. Auth::id(),
            'category.is_active' => 'required|boolean',
        ];
    }

    public function create(): void
    {
        $this->resetErrorBag();

        $this->modalHeadingText = 'Add Category';

        $this->category = Category::make();

        $this->showModal = true;
    }

    public function edit(Category $category): void
    {
        $this->resetErrorBag();

        $this->modalHeadingText = 'Edit Category';

        $this->category = $category;

        $this->showModal = true;
    }

    public function save(): void
    {
        $this->validate();

        Auth::user()->categories()->save($this->category);

        $this->showModal = false;

        $this->dispatchBrowserEvent('notify', 'Category record saved successfully!');
    }

    public function render(): View
    {
        return view('category', ['categories' => Category::search($this->search)->latest()->paginate(10)])
            ->layout('components.layouts.auth', [
                'title' => 'Category'
            ]);
    }
}
