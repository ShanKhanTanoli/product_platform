<?php

namespace App\Http\Livewire\Seller\Dashboard\Products\Add;

use Exception;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $name, $price, $description, $category_id, $quantity, $publish;

    public function render()
    {
        return view('livewire.seller.dashboard.products.add.index')
            ->extends('layouts.dashboard');
    }

    public function Add()
    {
        $validated = $this->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string|min:3|max:200',
            'category_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'publish' => 'required|bool',
        ]);

        $data = [
            'slug' => Str::random(10),
            'user_id' => Auth::user()->id,
        ];
        try {
            Product::create(array_merge($validated, $data));
            session()->flash('success', trans('alerts.add'));
            return redirect()->route('SellerProducts', App::getLocale());
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }
}
