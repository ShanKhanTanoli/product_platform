<?php

namespace App\Helpers\User\Traits;

use App\Models\UserSetting;
use App\Models\Currency;
use App\Models\Language;

trait UserSettings
{

    /*Begin::Settings*/
    public static function Settings($user)
    {
        return UserSetting::where('user_id', $user)
            ->first();
    }

    public static function Currency($user)
    {
        if ($settings = self::Settings($user)) {
            if ($currency = Currency::find($settings->currency_id)) {
                return $currency->name;
            } else return "usd";
        } else return "usd";
    }

    public static function Language($user)
    {
        if ($settings = self::Settings($user)) {
            if ($language = Language::find($settings->language_id)) {
                return $language->name;
            } else return "en";
        } else return "en";
    }

    /*End::Settings*/
}
