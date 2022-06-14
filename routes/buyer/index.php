<?php

use Illuminate\Support\Facades\Route;

/*Begin::Dashboard*/
use App\Http\Livewire\Buyer\Dashboard\Index as BuyerDashboard;
/*End::Dashboard*/


/*Begin::Settings*/
use App\Http\Livewire\Buyer\Dashboard\Settings\Profile\Index as EditProfile;
use App\Http\Livewire\Buyer\Dashboard\Settings\Password\Index as EditPassword;
/*End::Settings*/

/*Begin::Auth,Buyer Group*/

Route::middleware(['auth', 'buyer'])->prefix('Buyer')->group(function () {

    /*Begin::Dashboard*/
    Route::get('Dashboard/{lang?}', BuyerDashboard::class)->name('BuyerDashboard');
    /*End::Dashboard*/

    /*Begin::Settings*/
    Route::get('Settings/Profile/{lang?}', EditProfile::class)->name('BuyerEditProfile');
    Route::get('Settings/Password/{lang?}', EditPassword::class)->name('BuyerEditPassword');
    /*End::Settings*/
});
/*End::Auth,Buyer Group*/
