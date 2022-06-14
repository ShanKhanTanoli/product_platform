<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\App;

class Logout extends Component
{
    public function mount($lang = "en")
    {
        App::getLocale($lang);
    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('login', App::getLocale()));
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
}
