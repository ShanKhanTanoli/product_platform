<div class="col-lg-3">
    <div class="card position-sticky">
        <ul class="nav flex-column bg-white border-radius-lg p-3">
            <li wire:ignore.self
                class="nav-item @if (Request::path() == 'Guest/Settings/Profile/' . App::getLocale()) active bg-gradient-primary @else @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Guest/Settings/Profile/' . App::getLocale()) active text-white @else @endif"
                    href="{{ route('GuestEditProfile', App::getLocale()) }}">
                    <i class="fas fa-user-edit me-2"></i>
                    <span class="text-sm">{{ trans('guest.profile') }}</span>
                </a>
            </li>
            <li wire:ignore.self
                class="nav-item @if (Request::path() == 'Guest/Settings/Password/' . App::getLocale()) active bg-gradient-primary @else @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Guest/Settings/Password/' . App::getLocale()) active text-white @else @endif"
                    href="{{ route('GuestEditPassword', App::getLocale()) }}">
                    <i class="fas fa-lock me-2"></i>
                    <span class="text-sm">{{ trans('guest.password') }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
