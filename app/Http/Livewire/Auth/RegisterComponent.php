<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

final class RegisterComponent extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirmation = '';

    protected array $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255|email|unique:users',
        'password' => 'required|string|min:8|same:passwordConfirmation',
    ];

    public function updatedEmail(): void
    {
        $this->validate(['email' => 'unique:users']);
    }

    public function register(): Redirector
    {
        $this->validate();

        Auth::login($user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]));

        event(new Registered($user));

        return redirect()->route('dashboard');
    }

    public function render(): View
    {
        return view('auth.register')
            ->layout('components.layouts.guest', [
                'title' => 'Register'
            ]);
    }
}
