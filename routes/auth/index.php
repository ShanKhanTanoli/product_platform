<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Logout;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\Auth\VerifyEmail;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SellerRegister;
use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\BuyerRegister;

/*Begin::Auth Routes*/

Route::get('RegisterBuyer/{lang?}', BuyerRegister::class)
    ->name('BuyerRegister');

Route::get('RegisterSeller/{lang?}', SellerRegister::class)
    ->name('SellerRegister');

Route::get('/login/{lang?}', Login::class)
    ->name('login');

Route::get('logout/{lang?}', Logout::class)
    ->name('logout');

Route::get('/login/forgot-password/{lang?}', ForgotPassword::class)
    ->name('forgot-password');

Route::get('/reset-password/{id}/{lang?}', ResetPassword::class)
    ->name('reset-password')->middleware('signed');

Route::get('VerifyEmail/{lang?}', VerifyEmail::class)
    ->name('verification.notice')
    ->middleware('auth');

Route::get('Verify/{lang?}', Verify::class)
    ->name('verification.verify')
    ->middleware('auth');

/*End::Auth Routes*/