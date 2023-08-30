<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Inventory_App') }}</title>






    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet"> --}}
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

    @livewireStyles


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/tom-select-custom.css', 'resources/css/tom-select.css']) {{-- 'resources/js/tom-select.min.js', --}}


    {{-- <link rel="stylesheet" href="{{asset('resources/css/tom-select.css')}}"> --}}


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

            <div x-cloak :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-gray-100 lg:translate-x-0 lg:static lg:inset-0">
                @include('main.sidebar')
            </div>

            <div class="flex flex-col flex-1 overflow-hidden bg-gray-100">
                @include('main.header')

                <main class="flex-1 overflow-y-auto bg-gray-150 ">
                    <div class="container px-2 py-2 mx-auto">
                        @yield('body')
                    </div>
                </main>
            </div>
        </div>

        <footer class="relative bg-blueGray-200">
            @include('main.footer')
        </footer>
    </div>









    {{-- <script src="{{asset('resources/js/app.js')}}"></script> --}}

    @livewireScripts

    {{-- <script src="{{asset('resources/js/cdn.jsdelivr.net_npm_tom-select@2.2.2_dist_js_tom-select.complete.min.js')}}"></script> --}}

    @stack('scripts')


</body>
</html>
