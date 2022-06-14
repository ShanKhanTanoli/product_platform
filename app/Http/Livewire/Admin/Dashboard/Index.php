<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Helpers\Admin\Admin;
use Illuminate\Support\Facades\App;

class Index extends Component
{

    public function mount()
    {
        App::setLocale(Admin::Language());
    }
    public function render()
    {
        return view('livewire.admin.dashboard.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
