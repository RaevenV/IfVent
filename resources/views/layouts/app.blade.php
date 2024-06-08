<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>IFVENT</title>

        <!-- Fonts -->

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen dashbg ">
            @if(auth()->user()->usertype === 'admin')
                @include('layouts.navigation')
            @else
                @include('layouts.guestNavigation')
            @endif

            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
