<?php

namespace App\Http\Livewire\Admin\Dashboard\Users;

use App\Models\User as UserModel;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use Livewire\WithPagination;
use App\Helpers\User\User;
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
        $users = User::LatestPaginate(10);
        return view('livewire.admin.dashboard.users.index')
            ->with(['users' => $users])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Edit($id)
    {
        if ($user = User::find($id)) {
            return redirect(route('AdminEditUser', ['slug' => $user->slug, 'lang' => App::getLocale()]));
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
            return redirect(route('AdminUsers', App::getLocale()));
        }else return session()->flash('error', trans('alerts.error'));
    }
}
