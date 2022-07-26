<?php

namespace App\Http\Livewire\Seller\Dashboard\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Seller\Seller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $delete;

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public function render()
    {

        $products = Seller::LatestProductsPaginate(Auth::user()->id, 6);
        return view('livewire.seller.dashboard.products.index')
            ->with(['products' => $products])
            ->extends('layouts.dashboard');
    }

    public function Archive($id)
    {
        if ($product = Seller::FindProduct(Auth::user()->id, $id)) {
            $product->update(['publish' => 0]);
            session()->flash('success', trans('alerts.update'));
            //return redirect()->route('SellerProducts', App::getLocale());
        } else return session()->flash('error', trans('alerts.error'));
    }

    public function Publish($id)
    {
        if ($product = Seller::FindProduct(Auth::user()->id, $id)) {
            $product->update(['publish' => 1]);
            session()->flash('success', trans('alerts.update'));
            //return redirect()->route('SellerProducts', App::getLocale());
        } else return session()->flash('error', trans('alerts.error'));
    }

    public function DeleteConfirmation($id)
    {
        if ($product = Seller::FindProduct(Auth::user()->id, $id)) {
            $this->delete = $product;
            $this->emit(['delete']);
        } else return session()->flash('error', trans('alerts.error'));
    }

    public function Delete($id)
    {
        if ($product = Seller::FindProduct(Auth::user()->id, $id)) {
            $product->forceDelete();
            session()->flash('success', trans('alerts.delete'));
            return redirect(route('SellerProducts', App::getLocale()));
        } else return session()->flash('error', trans('alerts.error'));
    }

    public function Edit($slug)
    {
        return redirect()->route('SellerEditProduct', ['slug' => $slug, 'lang' => App::getLocale()]);
    }
}
