<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ url('main_page/images/logo_nomads.png') }}">
    <title>@yield('title')</title>
    {{-- Style --}}
    @include('includes.main.style')

</head>

<body>
    {{-- Navbar --}}
    @include('includes.main.navbar-checkout')

    {{-- Content --}}
    @yield('content')
    {{-- Script --}}
    @include('includes.main.script')
</body>

</html>
