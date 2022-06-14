<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('dashboard/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('dashboard/img/favicon.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ Request::path() }}
    </title>
    <!-- Head Scripts -->
    @yield('headscripts')
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('dashboard/css/material-dashboard.css?v=3.0.1') }}" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @livewireStyles
</head>

<body class="g-sidenav-show  bg-gray-200">

    @if ($user = Auth::user())

        @if ($user->role == 'admin')
            <!--Begin::Sidebar-->
            @include('livewire.admin.dashboard.partials.sidebar')
            <!--Begin::Sidebar-->
        @endif

        @if ($user->role == 'buyer')
            <!--Begin::Sidebar-->
            @include('livewire.buyer.dashboard.partials.sidebar')
            <!--Begin::Sidebar-->
        @endif

        @if ($user->role == 'seller')
            <!--Begin::Sidebar-->
            @include('livewire.seller.dashboard.partials.sidebar')
            <!--Begin::Sidebar-->
        @endif

    @endif

    <!--Begin::Main-->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        @if ($user = Auth::user())

            @if ($user->role == 'admin')
                <!--Begin::Top-Bar-->
                @livewire('admin.dashboard.partials.top-bar')
                <!--Begin::Top-Bar-->
            @endif

            @if ($user->role == 'buyer')
                <!--Begin::Top-Bar-->
                @livewire('buyer.dashboard.partials.top-bar')
                <!--Begin::Top-Bar-->
            @endif

            @if ($user->role == 'seller')
                <!--Begin::Top-Bar-->
                @livewire('seller.dashboard.partials.top-bar')
                <!--Begin::Top-Bar-->
            @endif

        @endif

        <!--Begin::Section-->
        @yield('content')
        <!--Begin::Section-->

    </main>
    <!--End::Main-->

    <!--   Core JS Files   -->
    <script src="{{ asset('dashboard/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    @livewireScripts

    @yield('scripts')
</body>

</html>
