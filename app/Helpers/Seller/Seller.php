<?php

namespace App\Helpers\Seller;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Seller\Traits\SellerSettings;

class Seller
{
    use SellerSettings;

    public static function Is()
    {
        if ($user = Auth::user()) {
            if ($user->role == "seller") {
                return $user;
            }
            return false;
        }
        return false;
    }

    public static function all()
    {
        return User::where('role', 'seller');
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
