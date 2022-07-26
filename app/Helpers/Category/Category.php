<?php

namespace App\Helpers\Category;

use App\Models\Category as CategoryModel;

class Category
{

    public static function all()
    {
        return CategoryModel::all();
    }

    public static function Latest()
    {
        return CategoryModel::Latest()
        ->get();
    }

    public static function count()
    {
        return CategoryModel::count();
    }

    public static function Find($category)
    {
        $category = CategoryModel::find($category);
        if ($category) {
            return $category;
        } else return false;
    }

    public static function FindBySlug($slug)
    {
        $category = CategoryModel::where('slug', $slug)->first();
        if ($category) {
            return $category;
        } else return false;
    }
}
