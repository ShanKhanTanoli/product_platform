<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <nav
                class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid ps-2 pe-0">
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 "
                        href="{{ route('main', App::getLocale()) }}">
                        {{ Setting::Logo() }}
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav mx-auto">
                            @if (Request::path() != 'login')
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="{{ route('login', App::getLocale()) }}">
                                        <i class="fas fa-sign-in-alt opacity-6 text-dark me-1"></i>
                                        {{ trans('login.heading') }}
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user())
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="{{ route('login', App::getLocale()) }}">
                                        <i class="fas fa-tachometer-alt opacity-6 text-dark me-1"></i>
                                        {{ trans('login.dashboard') }}
                                    </a>
                                </li>
                            @endif
                            @if (Language::count() > 0)
                                <li class="nav-item dropdown dropdown-hover mx-2">
                                    <a role="button"
                                        class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                                        id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-language opacity-6 text-dark me-1"></i>
                                        {{ trans('login.languages') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3"
                                        aria-labelledby="dropdownMenuBlocks">
                                        <div class="d-none d-lg-block">
                                            <ul class="list-group">
                                                @foreach ($language = Language::all() as $language)
                                                    <li class="nav-item dropdown dropdown-hover dropdown-subitem list-group-item border-0 p-0">
                                                        <button wire:click="ChangeLanguage('{{ $language->slug }}')"
                                                            class="dropdown-item border-radius-md mb-2">
                                                            <div class="d-flex align-items-center text-dark">
                                                                {{ strtoupper($language->name) }} -
                                                                {{ $language->description }}
                                                            </div>
                                                        </button>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>
