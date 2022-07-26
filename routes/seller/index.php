<?php

use Illuminate\Support\Facades\Route;

/*Begin::Dashboard*/
use App\Http\Livewire\Seller\Dashboard\Index as SellerDashboard;
/*End::Dashboard*/


/*Begin::Products*/
use App\Http\Livewire\Seller\Dashboard\Products\Index as Products;
use App\Http\Livewire\Seller\Dashboard\Products\Add\Index as AddProduct;
use App\Http\Livewire\Seller\Dashboard\Products\Edit\Index as EditProduct;
/*End::Products*/

/*Begin::Settings*/
use App\Http\Livewire\Seller\Dashboard\Settings\Profile\Index as EditProfile;
use App\Http\Livewire\Seller\Dashboard\Settings\Password\Index as EditPassword;
/*End::Settings*/

/*Begin::Auth,Seller Group*/

Route::middleware(['auth', 'seller'])->prefix('Seller')->group(function () {

    /*Begin::Dashboard*/
    Route::get('Dashboard/{lang?}', SellerDashboard::class)->name('SellerDashboard');
    /*End::Dashboard*/

    /*Begin::Products*/
    Route::get('Products/{lang?}', Products::class)->name('SellerProducts');
    Route::get('AddProduct/{lang?}', AddProduct::class)->name('SellerAddProduct');
    Route::get('EditProduct/{slug}/{lang?}', EditProduct::class)->name('SellerEditProduct');
    /*End::Products*/

    /*Begin::Settings*/
    Route::get('Settings/Profile/{lang?}', EditProfile::class)->name('SellerEditProfile');
    Route::get('Settings/Password/{lang?}', EditPassword::class)->name('SellerEditPassword');
    /*End::Settings*/
});
/*End::Auth,Seller Group*/
