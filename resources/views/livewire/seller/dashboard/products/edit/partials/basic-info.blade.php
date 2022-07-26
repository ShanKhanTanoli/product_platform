<div class="col-9">
    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">
                    {{ trans('seller.edit-product') }}
                </h6>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="container">
                <form wire:submit.prevent='Update'>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group-static my-3">
                                <label for="name">{{ trans('seller.product-name') }}</label>
                                <input type="text" wire:model.defer='name' value="{{ old('name') }}"
                                    class="form-control  @error('name') is-invalid @enderror"
                                    placeholder="{{ trans('seller.product-name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-static my-3">
                                <label for="price">
                                    {{ trans('seller.product-price') }}
                                    ({{ Str::upper(Seller::Currency(Auth::user()->id)) }})
                                </label>
                                <input type="text" wire:model.defer='price' value="{{ old('price') }}"
                                    class="form-control  @error('price') is-invalid @enderror"
                                    placeholder="{{ trans('seller.product-price') }} ({{ Str::upper(Seller::Currency(Auth::user()->id)) }})">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group input-group-static my-3">
                                <label for="description">{{ trans('seller.product-description') }}</label>
                                <textarea placeholder="{{ trans('seller.product-description') }}"
                                    class="form-control  @error('description') is-invalid @enderror" wire:model.defer='description'>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if (Category::count() > 0)
                            <div class="col-md-12">
                                <div class="input-group input-group-static my-3">
                                    <label for="category_id">{{ trans('seller.product-category') }}</label>
                                    <select wire:model.defer='category_id'
                                        class="form-control  @error('category_id') is-invalid @enderror">
                                        <option value="">Select Category</option>
                                        @foreach (Category::Latest() as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @else
                            <div class="col-md-12 text-danger">
                                Categories not found
                            </div>
                        @endif
                        <div class="col-md-6">
                            <div class="input-group input-group-static my-3">
                                <label for="quantity">{{ trans('seller.product-quantity') }}</label>
                                <input type="text" wire:model.defer='quantity' value="{{ old('quantity') }}"
                                    class="form-control  @error('quantity') is-invalid @enderror"
                                    placeholder="{{ trans('seller.product-quantity') }}">
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-static my-3">
                                <label for="publish">{{ trans('seller.product-visibility') }}</label>
                                <select wire:model.defer='publish'
                                    class="form-control  @error('publish') is-invalid @enderror">
                                    <option value="">Select Visibility</option>
                                    <option value="1">Publish</option>
                                    <option value="0">Archive</option>
                                </select>
                                @error('publish')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" wire:attr='disabled'>
                                <span wire:target='Update' wire:loading class="spinner-border spinner-border-sm"
                                    role="status" aria-hidden="true">
                                </span>
                                {{ trans('seller.save-changes') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
