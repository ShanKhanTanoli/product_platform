<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Helpers\Redirect;
use Illuminate\Support\Str;
use App\Notifications\Alerts;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class UserRegister extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required|min:6'
    ];

    public function mount($lang = "en")
    {
        App::setLocale($lang);
        if (auth()->user()) {
            redirect(Redirect::ToDashboard());
        }
    }

    public function register()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'user_name' => Str::random(10),
            'email' => $this->email,
            'role' => 'business',
            'role_id' => 2,
            'password' => Hash::make($this->password),
            'slug' => Str::random(20),
        ]);
        auth()->login($user);
        return redirect(Redirect::ToDashboard());
    }

    public function render()
    {
        return view('livewire.auth.business-register')
            ->extends('layouts.auth');
    }
}
