<div class="container-fluid">
    @include('errors.alerts')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            {{ trans('admin.add-seller') }}
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container">
                        <form wire:submit.prevent='Add'>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="name">{{ trans('admin.seller-name') }}</label>
                                        <input type="text" wire:model.defer='name' value="{{ old('name') }}"
                                            class="form-control  @error('name') is-invalid @enderror"
                                            placeholder="{{ trans('admin.seller-name') }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="name">{{ trans('admin.seller-username') }}</label>
                                        <input type="text" wire:model.defer='user_name' value="{{ old('user_name') }}"
                                            class="form-control  @error('user_name') is-invalid @enderror"
                                            placeholder="{{ trans('admin.seller-username') }}">
                                        @error('user_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="name">{{ trans('admin.seller-number') }}</label>
                                        <input type="text" wire:model.defer='number' value="{{ old('number') }}"
                                            class="form-control  @error('number') is-invalid @enderror"
                                            placeholder="{{ trans('admin.seller-number') }}">
                                        @error('number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="name">{{ trans('admin.seller-email') }}</label>
                                        <input type="text" wire:model.defer='email' value="{{ old('email') }}"
                                            class="form-control  @error('email') is-invalid @enderror"
                                            placeholder="{{ trans('admin.seller-email') }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="name">{{ trans('admin.seller-password') }}</label>
                                        <input type="password" wire:model.defer='password'
                                            value="{{ old('password') }}"
                                            class="form-control  @error('password') is-invalid @enderror"
                                            placeholder="{{ trans('admin.seller-password') }}">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="name">{{ trans('admin.seller-confirm-password') }}</label>
                                        <input type="password" wire:model.defer='password_confirmation'
                                            value="{{ old('password_confirmation') }}"
                                            class="form-control  @error('password_confirmation') is-invalid @enderror"
                                            placeholder="{{ trans('admin.seller-confirm-password') }}">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" wire:attr='disabled'>
                                        <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true">
                                        </span>
                                        {{ trans('admin.save-changes') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
