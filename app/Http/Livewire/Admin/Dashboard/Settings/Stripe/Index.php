<?php

namespace App\Http\Livewire\Admin\Dashboard\Settings\Stripe;

use Exception;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use App\Models\StripeConfiguration;
use Illuminate\Support\Facades\App;

class Index extends Component
{
    public $stripe, $public_key, $secret_key, $payment_mode;

    public function mount()
    {
        $lang = Admin::Language();
        App::setLocale($lang);

        if ($stripe = StripeConfiguration::first()) {

            $this->stripe = $stripe;

            $this->public_key = $this->stripe->public_key;
            $this->secret_key = $this->stripe->secret_key;
            $this->payment_mode = $this->stripe->payment_mode;
        } else {
            $this->public_key = 'Enter Public Key';
            $this->secret_key = 'Enter Secret Key';
            $this->payment_mode = 'test';
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard.settings.stripe.index')
            ->with(['stripe' => $this->stripe])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Update()
    {
        $validated = $this->validate([
            'public_key' => 'required|string',
            'secret_key' => 'required|string',
            'payment_mode' => 'required|string|in:test,live',
        ]);

        try {
            $this->stripe->update($validated);
            session()->flash('success', trans('alerts.update'));
            return redirect(route('AdminStripe', ['slug' => $this->stripe->slug, 'lang' => App::getLocale()]));
        } catch (Exception $e) {
            session()->flash('error', trans('alerts.error'));
        }
    }
}
