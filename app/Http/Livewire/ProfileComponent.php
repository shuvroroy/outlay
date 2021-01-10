<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

final class ProfileComponent extends Component
{
    use WithFileUploads;

    public User $user;
    public $photo;

    public function mount():void
    {
        $this->user = Auth::user();
    }

    public function rules(): array
    {
        return [
            'user.name' => 'required|string|max:255',
            'user.email' => 'required|string|max:255|email|unique:users,email,'. Auth::id(),
            'user.website' => 'string|max:24',
            'user.about' => 'string|max:140',
            'user.birthday' => 'sometimes|date',
            'photo' => 'nullable|image|max:1000',
        ];
    }

    public function update(): void
    {
        $this->validate();

        $this->user->save();

        $this->photo && $this->user->update([
            'avatar' => $this->photo->store('photos', 'public'),
        ]);

        $this->dispatchBrowserEvent('notify', 'Profile saved successfully!');
    }

    public function render(): View
    {
        return view('profile')
            ->layout('components.layouts.auth', [
                'title' => 'Profile'
            ]);
    }
}
