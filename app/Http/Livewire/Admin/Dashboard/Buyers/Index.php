<?php

namespace App\Http\Livewire\Admin\Dashboard\Buyers;

use App\Models\User;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use Livewire\WithPagination;
use App\Helpers\Buyer\Buyer;
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
        $buyers = Buyer::LatestPaginate(10);
        return view('livewire.admin.dashboard.buyers.index')
            ->with(['buyers' => $buyers])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Edit($id)
    {
        if ($user = User::find($id)) {
            return redirect(route('AdminEditBuyer', ['slug' => $user->slug, 'lang' => App::getLocale()]));
        }
        return session()->flash('error', trans('alerts.error'));
    }

    public function DeleteConfirmation($id)
    {
        if ($user = User::find($id)) {
            $this->delete = $user;
            $this->emit(['delete']);
        } else return session()->flash('error', trans('alerts.error'));
    }

    public function Delete($id)
    {
        if ($user = User::find($id)) {
            $user->delete();
            session()->flash('success', trans('alerts.delete'));
            return redirect(route('AdminBuyers', App::getLocale()));
        }else return session()->flash('error', trans('alerts.error'));
    }
}
