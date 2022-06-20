<div class="container-fluid my-3 py-3">
    <div class="row mb-5">
        <!--Begin::Sidebar-->
        @include(
            'livewire.admin.dashboard.clients.partials.tab-menu'
        )
        <!--Begin::Sidebar-->
        <div class="col-lg-10 mt-lg-0 mt-4">
            <!--Begin::Alerts-->
            @include('errors.alerts')
            <!--End::Alerts-->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">
                                    {{ trans('admin.update-client-profile') }}
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container">
                                <form wire:submit.prevent='Update'>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static my-3">
                                                <label for="name">{{ trans('admin.client-name') }}</label>
                                                <input type="text" wire:model.defer='name' value="{{ old('name') }}"
                                                    class="form-control  @error('name') is-invalid @enderror"
                                                    placeholder="{{ trans('admin.client-name') }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static my-3">
                                                <label for="user_name">{{ trans('admin.client-username') }}</label>
                                                <input type="text" wire:model.defer='user_name'
                                                    value="{{ old('user_name') }}"
                                                    class="form-control  @error('user_name') is-invalid @enderror"
                                                    placeholder="{{ trans('admin.client-username') }}">
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
                                                <label for="number">{{ trans('admin.client-number') }}</label>
                                                <input type="text" wire:model.defer='number'
                                                    value="{{ old('number') }}"
                                                    class="form-control  @error('number') is-invalid @enderror"
                                                    placeholder="{{ trans('admin.client-number') }}">
                                                @error('number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static my-3">
                                                <label for="email">{{ trans('admin.client-email') }}</label>
                                                <input type="text" wire:model.defer='email'
                                                    value="{{ old('email') }}"
                                                    class="form-control  @error('email') is-invalid @enderror"
                                                    placeholder="{{ trans('admin.client-email') }}">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-group input-group-static my-3">
                                                <label
                                                    for="parent_business_id">{{ trans('admin.client-joined-business') }}</label>
                                                <select wire:model.defer='parent_business_id'
                                                    class="form-control  @error('parent_business_id') is-invalid @enderror">
                                                    <option value="">
                                                        {{ trans('admin.client-joined-business') }}</option>
                                                    @forelse (Business::Latest()->get() as $business)
                                                        <option value="{{ $business->id }}">
                                                            {{ $business->name }}
                                                            -
                                                            {{ $business->email }}
                                                        </option>
                                                    @empty
                                                        <option value=""></option>
                                                    @endforelse
                                                </select>
                                                @error('parent_business_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" wire:attr='disabled'>
                                                <span wire:loading class="spinner-border spinner-border-sm"
                                                    role="status" aria-hidden="true">
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
    </div>
</div>
