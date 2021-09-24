<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Konly') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app-tailwind.css') }}">
    <!-- Required Core Stylesheet -->
    <link rel="stylesheet" href="/glide/css/glide.core.min.css">
    <!-- Optional Theme Stylesheet -->
    <link rel="stylesheet" href="/glide/css/glide.theme.min.css">

    <!-- Scripts Glide-->


    <!-- Scripts-->
    <script src="/glide/glide.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('head_section')
</head>

<body class="font-sans bg-gray-100">
    @include('frontend-user.header')
    <div class="container mx-auto bg-gray-100" style="min-height:50vh">
        @yield('content_section')
    </div>
    @yield('script_section')
    @include('frontend-user.footer')
</body>

</html>