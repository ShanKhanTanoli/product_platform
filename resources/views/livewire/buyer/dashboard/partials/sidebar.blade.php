<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 fixed-start  bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('BuyerDashboard', App::getLocale()) }}">
            <span class="ms-1 font-weight-bold text-white">
                {{ Setting::Logo() }}
            </span>
        </a>
    </div>
    <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
            {{ trans('buyer.settings') }}
        </h6>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white @if (Request::path() == 'Buyer/Settings/General/' . App::getLocale() or Request::path() == 'Buyer/Settings/Profile/' . App::getLocale() or Request::path() == 'Buyer/Settings/Currency/' . App::getLocale() or Request::path() == 'Buyer/Settings/Language/' . App::getLocale() or Request::path() == 'Buyer/Settings/Stripe/' . App::getLocale() or Request::path() == 'Buyer/Settings/Password/' . App::getLocale()) active bg-gradient-primary @else '' @endif"
            href="{{ route('BuyerSettings', App::getLocale()) }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-cog"></i>
            </div>
            <span class="nav-link-text ms-1">{{ trans('buyer.settings') }}</span>
        </a>
    </li>
    <hr>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    Logout
                </h6>
            </li>
            <!--Begin::Logout-->
            @livewire('auth.logout')
            <!--Begin::Logout-->
        </ul>
    </div>
</aside>
