<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Helpers\Redirect;
use Illuminate\Support\Str;
use App\Notifications\Alerts;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class GuestRegister extends Component
{

    public $business;
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

    public function mount($lang = "en", $user_name = null)
    {
        //Set language
        App::setlocale($lang);

        //If user exists
        if ($user_name) {
            if ($business = Business::FindByUserName($user_name)) {
                $this->business = $business;
            } else abort(404);
        } else abort(404);

        //If user is logged in
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
            'role' => 'client',
            'role_id' => 3,
            'password' => Hash::make($this->password),
            'slug' => Str::random(20),
        ]);

        auth()->login($user);


        return redirect(Redirect::ToDashboard());
    }

    public function render()
    {
        return view('livewire.auth.client-register')
            ->extends('layouts.auth');
    }
}
