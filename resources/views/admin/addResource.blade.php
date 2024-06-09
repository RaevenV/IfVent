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
            <div class="form-container bg-white">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Resource Information') }}
                    </h2>

                    <p class="mb-4 text-sm text-gray-600">
                        {{ __("Create a new resource") }}
                    </p>
                </header>
                <form action="{{ route('addResources.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group short">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus autocomplete="title" />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <div class="form-group mrg short">
                        <x-input-label for="type" :value="__('Type')" />
                        <select id="type" name="type" class="mt-1 block w-full" required onchange="showVideoLink()">
                            <option value="" disabled {{ old('type') == '' ? 'selected' : '' }}>Choose type</option>
                            <option value="audio" {{ old('type') == 'audio' ? 'selected' : '' }}>Audio</option>
                            <option value="ebook" {{ old('type') == 'ebook' ? 'selected' : '' }}>E-Book</option>
                            <option value="beyond" {{ old('type') == 'beyond' ? 'selected' : '' }}>Beyond The Book</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('type')" />
                    </div>

                    <div class="form-group mrg">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-area id="description" name="description" class="mt-1 block w-full" :value="old('description')" rows="6" required autocomplete="description" />
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div class="form-group mrg">
                        <x-input-label for="category_id" :value="__('Category')" />
                        <select id="category_id" name="category_id" class="mt-1 block w-full" required>
                            <option value="" disabled {{ old('category_id') == '' ? 'selected' : '' }}>Choose category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                    </div>

                    <div class="form-group mrg short">
                        <x-input-label for="alt" :value="__('Alt text')" />
                        <x-text-input id="alt" name="alt" type="text" class="mt-1 block w-full" :value="old('alt')" required autocomplete="alt" />
                        <x-input-error class="mt-2" :messages="$errors->get('alt')" />
                    </div>

                    <div class="form-group mrg ">
                        <x-input-label for="link" :value="__('File Link')" />
                        <x-text-input id="link" name="link" type="text" class="mt-1 block w-full" :value="old('link')" required autocomplete="link" />
                        <x-input-error class="mt-2" :messages="$errors->get('link')" />
                    </div>

                    <div class="form-group mrg" id="videoLinkContainer" style="display: none;">
                        <x-input-label for="video_link" :value="__('Video Link')" />
                        <x-text-input id="video_link" name="video_link" type="text" class="mt-1 block w-full" :value="old('video_link')" autocomplete="video_link" />
                        <x-input-error class="mt-2" :messages="$errors->get('video_link')" />
                    </div>

                    <div class="form-group mrg">
                        <x-input-label for="file" :value="__('File')" />
                        <input type="file" id="file" name="file" accept=".mp3, .m4a, .pdf" class="mt-1 block w-full" required>
                        <x-input-error class="mt-2" :messages="$errors->get('file')" />
                    </div>
                    <div class="file-info">e-books & btb => .pdf (max:200mb)</div>
                    <div class="file-info2">audio-books => .mp3, .mp4, .m4a (max:50mb)</div>

                    <div class="flex items-center gap-4">
                        <x-primary-button class="submit-btn">{{ __('Submit') }}</x-primary-button>

                        @if (session('success'))
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600"
                            >{{ session('success') }}</p>
                        @endif
                    </div>
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
