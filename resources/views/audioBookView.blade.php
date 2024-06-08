<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IFVENT</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/audio.css') }}">
</head>
<body>
    <div id="audioView-container">
        <div class="back-container">
            <a id="back-link" href="{{ url()->previous() }}">Back</a>
        </div>

        <div id="audioTitle">{{$audioBook->title}}</div>

        <div class="audio-wrapper">
            <audio controls class="audio-player">
                <source src="{{ asset($audioBook->file_path) }}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>
    </div>
</body>
</html>
