<?php

use Illuminate\Support\Facades\Route;

/*Begin::Guest Dashboard*/
use App\Http\Livewire\Guest\Page\Index as GuestPage;
/*End::Guest Dashboard*/

/*Begin::Auth,Guest Group*/
Route::middleware(['auth', 'guest'])->prefix('Guest')->group(function () {

    Route::get('Page/{lang?}', GuestPage::class)->name('GuestDashboard');

});
/*End::Auth,Guest Group*/
