<?php

namespace App\Http\Livewire\Admin\Dashboard\Sellers;

use App\Models\User;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use Livewire\WithPagination;
use App\Helpers\Seller\Seller;
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
        $sellers = Seller::LatestPaginate(10);
        return view('livewire.admin.dashboard.sellers.index')
            ->with(['sellers' => $sellers])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Edit($id)
    {
        if ($seller = User::find($id)) {
            return redirect(route('AdminEditSeller', ['slug' => $seller->slug, 'lang' => App::getLocale()]));
        } else return session()->flash('error', trans('alerts.error'));
    }

    public function DeleteConfirmation($id)
    {
        if ($seller = User::find($id)) {
            $this->delete = $seller;
            $this->emit(['delete']);
        } else return session()->flash('error', trans('alerts.error'));
    }

    public function Delete($id)
    {
        if ($seller = User::find($id)) {
            $seller->delete();
            session()->flash('success', trans('alerts.delete'));
            return redirect(route('AdminSellers', App::getLocale()));
        }
        return session()->flash('error', trans('alerts.error'));
    }
}
