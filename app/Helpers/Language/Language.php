<?php

namespace App\Helpers\Language;

use App\Models\Language as LanguageModel;

class Language
{

    public static function all()
    {
        return LanguageModel::all();
    }

    public static function count()
    {
        return LanguageModel::count();
    }

    public static function Find($language)
    {
        $language = LanguageModel::find($language);
        if ($language) {
            return $language;
        } else return false;
    }

    public static function FindBySlug($slug)
    {
        $language = LanguageModel::where('slug', $slug)->first();
        if ($language) {
            return $language;
        } else return false;
    }
}
