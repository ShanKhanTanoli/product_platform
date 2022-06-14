<?php

namespace App\Http\Livewire\Admin\Dashboard\Settings\Languages;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard.settings.languages.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
