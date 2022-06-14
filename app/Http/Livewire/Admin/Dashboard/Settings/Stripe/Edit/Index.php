<?php

namespace App\Http\Livewire\Admin\Dashboard\Settings\Stripe\Edit;

use Livewire\Component;
use App\Helpers\Admin\Admin;
use Illuminate\Support\Facades\App;

class Index extends Component
{
    public function mount()
    {
        $lang = Admin::Language();
        App::setLocale($lang);
    }
    public function render()
    {
        return view('livewire.admin.dashboard.settings.stripe.edit.index');
    }
}
