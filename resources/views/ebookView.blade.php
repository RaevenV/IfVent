<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IFVENT</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/ebook.css') }}">
</head>
<body>
    <div id="ebookView-container">
        <div class="back-container">
            <a id="back-link" href="{{ url()->previous() }}">Back</a>
        </div>


        <div class="embed-responsive">
            <iframe class="embed-responsive-item" src="{{ asset($ebook->file_path) }}" allowfullscreen></iframe>
        </div>
    </div>
</body>
</html>
