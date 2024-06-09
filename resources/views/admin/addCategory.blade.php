<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IFVENT</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/addCategory.css') }}">
</head>
<body>
    <div class="min-h-screen ">
        @include('layouts.navigation')
        <div id="addCategory-container" class="py-12 flex w-max justify-start">
            <div class="max-w-7xl  space-y-6 form-wrapper">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('Category Information') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600">
                                    {{ __("Create a new category") }}
                                </p>
                            </header>
                            <form method="post" action="{{ route('addCategories.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                                @csrf

                                <div>
                                    <x-input-label for="name" :value="__('Category Title')" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>

                                <div>
                                    <x-input-label for="description" :value="__('Category Description')" />
                                    <x-text-area id="description" name="description" class="mt-1 block w-full" :value="old('description')" required autocomplete="description" />
                                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                                </div>

                                <div class="form-group mrg">
                                    <x-input-label for="file" :value="__('Category Preview Picture')" />
                                    <input type="file" id="file" name="file" accept=".jpg, .png" required>
                                    @if ($errors->has('file'))
                                        <div class="error">{{ $errors->first('file') }}</div>
                                    @endif
                                </div>

                                <div class="file-info">Recommended size : 370x220 (max:50mb)</div>


                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>

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
                        </section>
                    </div>
                </div>

            </div>

        </div>
    </div>
</body>
</html>
