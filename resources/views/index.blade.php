<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ifvent</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/splash.css') }}">
</head>
<body>
    <div class="splash-container">
        <div id="greetings-container">
            Welcome Trailblazer!
        </div>

        <div id="prompt-container">
            @if (Route::has('login'))
                @auth
                    <a
                        @if(auth()->user()->usertype === 'admin')
                            href="{{ url('/admin/dashboard') }}"
                        @else
                            href="{{ url('/dashboard') }}"
                        @endif

                        class="link-btn"
                    >
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="link-btn">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="link-btn">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</body>
</html>
