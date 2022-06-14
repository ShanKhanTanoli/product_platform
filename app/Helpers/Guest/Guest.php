<?php

namespace App\Helpers\Guest;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Guest\Traits\GuestSettings;

class Guest
{
    use GuestSettings;

    public static function Is()
    {
        if ($user = Auth::user()) {
            if ($user->role == "guest") {
                return $user;
            }
            return false;
        }
        return false;
    }

    public static function all()
    {
        return User::where('role', 'guest');
    }

    public static function LatestPaginate($quantity)
    {
        return self::all()->latest()
            ->paginate($quantity);
    }

    public static function count()
    {
        return self::all()->count();
    }
}
