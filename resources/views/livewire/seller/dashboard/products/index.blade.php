<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mb-4">
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <a href="{{ route('SellerProducts', App::getLocale()) }}">
                <div class="card">
                    <div class="card-header p-3 pt-2" style="border-radius: 0;">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-box-open opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">
                                {{ trans('seller.products') }}
                            </p>
                            <h4 class="mb-0">
                                {{ Seller::CountProducts(Auth::user()->id) }}
                            </h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <a href="{{ route('SellerAddProduct', App::getLocale()) }}">
                <div class="card">
                    <div class="card-header p-3 pt-2" style="border-radius: 0;">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-plus opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">
                                {{ trans('seller.add-new') }}
                            </p>
                            <h4 class="mb-0">
                                {{ trans('seller.product') }}
                            </h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            {{ trans('seller.products') }}
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        #
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ trans('seller.products-table-name') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ trans('seller.products-table-featured-image') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ trans('seller.products-table-price') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ trans('seller.products-table-category') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ trans('seller.products-table-quantity') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ trans('seller.products-table-sold') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ trans('seller.products-table-available') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ trans('seller.products-table-status') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ trans('seller.products-table-visibility') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ trans('seller.products-table-more') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ trans('seller.products-table-delete') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ $loop->iteration }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ $product->name }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        @if ($product->featured_image)
                                                            <img style="width: 20%;" id="featured-image"
                                                                src="{{ Storage::url($product->featured_image) }}"
                                                                class="rounded" alt="...">
                                                        @else
                                                            <img style="width: 20%;" id="featured-image"
                                                                src="{{ asset('images/placeholder.jpg') }}"
                                                                class="rounded" alt="...">
                                                        @endif
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ $product->price }}
                                                        {{ Str::upper(Seller::Currency(Auth::user()->id)) }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    @if ($category = Category::Find($product->category_id))
                                                        <span class="badge bg-info">
                                                            {!! $category->name !!}
                                                        </span>
                                                    @else
                                                        <span class="badge bg-danger">
                                                            NOT FOUND
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    {{ $product->quantity }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    0
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    0
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <!--Begin::If Product Banned-->
                                                    @if ($product->trashed())
                                                        <span class="badge bg-danger">
                                                            BANNED
                                                        </span>
                                                    @else
                                                        <!--Begin::If Product is Published-->
                                                        @if ($product->publish)
                                                            <span class="badge bg-info">
                                                                PUBLISHED
                                                            </span>
                                                        @else
                                                            <span class="badge bg-danger">
                                                                ARCHIVED
                                                            </span>
                                                        @endif
                                                        <!--End::If Product is Published-->
                                                    @endif
                                                    <!--End::If Product Banned-->
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <!--Begin::If Product Banned-->
                                                    @if ($product->trashed())
                                                        <button class="btn btn-sm btn-danger disabled">
                                                            BANNED
                                                        </button>
                                                    @else
                                                        <!--Begin::If Product is Published-->
                                                        @if ($product->publish)
                                                            <button class="btn btn-sm btn-danger"
                                                                wire:click='Archive("{{ $product->id }}")'>
                                                                <span wire:loading
                                                                    wire:target='Archive("{{ $product->id }}")'
                                                                    class="spinner-border spinner-border-sm"
                                                                    role="status" aria-hidden="true"></span>
                                                                Archive
                                                            </button>
                                                        @else
                                                            <button class="btn btn-sm btn-info"
                                                                wire:click='Publish("{{ $product->id }}")'>
                                                                <span wire:loading
                                                                    wire:target='Publish("{{ $product->id }}")'
                                                                    class="spinner-border spinner-border-sm"
                                                                    role="status" aria-hidden="true"></span>
                                                                Publish
                                                            </button>
                                                        @endif
                                                        <!--End::If Product is Published-->
                                                    @endif
                                                    <!--End::If Product Banned-->
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            @if ($product->trashed())
                                                <button class="btn btn-sm btn-danger disabled">
                                                    BANNED
                                                </button>
                                            @else
                                                <button class="btn btn-sm btn-success"
                                                    wire:click='Edit("{{ $product->slug }}")'>
                                                    <span wire:loading wire:target='Edit("{{ $product->slug }}")'
                                                        class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    {{ trans('admin.seller-table-more') }}
                                                </button>
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            @if ($product->trashed())
                                                <button class="btn btn-sm btn-danger disabled">
                                                    BANNED
                                                </button>
                                            @else
                                                <button class="btn btn-sm btn-danger"
                                                    wire:click='DeleteConfirmation("{{ $product->id }}")'>
                                                    <span wire:loading
                                                        wire:target='DeleteConfirmation("{{ $product->id }}")'
                                                        class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    {{ trans('admin.seller-table-delete') }}
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $products->render() }}
                </div>
            </div>
        </div>
    </div>
    @if ($delete)
        <!--Begin::DeleteModel-->
        @include('livewire.admin.dashboard.partials.delete-modal')
        <!--End::DeleteModel-->
    @endif
    <!--Begin::Script-->
    @section('scripts')
        <script>
            Livewire.on('delete', function() {
                $('#delete-notification').modal('show');
            })
        </script>
    @endsection
    <!--End::Script-->
</div>
