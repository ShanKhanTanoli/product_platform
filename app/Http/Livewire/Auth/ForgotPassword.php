<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Helpers\Redirect;

use App\Notifications\Alerts;
use Illuminate\Support\Facades\App;
use App\Notifications\ResetPassword;
use Illuminate\Notifications\Notifiable;

class ForgotPassword extends Component
{
    use Notifiable;

    public $email;

    protected $rules = [
        'email' => 'required|email',
    ];

    public function mount($lang = "en")
    {
        App::setLocale($lang);
        if (auth()->user()) {
            redirect(Redirect::ToDashboard());
        }
    }

    public function routeNotificationForMail()
    {
        return $this->email;
    }

    public function recoverPassword()
    {
        $this->validate();
        $user = User::where('email', $this->email)->first();
        if ($user) {
            $this->notify(new ResetPassword($user->id));
            //Send Notification
            $data = [
                'message' => 'notifications.reset-password',
            ];
            $user->notify(new Alerts($data));
            return session()->flash('success', trans('alerts.password-email-sent'));
        } else {
            return session()->flash('error', trans('alerts.no-email'));
        }
    }

    public function render()
    {
        return view('livewire.auth.passwords.email')
            ->extends('layouts.auth')
            ->section('content');
    }
}
