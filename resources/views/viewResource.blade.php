<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IFVENT</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/viewResource.css') }}">

</head>
<body>
    <div class="min-h-screen">
        @if(auth()->user()->usertype === 'admin')
            @include('layouts.navigation')
        @else
            @include('layouts.guestNavigation')
        @endif
        <div id="viewResource-container" class="container">

            @foreach($categories as $category)

                <div class="title">{{ $category->name }}</div>

                <div class="subtitle">E-books</div>
                <table class="table table-bordered ebook rounded-3">
                    <thead>
                        <tr>
                            <th class="th-title">title</th>
                            <th class="th-created">created at</th>
                            <th class="th-link">link</th>
                            <th class="th-view">preview</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category->ebooks as $ebook)
                            <tr>
                                <td >{{ $ebook->title }}</td>
                                <td class="createdAt" >{{ $ebook->created_at }}</td>
                                <td class="link-table-box"><a class="link-table" href="{{ $ebook->link }}" target="_blank">{{ $ebook->link }}</a></td>
                                <td class="th-view"><a href="{{ route('ebook.view', ['id' => $ebook->id]) }}" class="btn btn-primary">view</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="subtitle">Audio Books</div>
                <table class="table table-bordered  audio">
                    <thead>
                        <tr>
                            <th class="th-title">title</th>
                            <th class="th-created">created at</th>
                            <th class="th-link">link</th>
                            <th class="th-view">preview</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category->audioBooks as $audioBook)
                            <tr>
                                <td>{{ $audioBook->title }}</td>
                                <td class="createdAt">{{ $audioBook->created_at }}</td>
                                <td class="link-table-box"><a class="link-table" href="{{ $audioBook->link }}" target="_blank">{{ $audioBook->link }}</a></td>
                                <td class="th-view"><a href="{{ route('audioBook.view', ['id' => $audioBook->id]) }}" class="btn btn-primary">view</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


                <div class="subtitle">Beyond The Books</div>
                <table class="table table-bordered beyond">
                    <thead>
                        <tr>
                            <th class="th-title-btb">title</th>
                            <th class="th-created-btb">created at</th>
                            <th class="th-link-btb">link</th>
                            <th class="th-link-btb">video link</th>
                            <th class="th-view-btb">preview</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category->beyondTheBooks as $beyondTheBook)
                            <tr>
                                <td>{{ $beyondTheBook->title }}</td>
                                <td class="createdAt">{{ $beyondTheBook->created_at }}</td>
                                <td class="link-table-box"><a class="link-table" href="{{ $beyondTheBook->link }}" target="_blank">{{ $beyondTheBook->link }}</a></td>
                                <td class="link-table-box"><a class="link-table" href="{{ $beyondTheBook->video_link }}" target="_blank">{{ $beyondTheBook->video_link }}</a></td>
                                <td class="th-view"><a href="{{route('beyondTheBook.view', ['id' => $beyondTheBook->id])}}" class="btn btn-primary">view</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


