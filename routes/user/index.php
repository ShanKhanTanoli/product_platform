<?php

use Illuminate\Support\Facades\Route;

/*Begin::Dashboard*/
use App\Http\Livewire\User\Dashboard\Index as UserDashboard;
/*End::Dashboard*/


/*Begin::Settings*/
use App\Http\Livewire\User\Dashboard\Settings\Profile\Index as EditProfile;
use App\Http\Livewire\User\Dashboard\Settings\Password\Index as EditPassword;
/*End::Settings*/

/*Begin::Auth,User Group*/

Route::middleware(['auth', 'user'])->prefix('User')->group(function () {

    /*Begin::Dashboard*/
    Route::get('Dashboard/{lang?}', UserDashboard::class)->name('UserDashboard');
    /*End::Dashboard*/

    /*Begin::Settings*/
    Route::get('Settings/Profile/{lang?}', EditProfile::class)->name('UserEditProfile');
    Route::get('Settings/Password/{lang?}', EditPassword::class)->name('UserEditPassword');
    /*End::Settings*/
});
/*End::Auth,User Group*/
