<?php

use App\Helpers\Redirect;
use App\Helpers\Admin\Admin;
use App\Helpers\Stripe\Stripe;
use App\Helpers\Business\Business;
use App\Notifications\Alerts;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Auth::routes();


Route::get('lang/{lang?}', function ($lang = "en") {
    App::setLocale($lang);
    return trans('lang.msg');
});

Route::get('debug', function () {
});


Route::get('/home/{lang?}', function () {
    return redirect(Redirect::ToDashboard());
})->name('home');


Route::get('/{lang?}', function ($lang = "en") {
    
    App::setLocale($lang);
    return redirect(Redirect::ToDashboard());

})->name('main');

/*Begin::Admin Routes*/
include('admin/index.php');
/*End::Admin Routes*/

/*Begin::Buyer Routes*/
include('buyer/index.php');
/*End::Buyer Routes*/

/*Begin::Seller Routes*/
include('seller/index.php');
/*End::Seller Routes*/

/*Begin::Auth Routes*/
include('auth/index.php');
/*End::Auth Routes*/
