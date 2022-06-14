<?php

namespace App\Http\Livewire\Admin\Dashboard\Settings;

use App\Models\Setting;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $settings;
    public $company_name,
        $company_email,
        $company_phone,
        $company_address,
        $comission_percentage,
        $language_id,
        $currency_id;

    public function mount()
    {
        App::setLocale(Admin::Language());

        if ($settings = Admin::Settings()) {
            $this->settings = $settings;
            $this->company_name = $settings->company_name;
            $this->company_email = $settings->company_email;
            $this->company_phone = $settings->company_phone;
            $this->company_address = $settings->company_address;
            $this->comission_percentage = $settings->comission_percentage;
            $this->language_id = $settings->language_id;
            $this->currency_id = $settings->currency_id;
        } else {
            $this->company_name = "Home";
            $this->company_email = "Company Email";
            $this->company_phone = "00000000000";
            $this->company_address = "Company Address";
            $this->comission_percentage = "1";
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard.settings.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Update()
    {
        $msg = [
            'company_name.required' => 'Enter Company Name',
        ];

        $validated = $this->validate([
            'company_name' => 'required|string',
            'company_email' => 'required|email',
            'company_phone' => 'required|numeric',
            'company_address' => 'required|string',
            'comission_percentage' => 'required|numeric',
            'language_id' => 'required|numeric',
            'currency_id' => 'required|numeric',
        ], $msg);

        if ($settings = Admin::Settings()) {
            $settings->update($validated);
            session()->flash('success', trans('alerts.update'));

            App::setLocale(Admin::Language());
            
            return redirect(route('AdminSettings', App::getLocale()));
        } else {
            Setting::create($validated);
            return session()->flash('success', trans('alerts.update'));
        }
    }
}
