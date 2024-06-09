<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IfVent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/viewCategory.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="min-h-screen dashbg">
        @if(auth()->user()->usertype === 'admin')
            @include('layouts.navigation')
        @else
            @include('layouts.guestNavigation')
        @endif

        <div id="viewCategory-container">
            <div id="category-title">
                <div id="category-title-text">
                    {{$category->name}}
                </div>
                <div id="category-subtitle">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita aliquam natus enim hic dolore possimus ratione eos, omnis sapiente. Officia, eum incidunt. Nam neque error adipisci voluptate accusantium officia voluptatem.
                </div>
            </div>

            <div id="resourceType-container">
                <button class="resource-btn" onclick="filterResources('ebooks')">E-book</button>
                <button class="resource-btn" onclick="filterResources('audiobooks')">Audio Book</button>
                <button class="resource-btn" onclick="filterResources('beyondTheBooks')">Beyond the Book</button>
            </div>

            <div id="resource-container">
                <div class="resource-list" id="ebooks">
                    @foreach ($ebooks as $ebook)
                        <div class="resource-card">
                            <div class="resource-card-description-container">
                                <div class="resource-title">{{$ebook->title}}</div>
                                <div class="resource-description">{{$ebook->description}}</div>
                            </div>
                            <div class="complete-btn-container">
                                <a class="view-btn" href="{{ route('track.progress', ['resource_id' => $ebook->id, 'resource_type' => 'ebook']) }}" onclick="event.preventDefault(); location.href='{{ route('track.progress', ['resource_id' => $ebook->id, 'resource_type' => 'ebook']) }}';">view</a>
                                <a class="complete-btn" href="{{ route('complete.resource', ['resource_id' => $ebook->id, 'resource_type' => 'ebook']) }}"> complete </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="resource-list" id="audiobooks">
                    @foreach ($audioBooks as $audioBook)
                        <div class="resource-card">
                            <div class="resource-card-description-container">
                                <div class="resource-title">{{$audioBook->title}}</div>
                                <div class="resource-description">{{$audioBook->description}}</div>
                            </div>
                            <div class="complete-btn-container">
                                <a class="view-btn" href="{{ route('track.progress', ['resource_id' => $audioBook->id, 'resource_type' => 'audiobook']) }}" onclick="event.preventDefault(); location.href='{{ route('track.progress', ['resource_id' => $audioBook->id, 'resource_type' => 'audiobook']) }}';">view</a>
                                <a class="complete-btn" href="{{ route('complete.resource', ['resource_id' => $audioBook->id, 'resource_type' => 'audiobook']) }}">complete</a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="resource-list" id="beyondTheBooks">
                    @foreach ($beyondTheBooks as $beyondTheBook)
                        <div class="resource-card">
                            <div class="resource-card-description-container">
                                <div class="resource-title">{{$beyondTheBook->title}}</div>
                                <div class="resource-description">{{$beyondTheBook->description}}</div>
                            </div>
                            <div class="complete-btn-container">
                                <a class="view-btn" href="{{ route('track.progress', ['resource_id' => $beyondTheBook->id, 'resource_type' => 'beyondTheBook']) }}" onclick="event.preventDefault(); location.href='{{ route('track.progress', ['resource_id' => $beyondTheBook->id, 'resource_type' => 'beyondTheBook']) }}';">view</a>
                                <a class="complete-btn" href="{{ route('complete.resource', ['resource_id' => $beyondTheBook->id, 'resource_type' => 'beyondTheBook']) }}"> complete</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        let activeFilter = null;

        function filterResources(type) {
            let allLists = document.querySelectorAll('.resource-list');
            let allButtons = document.querySelectorAll('.resource-btn');

            if (activeFilter === type) {
                activeFilter = null;
                allLists.forEach(list => list.style.display = 'block');
                allButtons.forEach(button => button.classList.remove('active'));
            } else {
                activeFilter = type;
                allButtons.forEach(button => {
                    if (button.textContent.toLowerCase().replace(' ', '') === type) {
                        button.classList.add('active');
                    } else {
                        button.classList.remove('active');
                    }
                });

                allLists.forEach(list => {
                    if (type === list.id) {
                        list.style.display = 'block';
                    } else {
                        list.style.display = 'none';
                    }
                });
            }
        }


        document.addEventListener('DOMContentLoaded', () => {
            let allLists = document.querySelectorAll('.resource-list');
            allLists.forEach(list => list.style.display = 'block');
        });
    </script>
</body>
</html>
