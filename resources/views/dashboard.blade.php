<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IfVent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="min-h-screen dashbg">
        @if(auth()->user()->usertype === 'admin')
            @include('layouts.navigation')
        @else
            @include('layouts.guestNavigation')
        @endif

        <div id="guestDash-container ">
            <div id="categories-check-container">
                <div id="categories-check-wrapper">
                    Check out our resources!
                </div>
                <div id="categories-check-desc">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Et deserunt quos vitae voluptatum magni earum accusamus officiis mollitia sunt tempore placeat rerum dolor vero quo amet ad, corporis saepe nobis!
                </div>
            </div>

            <div class="category-container">
                @foreach($categories as $category)
                    <div class="category-card">
                        <img class="category-img" src="{{ asset($category->file_path) }}" alt="">
                        <div class="category-description-container">
                            <div class="category-name">
                                {{$category->name}}
                            </div>
                            <div class="category-description">
                                {{-- {{$category->description}} --}}
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis eveniet magni, incidunt eius, perspiciatis sed necessitatibus ea optio est inventore, itaque culpa voluptatem rerum? Nemo quod dolores non earum fugit.
                            </div>
                            <a href="{{ route('categories.show', $category->id) }}" class="btn category-btn">explore</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
