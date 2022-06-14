<?php

use Illuminate\Support\Facades\Route;

/*Begin::Dashboard*/
use App\Http\Livewire\Admin\Dashboard\Index as AdminDashboard;
/*End::Dashboard*/


/*Begin::Users*/
use App\Http\Livewire\Admin\Dashboard\Users\Index as Users;
use App\Http\Livewire\Admin\Dashboard\Users\Add\Index as AddUser;
use App\Http\Livewire\Admin\Dashboard\Users\Edit\Index as EditUser;
use App\Http\Livewire\Admin\Dashboard\Users\UpdatePassword\Index as UpdateUserPassword;
/*End::Users*/


/*Begin::Guests*/
use App\Http\Livewire\Admin\Dashboard\Guests\Index as Guests;
use App\Http\Livewire\Admin\Dashboard\Guests\Add\Index as AddGuest;
use App\Http\Livewire\Admin\Dashboard\Guests\Edit\Index as EditGuest;
use App\Http\Livewire\Admin\Dashboard\Guests\UpdatePassword\Index as UpdateGuestPassword;
/*End::Guests*/


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

    /*Begin::Users*/
    Route::get('Users/{lang?}', Users::class)
        ->name('AdminUsers');

    Route::get('AddUser/{lang?}', AddUser::class)
        ->name('AdminAddUser');


    Route::get('EditUser/{slug}/{lang?}', EditUser::class)
        ->name('AdminEditUser');

    Route::get('UpdateUser/{slug}/Password/{lang?}', UpdateUserPassword::class)
        ->name('AdminUpdateUserPassword');
    /*End::Users*/


    /*Begin::Guests*/
    Route::get('Guests/{lang?}', Guests::class)
        ->name('AdminGuests');

    Route::get('AddGuest/{lang?}', AddGuest::class)
        ->name('AdminAddGuest');

    Route::get('EditGuest/{slug}/{lang?}', EditGuest::class)
        ->name('AdminEditGuest');

    Route::get('UpdateGuest/{slug}/Password/{lang?}', UpdateGuestPassword::class)
        ->name('AdminUpdateGuestPassword');
    /*End::Guests*/



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
