<?php

namespace App\Http\Livewire\Guest\Dashboard\Settings\Profile;

use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $name, $user_name, $email, $number;

    public function mount($lang = "en")
    {
        App::setLocale($lang);
        $this->name = Auth::user()->name;
        $this->user_name = Auth::user()->user_name;
        $this->email = Auth::user()->email;
        $this->number = Auth::user()->number;
    }

    public function render()
    {
        return view('livewire.guest.dashboard.settings.profile.index')
            ->extends('layouts.dashboard');
    }

    public function UpdateProfile()
    {
        $validated = $this->validate([
            'name' => 'required|string|min:3',
            'user_name' => 'required|string|unique:users,user_name,' . Auth::user()->id,
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'number' => 'required|numeric|unique:users,number,' . Auth::user()->id,
        ]);
        try {
            Auth::user()->update($validated);
            session()->flash('success', trans('alerts.update'));
            return redirect(route('GuestEditProfile', App::getLocale()));
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.error'));
        }
    }
}
