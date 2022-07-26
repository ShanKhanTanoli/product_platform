<?php

namespace App\Http\Livewire\Seller\Dashboard\Products\Edit;

use Exception;
use Livewire\Component;
use App\Helpers\Seller\Seller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public $temporary;

    public $product, $name, $price, $description, $category_id, $quantity, $publish, $featured_image;

    public function mount($slug)
    {
        if ($product = Seller::FindProductBySlug(Auth::user()->id, $slug)) {
            $this->product = $product;

            $this->name = $product->name;
            $this->price = $product->price;
            $this->description = $product->description;
            $this->category_id = $product->category_id;
            $this->quantity = $product->quantity;
            $this->publish = $product->publish;
            $this->featured_image = $product->featured_image;
        } else {
            session()->flash('error', trans('alerts.error'));
            return redirect()->route('SellerProducts', App::getLocale());
        }
    }

    public function render()
    {
        return view('livewire.seller.dashboard.products.edit.index')
            ->extends('layouts.dashboard');
    }

    public function Update()
    {
        $validated = $this->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string|min:3|max:200',
            'category_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'publish' => 'required|bool',
        ]);

        try {
            $this->product->update($validated);
            session()->flash('success', trans('alerts.update'));
            return redirect()->route('SellerEditProduct', ['slug' => $this->product->slug, 'lang' => App::getLocale()]);
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function UpdateFeaturedImage()
    {
        $validated = $this->validate([
            'featured_image' => 'required|image|mimes:jpg,jpeg,png,svg,gif',
        ]);
        $image = time() . '.' . $validated['featured_image']->getClientOriginalExtension();
        $path = $validated['featured_image']->storeAs('public/images/products/featured-images', $image);
        try {
            $this->product->update(['featured_image' => $path]);
            session()->flash('success', trans('alerts.update'));
            return redirect()->route('SellerEditProduct', ['slug' => $this->product->slug, 'lang' => App::getLocale()]);
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }
}
