<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.partials.head')
<body>

@include('layouts.partials.nav')

@yield('content')

<script src="{{ mix('js/app.js') }}"></script>

@yield('custom-js')
</body>
</html>
