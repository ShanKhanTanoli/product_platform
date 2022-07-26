<?php

namespace App\Helpers\Seller\Traits;

use App\Models\SellerSetting;
use App\Models\Currency;
use App\Models\Language;

trait SellerSettings
{

    /*Begin::Settings*/
    public static function Settings($seller)
    {
        return SellerSetting::where('user_id', $seller)
            ->first();
    }

    public static function Currency($seller)
    {
        if ($settings = self::Settings($seller)) {
            if ($currency = Currency::find($settings->currency_id)) {
                return $currency->name;
            } else return "usd";
        } else return "usd";
    }

    public static function Language($seller)
    {
        if ($settings = self::Settings($seller)) {
            if ($language = Language::find($settings->language_id)) {
                return $language->name;
            } else return "en";
        } else return "en";
    }

    /*End::Settings*/
}
