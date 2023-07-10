<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>


    {{-- <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">

    <script src="{{ mix('js/main.js', 'assets/build') }}"></script> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    {{-- <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

    @livewireStyles


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>






    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>


    <div class="h-screen bg-gray-200 font-roboto">
        <div x-data="{ sidebarOpen: false }"class="flex">
            <!-- Mobile Navigation Toggle Button -->
            <div class="static justify-center h-screen ">
                @include('main.dropdown')
            </div>

            <!-- Sidebar -->
            {{-- <div x-cloak :class="sidebarOpen ? 'block' : 'hidden'" @click.away="sidebarOpen = false" class="fixed inset-0 z-20 transition-opacity">

            </div> --}}

            <div x-cloak :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-white lg:translate-x-0 lg:static lg:inset-0">
                @include('main.sidebar')
            </div>

            <div class="flex flex-col flex-1 overflow-hidden">
                @include('main.header')

                <main class="flex-1 overflow-y-auto bg-gray-50 ">
                    <div class="container px-2 py-2 mx-auto">
                        {{-- Conditional rendering for the Livewire component --}}
                        @if (isset($showItRecords) && $showItRecords)
                            @livewire('it-records')
                        @endif

                        @yield('body')
                    </div>
                </main>
            </div>
        </div>

        <footer class="relative pt-8 bg-blueGray-200">
            @include('main.footer')
        </footer>
    </div>


    {{-- <script src="{{asset('resources/js/app.js')}}"></script> --}}

    @livewireScripts

    {{-- <script src="{{asset('resources/js/app.js')}}"></script> --}}


</body>
</html>
