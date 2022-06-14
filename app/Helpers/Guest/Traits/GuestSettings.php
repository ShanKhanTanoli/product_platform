<?php

namespace App\Helpers\Guest\Traits;

use App\Models\GuestSetting;
use App\Models\Language;

trait GuestSettings
{

    /*Begin::Settings*/
    public static function Settings($guest)
    {
        return GuestSetting::where('user_id', $guest)
            ->first();
    }

    public static function Language($guest)
    {
        if ($settings = self::Settings($guest)) {
            if ($language = Language::find($settings->language_id)) {
                return $language->name;
            } else return "en";
        } else return "en";
    }

    /*End::Settings*/
}
