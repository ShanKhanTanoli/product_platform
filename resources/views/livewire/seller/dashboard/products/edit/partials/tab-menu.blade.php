<div class="col-lg-2">
    <div class="card position-sticky">
        <ul class="nav flex-column bg-white border-radius-lg p-3">
            <li class="nav-item @if (Request::path() == 'Seller/EditProduct/' . $product->slug . '/' . App::getLocale()) active bg-gradient-primary @endif" wire:ignore.self>
                <a class="nav-link text-dark d-flex @if (Request::path() == 'Seller/EditProduct/' . $product->slug . '/' . App::getLocale()) active text-white @endif"
                    href="{{ route('SellerEditProduct', ['slug' => $product->slug, 'lang' => App::getLocale()]) }}"
                    wire:ignore.self>
                    <i class="fas fa-edit me-2"></i>
                    <span class="text-sm">{{ trans('seller.product-info') }}</span>
                </a>
            </li>
            <li class="nav-item @if (Request::path() == 'Seller/EditFeaturedImage/' . $product->slug . '/' . App::getLocale()) active bg-gradient-primary @endif" wire:ignore.self>
                <a class="nav-link text-dark d-flex @if (Request::path() == 'Seller/EditFeaturedImage/' . $product->slug . '/' . App::getLocale()) active text-white @endif"
                    href="{{ route('SellerEditFeaturedImage', ['slug' => $product->slug, 'lang' => App::getLocale()]) }}"
                    wire:ignore.self>
                    <i class="fas fa-image me-2"></i>
                    <span class="text-sm">{{ trans('seller.product-featured-image') }}</span>
                </a>
            </li>
            <li class="nav-item @if (Request::path() == 'Seller/EditColors/' . $product->slug . '/' . App::getLocale()) active bg-gradient-primary @endif" wire:ignore.self>
                <a class="nav-link text-dark d-flex @if (Request::path() == 'Seller/EditColors/' . $product->slug . '/' . App::getLocale()) active text-white @endif"
                    href="{{ route('SellerEditColors', ['slug' => $product->slug, 'lang' => App::getLocale()]) }}"
                    wire:ignore.self>
                    <i class="fas fa-edit me-2"></i>
                    <span class="text-sm">{{ trans('seller.product-colors') }}</span>
                </a>
            </li>
            <li class="nav-item @if (Request::path() == 'Seller/EditSizes/' . $product->slug . '/' . App::getLocale()) active bg-gradient-primary @endif" wire:ignore.self>
                <a class="nav-link text-dark d-flex @if (Request::path() == 'Seller/EditSizes/' . $product->slug . '/' . App::getLocale()) active text-white @endif"
                    href="{{ route('SellerEditSizes', ['slug' => $product->slug, 'lang' => App::getLocale()]) }}"
                    wire:ignore.self>
                    <i class="fas fa-edit me-2"></i>
                    <span class="text-sm">{{ trans('seller.product-sizes') }}</span>
                </a>
            </li>
            <li class="nav-item @if (Request::path() == 'Seller/EditImages/' . $product->slug . '/' . App::getLocale()) active bg-gradient-primary @endif" wire:ignore.self>
                <a class="nav-link text-dark d-flex @if (Request::path() == 'Seller/EditImages/' . $product->slug . '/' . App::getLocale()) active text-white @endif"
                    href="{{ route('SellerEditImages', ['slug' => $product->slug, 'lang' => App::getLocale()]) }}"
                    wire:ignore.self>
                    <i class="fas fa-images me-2"></i>
                    <span class="text-sm">{{ trans('seller.product-images') }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
