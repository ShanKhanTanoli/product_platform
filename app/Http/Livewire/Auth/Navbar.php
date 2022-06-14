<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Helpers\Language\Language;
use Illuminate\Support\Facades\App;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.auth.navbar');
    }

    public function ChangeLanguage($slug)
    {
        if ($language = Language::FindBySlug($slug)) {
            App::setlocale($language->name);
            return redirect(route('login', App::getLocale()));
        } else {
            App::setlocale('en');
            return redirect(route('login', App::getLocale()));
        }
    }
}
