<?php

namespace App\Helpers\Seller\Traits;

use App\Models\Product;

trait SellerProducts
{
    /*Begin::Seller Products*/
    public static function LatestProducts($seller)
    {
        return Product::withTrashed()
            ->where('user_id', $seller)
            ->latest();
    }
    public static function LatestProductsPaginate($seller, $quantity)
    {
        return self::LatestProducts($seller)
            ->paginate($quantity);
    }

    public static function CountProducts($seller)
    {
        return self::LatestProducts($seller)
            ->count();
    }

    public static function FindProduct($seller, $product)
    {
        return Product::where('user_id', $seller)
            ->find($product);
    }

    public static function FindProductBySlug($seller, $slug)
    {
        return Product::where('user_id', $seller)
            ->where('slug', $slug)
            ->first();
    }
    /*End::Seller Products*/
}
