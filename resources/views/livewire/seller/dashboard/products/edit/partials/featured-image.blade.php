<div class="col-3">
    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 text-center">
                    {{ trans('seller.edit-product-featured-image') }}
                </h6>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="container">
                <form wire:submit.prevent='UpdateFeaturedImage'>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="text-center">
                                @if ($featured_image)
                                    <img style="width: 100%;" id="featured-image"
                                        src="{{ $featured_image->temporaryUrl() }}" class="rounded" alt="...">
                                @else
                                    @if($product->featured_image)
                                    <img style="width: 100%;" id="featured-image"
                                        src="{{ Storage::url($product->featured_image) }}" class="rounded" alt="...">
                                    @else
                                    <img style="width: 100%;" id="featured-image"
                                        src="{{ asset('images/placeholder.jpg') }}" class="rounded" alt="...">
                                    @endif
                                @endif
                            </div>
                            <input id="upload-featured-image" style="display: none;" type="file"
                                wire:model.defer='featured_image' value="{{ old('featured_image') }}"
                                class="form-control  @error('featured_image') is-invalid @enderror">
                            @error('featured_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary" wire:attr='disabled'>
                                <span wire:target='UpdateFeaturedImage' wire:loading
                                    class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
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
