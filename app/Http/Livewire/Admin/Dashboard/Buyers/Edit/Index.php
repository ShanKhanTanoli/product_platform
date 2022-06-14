<?php

namespace App\Http\Livewire\Admin\Dashboard\Buyers\Edit;

use Exception;
use App\Models\User;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use Illuminate\Support\Facades\App;

class Index extends Component
{
    public $user;

    public $name, $user_name, $email, $number;

    public function mount($slug)
    {
        App::setLocale(Admin::Language());
        $this->user = User::where('slug', $slug)
            ->first();
        if ($this->user) {
            $this->name = $this->user->name;
            $this->user_name = $this->user->user_name;
            $this->email = $this->user->email;
            $this->number = $this->user->number;
            $this->role = $this->user->role;
        } else {
            session()->flash('error', trans('alerts.error'));
            return redirect(route('AdminBuyers', App::getLocale()));
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard.buyers.edit.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Update()
    {
        $validated = $this->validate([
            'name' => 'required|string|min:3',
            'user_name' => 'required|string|unique:users,user_name,' . $this->user->id,
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'number' => 'required|numeric|unique:users,number,' . $this->user->id,
        ]);

        $data = [
            'name' => $validated['name'],
            'user_name' => $validated['user_name'],
            'email' => $validated['email'],
            'number' => $validated['number'],
        ];

        try {
            $this->user->update($data);
            session()->flash('success', trans('alerts.update'));
            return redirect(route('AdminEditBuyer', ['slug' => $this->user->slug, 'lang' => App::getLocale()]));
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.error'));
        }
    }
}
