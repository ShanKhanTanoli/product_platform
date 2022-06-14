<main class="main-content mt-0 ps">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <!--Begin::Alerts-->
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto ">
                        @include('errors.alerts')
                    </div>
                </div>
                <!--End::Alerts-->
                <div class="row">
                    <!--Begin::Business Details-->
                    <div
                        class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                        <div class="card card-plain">
                            <div class="card-header text-center">
                                <h4 class="font-weight-bolder text-primary">
                                    {{ trans('client-register.business-heading') }}
                                </h4>
                            </div>
                            <div class="card-body p-4">
                                <ul class="list-group">
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                        <strong
                                            class="text-dark">{{ trans('client-register.business-name') }}:</strong>
                                        &nbsp;
                                        {!! $business->name !!}
                                    </li>
                                    <li class="list-group-item border-0 ps-0 text-sm">
                                        <strong
                                            class="text-dark">{{ trans('client-register.business-user-name') }}:</strong>
                                        &nbsp;
                                        {!! $business->user_name !!}
                                    </li>
                                    <li class="list-group-item border-0 ps-0 text-sm">
                                        <strong class="text-dark">Mobile:</strong>
                                        &nbsp; {!! $business->number !!}
                                    </li>
                                    <li class="list-group-item border-0 ps-0 text-sm">
                                        <strong
                                            class="text-dark">{{ trans('client-register.business-email') }}:</strong>
                                        &nbsp; {!! $business->email !!}
                                    </li>
                                    <li class="list-group-item border-0 ps-0 text-sm">
                                        <strong
                                            class="text-dark">{{ trans('client-register.business-address') }}</strong>
                                        <p class="text-sm mt-2">
                                            {!! $business->address !!}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--End::Business Details-->

                    <!--Begin::Client Register-->
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                        <div class="card card-plain">
                            <div class="card-header text-center">
                                <h4 class="font-weight-bolder text-primary">
                                    {{ trans('client-register.register-heading') }}
                                </h4>
                            </div>
                            <div class="card-body">
                                <form role="form" wire:submit.prevent='register()'>
                                    <div class="input-group input-group-outline mb-3">
                                        <input id="name" type="name" wire:model.defer="name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" autocomplete="name" placeholder="{{ trans('client-register.client-name') }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <input id="email" type="email" wire:model.defer="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" autocomplete="email" placeholder="{{ trans('client-register.client-email') }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <input id="password" type="password" wire:model.defer="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            autocomplete="password" placeholder="{{ trans('client-register.client-password') }}">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <input id="password_confirmation" type="password"
                                            wire:model.defer="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" autocomplete="password_confirmation"
                                            placeholder="{{ trans('client-register.client-confirm-password') }}">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">
                                            <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                                {{ trans('client-register.register-btn') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-2 text-sm mx-auto">
                                    <a href="{{ route('login') }}"
                                        class="text-primary text-gradient font-weight-bold">
                                        {{ trans('client-register.have-account') }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--End::Client Register-->
                </div>
            </div>
        </div>
    </section>
</main>
