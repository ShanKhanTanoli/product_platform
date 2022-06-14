<?php

use Illuminate\Support\Facades\Route;

/*Begin::Dashboard*/
use App\Http\Livewire\Admin\Dashboard\Index as AdminDashboard;
/*End::Dashboard*/


/*Begin::Buyers*/
use App\Http\Livewire\Admin\Dashboard\Buyers\Index as Buyers;
use App\Http\Livewire\Admin\Dashboard\Buyers\Add\Index as AddBuyer;
use App\Http\Livewire\Admin\Dashboard\Buyers\Edit\Index as EditBuyer;
use App\Http\Livewire\Admin\Dashboard\Buyers\UpdatePassword\Index as UpdateBuyerPassword;
/*End::Buyers*/


/*Begin::Sellers*/
use App\Http\Livewire\Admin\Dashboard\Sellers\Index as Sellers;
use App\Http\Livewire\Admin\Dashboard\Sellers\Add\Index as AddSeller;
use App\Http\Livewire\Admin\Dashboard\Sellers\Edit\Index as EditSeller;
use App\Http\Livewire\Admin\Dashboard\Sellers\UpdatePassword\Index as UpdateSellerPassword;
/*End::Sellers*/


/*Begin::Settings*/
use App\Http\Livewire\Admin\Dashboard\Settings\Index as Settings;
use App\Http\Livewire\Admin\Dashboard\Settings\Profile\Index as EditProfile;
use App\Http\Livewire\Admin\Dashboard\Settings\Currencies\Index as Currency;
use App\Http\Livewire\Admin\Dashboard\Settings\Languages\Index as Language;
use App\Http\Livewire\Admin\Dashboard\Settings\Currencies\Edit\Index as EditCurrency;
use App\Http\Livewire\Admin\Dashboard\Settings\Stripe\Index as Stripe;
use App\Http\Livewire\Admin\Dashboard\Settings\Stripe\Edit\Index as EditStripe;
use App\Http\Livewire\Admin\Dashboard\Settings\Password\Index as EditPassword;
/*End::Settings*/

/*Begin::Auth,Admin Group*/

Route::middleware(['auth', 'admin'])->prefix('Admin')->group(function () {

    /*Begin::Dashboard*/
    Route::get('Dashboard/{lang?}', AdminDashboard::class)
        ->name('AdminDashboard');
    /*End::Dashboard*/

    /*Begin::Buyers*/
    Route::get('Buyers/{lang?}', Buyers::class)
        ->name('AdminBuyers');

    Route::get('AddBuyer/{lang?}', AddBuyer::class)
        ->name('AdminAddBuyer');


    Route::get('EditBuyer/{slug}/{lang?}', EditBuyer::class)
        ->name('AdminEditBuyer');

    Route::get('UpdateBuyer/{slug}/Password/{lang?}', UpdateBuyerPassword::class)
        ->name('AdminUpdateBuyerPassword');
    /*End::Buyers*/


    /*Begin::Sellers*/
    Route::get('Sellers/{lang?}', Sellers::class)
        ->name('AdminSellers');

    Route::get('AddSeller/{lang?}', AddSeller::class)
        ->name('AdminAddSeller');

    Route::get('EditSeller/{slug}/{lang?}', EditSeller::class)
        ->name('AdminEditSeller');

    Route::get('UpdateSeller/{slug}/Password/{lang?}', UpdateSellerPassword::class)
        ->name('AdminUpdateSellerPassword');
    /*End::Sellers*/

    /*Begin::Settings*/
    Route::get('Settings/General/{lang?}', Settings::class)
        ->name('AdminSettings');

    Route::get('Settings/Profile/{lang?}', EditProfile::class)
        ->name('AdminEditProfile');

    Route::get('Settings/Currency/{lang?}', Currency::class)
        ->name('AdminCurrency');

    Route::get('Settings/EditCurrency/{slug}/{lang?}', EditCurrency::class)
        ->name('AdminEditCurrency');

    Route::get('Settings/Language/{lang?}', Language::class)
        ->name('AdminLanguage');

    Route::get('Settings/Stripe/{lang?}', Stripe::class)
        ->name('AdminStripe');

    Route::get('Settings/EditStripe/{lang?}', EditStripe::class)
        ->name('AdminEditStripe');

    Route::get('Settings/Password/{lang?}', EditPassword::class)
        ->name('AdminEditPassword');
    /*End::Settings*/
});
/*End::Auth,Admin Group*/
