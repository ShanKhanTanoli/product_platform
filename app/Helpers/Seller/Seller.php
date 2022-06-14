<?php

namespace App\Helpers\Seller;

use App\Models\User as UserModel;
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

    public static function Find($user)
    {
        if ($user = UserModel::find($user)) {
            if ($user->role == "seller") {
                return $user;
            }
            return false;
        }
        return false;
    }

    public static function FindBySlug($slug)
    {
        if ($user = UserModel::where('slug', $slug)->first()) {
            if ($user->role == "seller") {
                return $user;
            } else return false;
        } else return false;
    }

    public static function FindByUserName($user_name)
    {
        if ($user = UserModel::where('user_name', $user_name)->first()) {
            if ($user->role == "seller") {
                return $user;
            }
            return false;
        }
        return false;
    }

    public static function Latest()
    {
        return UserModel::where('role', 'seller')
            ->latest();
    }

    public static function LatestPaginate($quantity)
    {
        return self::Latest()
            ->paginate($quantity);
    }

    public static function count()
    {
        return self::Latest()->count();
    }
}
