<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Redirect
{
    public static function ToDashboard()
    {
        if ($user = Auth::user()) {
            if ($user->role == "admin") {
                return route('AdminDashboard', App::getLocale());
            } elseif ($user->role == "user") {
                return route('UserDashboard', App::getLocale());
            } elseif ($user->role == "guest") {
                return route('GuestDashboard', App::getLocale());
            } else return route('login', App::getLocale());
        } else return route('login', App::getLocale());
    }
}
