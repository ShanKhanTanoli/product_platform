<?php

namespace App\Http\Livewire\Admin\Dashboard\Settings\Password;

use Exception;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use App\Notifications\Alerts;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $password, $password_confirmation;

    public function mount()
    {
        $lang = Admin::Language();
        App::setLocale($lang);
    }
    public function render()
    {
        return view('livewire.admin.dashboard.settings.password.index')
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
            return redirect(route('AdminEditPassword', App::getLocale()));
            $this->reset(['password', 'password_confirmation']);
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.error'));
        }
    }
}
