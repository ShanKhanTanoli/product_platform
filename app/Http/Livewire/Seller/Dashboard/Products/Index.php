<?php

namespace App\Http\Livewire\Seller\Dashboard\Products;

use App\Helpers\Seller\Seller;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

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
}
