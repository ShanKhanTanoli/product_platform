<div class="col-lg-3">
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
            <li class="nav-item @if (Request::path() == 'Seller/EditProductAttributes/' . $product->slug . '/' . App::getLocale()) active bg-gradient-primary @endif" wire:ignore.self>
                <a class="nav-link text-dark d-flex @if (Request::path() == 'Seller/EditProductAttributes/' . $product->slug . '/' . App::getLocale()) active text-white @endif"
                    href="{{ route('SellerEditProduct', ['slug' => $product->slug, 'lang' => App::getLocale()]) }}"
                    wire:ignore.self>
                    <i class="fas fa-list me-2"></i>
                    <span class="text-sm">Attributes</span>
                </a>
            </li>
            <li class="nav-item @if (Request::path() == 'Seller/EditProductImages/' . $product->slug . '/' . App::getLocale()) active bg-gradient-primary @endif" wire:ignore.self>
                <a class="nav-link text-dark d-flex @if (Request::path() == 'Seller/EditProductImages/' . $product->slug . '/' . App::getLocale()) active text-white @endif"
                    href="{{ route('SellerEditProduct', ['slug' => $product->slug, 'lang' => App::getLocale()]) }}"
                    wire:ignore.self>
                    <i class="fas fa-images me-2"></i>
                    <span class="text-sm">Images</span>
                </a>
            </li>
            <li class="nav-item @if (Request::path() == 'Seller/EditProductFeaturedImage/' . $product->slug . '/' . App::getLocale()) active bg-gradient-primary @endif" wire:ignore.self>
                <a class="nav-link text-dark d-flex @if (Request::path() == 'Seller/EditProductFeaturedImage/' . $product->slug . '/' . App::getLocale()) active text-white @endif"
                    href="{{ route('SellerEditProduct', ['slug' => $product->slug, 'lang' => App::getLocale()]) }}"
                    wire:ignore.self>
                    <i class="fas fa-image me-2"></i>
                    <span class="text-sm">Featured Image</span>
                </a>
            </li>
        </ul>
    </div>
</div>
