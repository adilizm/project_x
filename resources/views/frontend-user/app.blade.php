<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Konly') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app-tailwind.css') }}">
        <!-- Required Core Stylesheet -->
        <link rel="stylesheet" href="/glide/css/glide.core.min.css">
        <!-- Optional Theme Stylesheet -->
        {{-- <link rel="stylesheet" href="/glide/css/glide.theme.min.css"> --}}

        <!-- Scripts Glide-->
       
        <script src="/glide/glide.min.js"></script>
        <!-- Scripts-->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
    </head>
    <body class="font-sans antialiased">
        @include('frontend-user.header')
       <div class="flex flex-col  transition-colors duration-150 bg-gray-100" style="min-height:50vh">
           @yield('home')
       </div>
        @include('frontend-user.footer')
    </body>
</html>
