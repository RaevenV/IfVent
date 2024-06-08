<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IFVENT</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/btb.css') }}">
</head>
<body>
    <div id="btbView-container">
        <div class="back-container">
            <a id="back-link" href="{{ url()->previous() }}">Back</a>
        </div>

        <div id="btbTitle">{{$beyondTheBook->title}}</div>

        <div class="embed-responsive">
            <iframe class="embed-responsive-item" src="{{ asset($beyondTheBook->file_path) }}" allowfullscreen></iframe>
        </div>
    </div>
</body>
</html>
