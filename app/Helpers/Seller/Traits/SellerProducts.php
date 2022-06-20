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
    /*End::Seller Products*/
}
