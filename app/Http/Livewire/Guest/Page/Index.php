<?php

namespace App\Http\Livewire\Guest\Page;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.guest.page.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function logout()
    {
        dd('hello');
    }
}
