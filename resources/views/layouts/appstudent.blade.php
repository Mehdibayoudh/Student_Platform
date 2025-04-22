<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboardstudent')</title>

    {{-- Velzon Core Styles --}}
    <link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/js/layout.js') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet">

    {{-- Page Specific Styles --}}
    @yield('styles')
</head>
<body>
<div class="layout-wrapper">
    @include('layouts.partials.topbar')
    {{-- Content Section --}}
    <div class="vertical-overlay"></div>

    @yield('content')
</div>
{{-- Velzon Core Scripts --}}
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/profile.init.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

{{-- Page Specific Scripts --}}
@yield('scripts')

</body>
</html>
