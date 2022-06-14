<div class="col-lg-2">
    <div class="card position-sticky">
        <ul class="nav flex-column bg-white border-radius-lg p-3">
            <li class="nav-item @if (Request::path() == 'Admin/EditUser/' . $user->slug . '/' . App::getLocale()) active bg-gradient-primary @endif" wire:ignore.self>
                <a class="nav-link text-dark d-flex @if (Request::path() == 'Admin/EditUser/' . $user->slug . '/' . App::getLocale()) active text-white @endif"
                    href="{{ route('AdminEditUser', ['slug' => $user->slug, 'lang' => App::getLocale()]) }}"
                    wire:ignore.self>
                    <i class="fas fa-user-edit me-2"></i>
                    <span class="text-sm">{{ trans('admin.user-profile') }}</span>
                </a>
            </li>
            <li class="nav-item @if (Request::path() == 'Admin/UpdateUser/' . $user->slug . '/Password/' . App::getLocale()) active bg-gradient-primary @endif" wire:ignore.self>
                <a class="nav-link text-dark d-flex @if (Request::path() == 'Admin/UpdateUser/' . $user->slug . '/Password/' . App::getLocale()) active text-white @endif"
                    href="{{ route('AdminUpdateUserPassword', ['slug' => $user->slug, 'lang' => App::getLocale()]) }}"
                    wire:ignore.self>
                    <i class="fas fa-lock me-2"></i>
                    <span class="text-sm">{{ trans('admin.user-password') }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
