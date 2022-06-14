<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;

use Livewire\Component;
use App\Notifications\Alerts;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class ResetPassword extends Component
{
    public $email;
    public $password;
    public $passwordConfirmation;

    public $urlID = '';

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6|same:passwordConfirmation'
    ];

    public function mount($id, $lang = "en")
    {
        App::setLocale($lang);
        if ($existingUser = User::find($id)) {
            $this->email = $existingUser->email;
            $this->urlID = intval($existingUser->id);
        } else {
            return session()->flash('error', trans('alerts.error'));
        }
    }

    public function resetPassword()
    {
        $this->validate();
        $existingUser = User::where('email', $this->email)->first();
        if ($existingUser && $existingUser->id == $this->urlID) {
            $existingUser->update([
                'password' => Hash::make($this->password)
            ]);
            //Send Notification
            $data = [
                'message' => 'notifications.password-update',
            ];
            $existingUser->notify(new Alerts($data));
            session()->flash('success', trans('alerts.change-password'));
            return redirect(route('login', App::getLocale()));
        } else {
            return session()->flash('error', trans('alerts.error'));
        }
    }

    public function render()
    {
        return view('livewire.auth.passwords.reset')
            ->extends('layouts.auth')
            ->section('content');
    }
}
