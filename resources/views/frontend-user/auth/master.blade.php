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
  

    <!-- Scripts Glide-->


    <!-- Scripts-->
    <script src="/glide/glide.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('head')
</head>

<body class="font-sans bg-gray-100">
   
    <div class="bg-gray-100">
    @yield('body')
    </div>
    
    @yield('script')
    
</body>

</html>