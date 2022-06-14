<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Helpers\Redirect;
use App\Notifications\Alerts;
use Illuminate\Support\Facades\App;

class Login extends Component
{
    public $email;
    public $password;
    public $remember_me = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function mount($lang = "en")
    {
        App::setLocale($lang);
        if (auth()->user()) {
            redirect(Redirect::ToDashboard());
        }
    }

    public function login()
    {
        $credentials = $this->validate();
        if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
            $user = User::where(["email" => $this->email])->first();
            auth()->login($user, $this->remember_me);
            return redirect()->intended(Redirect::ToDashboard());
        } else {
            return $this->addError('email', trans('auth.failed'));
        }
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->extends('layouts.auth');
    }
}
