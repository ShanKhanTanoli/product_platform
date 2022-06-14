<?php

namespace App\Http\Livewire\Buyer\Dashboard\Settings\Password;

use Exception;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $password, $password_confirmation;

    public function mount($lang = "en")
    {
        App::setLocale($lang);
    }

    public function render()
    {
        return view('livewire.buyer.dashboard.settings.password.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function UpdatePassword()
    {
        $validated = $this->validate([
            'password' => 'required|string|min:5|confirmed',
            'password_confirmation' => 'required|string|min:5|',
        ]);
        try {
            Auth::user()->update(['password' => bcrypt($validated['password'])]);
            session()->flash('success', trans('alerts.update'));
            $this->reset(['password', 'password_confirmation']);
            return redirect(route('BuyerEditPassword', App::getLocale()));
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.error'));
        }
    }
}
