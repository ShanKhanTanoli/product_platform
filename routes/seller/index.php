<?php

use Illuminate\Support\Facades\Route;

/*Begin::Dashboard*/
use App\Http\Livewire\Seller\Dashboard\Index as SellerDashboard;
/*End::Dashboard*/


/*Begin::Settings*/
use App\Http\Livewire\Seller\Dashboard\Settings\Profile\Index as EditProfile;
use App\Http\Livewire\Seller\Dashboard\Settings\Password\Index as EditPassword;
/*End::Settings*/

/*Begin::Auth,Seller Group*/

Route::middleware(['auth', 'seller'])->prefix('Seller')->group(function () {

    /*Begin::Dashboard*/
    Route::get('Dashboard/{lang?}', SellerDashboard::class)->name('SellerDashboard');
    /*End::Dashboard*/

    /*Begin::Settings*/
    Route::get('Settings/Profile/{lang?}', EditProfile::class)->name('SellerEditProfile');
    Route::get('Settings/Password/{lang?}', EditPassword::class)->name('SellerEditPassword');
    /*End::Settings*/
});
/*End::Auth,Seller Group*/
