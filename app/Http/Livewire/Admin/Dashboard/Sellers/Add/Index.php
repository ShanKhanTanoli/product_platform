<?php

namespace App\Http\Livewire\Admin\Dashboard\Sellers\Add;

use Exception;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Helpers\Admin\Admin;
use Illuminate\Support\Facades\App;

class Index extends Component
{
    public $name, $user_name, $number, $email, $password, $password_confirmation;

    public function mount()
    {
        App::setLocale(Admin::Language());
    }

    public function render()
    {
        return view('livewire.admin.dashboard.sellers.add.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Add()
    {
        $validated = $this->validate([
            'name' => 'required|string|min:3',
            'user_name' => 'required|string|unique:users,user_name',
            'number' => 'required|numeric|unique:users,number',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|string',
        ]);
        try {
            $data = [
                'name' => $validated['name'],
                'user_name' => $validated['user_name'],
                'email' => $validated['email'],
                'number' => $validated['number'],
                'password' => bcrypt($validated['password']),
                'slug' => strtoupper(Str::random(20)),
                'role' => 'seller',
            ];
            User::create($data);
            session()->flash('success', trans('alerts.add'));
            return redirect(route('AdminSellers', App::getLocale()));
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.error'));
        }
    }
}
