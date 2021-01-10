<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

final class LoginComponent extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    protected array $rules = [
        'email' => 'required|string|email',
        'password' => 'required|string',
    ];

    public function login(): Redirector
    {
        $credential = $this->validate();

        if (RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            event(new Lockout(request()));

            $seconds = RateLimiter::availableIn($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.throttle', [
                    'seconds' => $seconds,
                    'minutes' => ceil($seconds / 60),
                ]),
            ]);

            return back();
        }

        if (! Auth::attempt($credential, $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);

            return back();
        }

        RateLimiter::clear($this->throttleKey());

        request()->session()->regenerate();

        return redirect()->intended();
    }

    public function render(): View
    {
        return view('auth.login')
            ->layout('components.layouts.guest', [
                'title' => 'Login'
            ]);
    }

    private function throttleKey(): string
    {
        return Str::lower($this->email).'|'.request()->ip();
    }
}
