<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IfVent</title>
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/adminDashboard.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <div class="min-h-screen dashbg ">
        @if(auth()->user()->usertype === 'admin')
            @include('layouts.navigation')
        @else
            @include('layouts.guestNavigation')
        @endif

        <div id="adminDashboard-container">
            <div id="adminDashboard-wrapper">
                <div id="adminDashboard-left-container">
                    <div class="left-container">
                        <div class="left-container-title">
                            Total Trailblazers
                        </div>
                        <div class="left-container-data">
                            {{ $totalUsers }}
                        </div>
                    </div>
                    <div class="left-container">
                        <div class="left-container-title">
                            Total Resources Completed
                        </div>
                        <div class="left-container-data">
                            {{ $totalCompletedResources }}
                        </div>
                    </div>
                    <div class="left-container">
                        <div class="left-container-title">
                            Total Resources on Progress
                        </div>
                        <div class="left-container-data">
                            {{ $totalInProgressResources }}
                        </div>
                    </div>
                </div>

                <div id="adminDashboard-right-container">
                    <div class="trailblazer-title">Trailblazer Ranking</div>
                    <livewire:UserTable/>
                </div>
            </div>

        </div>

    </div>
    @livewireScripts
</body>
</html>
