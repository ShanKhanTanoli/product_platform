<?php

namespace App\Http\Livewire\Seller\Dashboard\Partials;

use Livewire\Component;
use App\Helpers\Seller\Seller;
use App\Helpers\Currency\Currency;
use App\Helpers\Language\Language;
use App\Models\SellerSetting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class TopBar extends Component
{
    public $currentUrl, $currentRoute;

    public function mount()
    {
        $this->currentUrl = url()->current();
        $this->currentRoute = Route::currentRouteName();
    }

    public function render()
    {
        return view('livewire.seller.dashboard.partials.top-bar');
    }

    public function ChangeLanguage($slug)
    {
        if ($language = Language::FindBySlug($slug)) {

            //If Settings are available
            if ($settings = Seller::Settings(Auth::user()->id)) {

                $settings->update([
                    'language_id' => $language->id,
                ]);
            } else {

                SellerSetting::create([
                    'user_id' => Auth::user()->id,
                    'language_id' => $language->id,
                ]);
            }

            //Begin::If URL found
            if ($this->currentUrl) {

                App::setlocale($language->name);
                return redirect(route($this->currentRoute, App::getLocale()));
            } else {

                App::setlocale($language->name);
                return redirect(route('login', App::getLocale()));
            }
            //End::If URL found

        } else {

            App::setlocale('en');
            //Begin::If URL found
            if ($this->currentUrl) {
                return redirect($this->currentUrl);
            } else {
                return redirect(route('login', App::getLocale()));
            }
            //End::If URL found
        }
    }


    public function ChangeCurrency($slug)
    {
        if ($currency = Currency::FindBySlug($slug)) {

            //If Settings are available
            if ($settings = Seller::Settings(Auth::user()->id)) {

                $settings->update([
                    'currency_id' => $currency->id,
                ]);
            } else {

                SellerSetting::create([
                    'user_id' => Auth::user()->id,
                    'currency_id' => $currency->id,
                ]);
            }
        }

        //Begin::If URL found
        if ($this->currentUrl) {

            App::setlocale(App::getLocale());
            return redirect(route($this->currentRoute, App::getLocale()));
        } else {

            App::setlocale(App::getLocale());
            return redirect(route('login', App::getLocale()));
        }
        //End::If URL found
    }
}
