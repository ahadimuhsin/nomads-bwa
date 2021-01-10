<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ url('main_page/images/logo_nomads.png') }}">
    <title>@yield('title')</title>
    {{-- Style --}}
    @stack('prepend-style')
    @include('includes.main.style')
    @stack('addon-style')

</head>

<body>
    {{-- Navbar --}}
    @include('includes.main.navbar-detail')

    {{-- Content --}}
    @yield('content')

    {{-- Footer --}}
    @include('includes.main.footer')

    {{-- Script --}}
    @stack('prepend-script')
    @include('includes.main.script')
    @stack('addon-script')
</body>

</html>
