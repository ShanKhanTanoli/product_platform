<?php

namespace App\Http\Livewire\Admin\Dashboard\Sellers\UpdatePassword;

use Exception;
use App\Models\User;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use Illuminate\Support\Facades\App;

class Index extends Component
{
    public $user;

    public $password, $password_confirmation;

    public function mount($slug)
    {
        App::setLocale(Admin::Language());

        $this->user = User::where('slug', $slug)
            ->first();
        if (!$this->user) {
            session()->flash('error', trans('alerts.error'));
            return redirect(route('AdminSellers', App::getLocale()));
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard.sellers.update-password.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Update()
    {
        $validated = $this->validate([
            'password' => 'required|string|min:5|confirmed',
            'password_confirmation' => 'required|string|min:5|',
        ]);
        try {
            $this->user->update(['password' => bcrypt($validated['password'])]);
            session()->flash('success', trans('alerts.update'));
            $this->reset(['password', 'password_confirmation']);
            return redirect(route('AdminUpdateSellerPassword', ['slug' => $this->user->slug, 'lang' => App::getLocale()]));
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.error'));
        }
    }
}
