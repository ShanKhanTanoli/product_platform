<?php

namespace App\Helpers\Buyer\Traits;

use App\Models\BuyerSetting;
use App\Models\Currency;
use App\Models\Language;

trait BuyerSettings
{

    /*Begin::Settings*/
    public static function Settings($buyer)
    {
        return BuyerSetting::where('user_id', $buyer)
            ->first();
    }

    public static function Currency($buyer)
    {
        if ($settings = self::Settings($buyer)) {
            if ($currency = Currency::find($settings->currency_id)) {
                return $currency->name;
            } else return "usd";
        } else return "usd";
    }

    public static function Language($buyer)
    {
        if ($settings = self::Settings($buyer)) {
            if ($language = Language::find($settings->language_id)) {
                return $language->name;
            } else return "en";
        } else return "en";
    }

    /*End::Settings*/
}
