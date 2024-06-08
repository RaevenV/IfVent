<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IFVENT</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/addResource.css') }}">
    <script>
        function showVideoLink(){
            const selectedType = document.getElementById('type').value;
            const videoLinkContainer = document.getElementById('videoLinkContainer');

            if (selectedType === 'beyond') {
                videoLinkContainer.style.display = 'block';
                const submitBtn = document.getElementById('submit-btn');
                const alertElement = document.getElementById('alert')
                submitBtn.style.marginBottom = '80px';
                if (alertElement) {
                    alertElement.style.marginTop = '220px';
                }
            } else {
                videoLinkContainer.style.display = 'none';
                const submitBtn = document.getElementById('submit-btn');
                submitBtn.style.marginBottom = '60px';
            }
        }
    </script>
</head>
<body>
    <div class="min-h-screen">
        @include('layouts.navigation')
        <div id="addResource-container">
            <div class="form-container">
                <form action="{{ route('addResources.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <div class="form-group">
                        <div class="form-label">Title</div>
                        <input class="input-box" type="text" id="title" name="title" required value="{{ old('title') }}">
                        @if ($errors->has('title'))
                            <div class="error">{{ $errors->first('title') }}</div>
                        @endif
                    </div>

                    <div class="form-group mrg">
                        <div class="form-label">Type</div>
                        <select id="type" name="type" required onchange="showVideoLink()">
                            <option value="" disabled {{ old('type') == '' ? 'selected' : '' }}>Choose type</option>
                            <option value="audio" {{ old('type') == 'audio' ? 'selected' : '' }}>Audio</option>
                            <option value="ebook" {{ old('type') == 'ebook' ? 'selected' : '' }}>E-Book</option>
                            <option value="beyond" {{ old('type') == 'beyond' ? 'selected' : '' }}>Beyond The Book</option>
                        </select>
                        @if ($errors->has('type'))
                            <div class="error">{{ $errors->first('type') }}</div>
                        @endif
                    </div>

                    <div class="form-group mrg">
                        <div class="form-label">Description</div>
                        <textarea id="description" name="description" rows="6" required>{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <div class="error">{{ $errors->first('description') }}</div>
                        @endif
                    </div>

                    <div class="form-group mrg">
                        <div class="form-label">Category</div>
                        <select id="category" name="category_id" required>
                            <option value="" disabled {{ old('category_id') == '' ? 'selected' : '' }}>Choose category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                            <div class="error">{{ $errors->first('category_id') }}</div>
                        @endif
                    </div>

                    <div class="form-group mrg">
                        <div class="form-label">Alt text</div>
                        <input class="input-box" type="text" id="alt" name="alt" required value="{{ old('alt') }}">
                        @if ($errors->has('alt'))
                            <div class="error">{{ $errors->first('alt') }}</div>
                        @endif
                    </div>

                    <div class="form-group mrg">
                        <div class="form-label">File Link</div>
                        <input class="input-box" type="text" id="link" name="link" required value="{{ old('link') }}">
                        @if ($errors->has('link'))
                            <div class="error">{{ $errors->first('link') }}</div>
                        @endif
                    </div>

                    <div class="form-group mrg" id="videoLinkContainer" style="display: none;">
                        <div class="form-label">Video Link</div>
                        <input class="input-box" type="text" id="video_link" name="video_link" value="{{ old('video_link') }}">
                        @if ($errors->has('video_link'))
                        <div class="error">{{ $errors->first('video_link') }}</div>
                        @endif
                    </div>

                    <div class="form-group mrg">
                        <div class="form-label">File</div>
                        <input type="file" id="file" name="file" accept=".mp3, .m4a, .pdf" required>
                        @if ($errors->has('file'))
                            <div class="error">{{ $errors->first('file') }}</div>
                        @endif
                    </div>

                    <button type="submit" id="submit-btn" class="mb-6">Submit</button>
                </form>
            </div>

            @if(session('success'))
                <div id="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

</body>
</html>
