<?php

namespace App\Http\Livewire\Admin\Dashboard\Guests;

use App\Models\User;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use Livewire\WithPagination;
use App\Helpers\Guest\Guest;
use Illuminate\Support\Facades\App;

class Index extends Component
{
    public $delete;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        App::setLocale(Admin::Language());
    }

    public function render()
    {
        $guests = Guest::LatestPaginate(10);
        return view('livewire.admin.dashboard.guests.index')
            ->with(['guests' => $guests])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Edit($id)
    {
        if ($guest = User::find($id)) {
            return redirect(route('AdminEditGuest', ['slug' => $guest->slug, 'lang' => App::getLocale()]));
        }
        return session()->flash('error', trans('alerts.error'));
    }

    public function DeleteConfirmation($id)
    {
        if ($business = User::find($id)) {
            $this->delete = $business;
            $this->emit(['delete']);
        } else return session()->flash('error', trans('alerts.error'));
    }

    public function Delete($id)
    {
        if ($client = User::find($id)) {
            $client->delete();
            session()->flash('success', trans('alerts.delete'));
            return redirect(route('AdminGuests', App::getLocale()));
        }
        return session()->flash('error', trans('alerts.error'));
    }
}
