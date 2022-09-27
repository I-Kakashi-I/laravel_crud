<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{asset('css/nav.css')}}">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />


{{--        <div class="drawer drawer-mobile">--}}
{{--            <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />--}}
{{--            <div class="drawer-content flex flex-col items-center justify-center bg-gray-100">--}}
{{--                <!-- Page content here -->--}}
{{--                <div class="min-h-screen w-full">--}}
{{--                @livewire('navigation-menu')--}}

{{--                <!-- Page Heading -->--}}
{{--                    @if (isset($header))--}}
{{--                        <header class="bg-white shadow">--}}
{{--                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                                {{ $header }}--}}
{{--                            </div>--}}
{{--                        </header>--}}
{{--                @endif--}}

{{--                <!-- Page Content -->--}}
{{--                    <main>--}}
{{--                        {{ $slot }}--}}
{{--                    </main>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="drawer-side">--}}
{{--                <label for="my-drawer-2" class="drawer-overlay"></label>--}}

{{--                <ul class="menu p-4 overflow-y-auto w-60 bg-base-100 text-base-content text-sm">--}}
{{--                    <li class="flex justify-center items-center">--}}
{{--                        <a href="{{route('dashboard')}}" class="active:bg-blue-100" style="width: 80%" > <img class="p-2 active:bg-blue-100" src="{{asset('images/logoo.png')}}" alt=""></a>--}}
{{--                    </li>--}}
{{--                    <!-- Sidebar content here -->--}}


{{--                    <x-side-nav-item :route="'dashboard'">{{__('Dashboard')}}</x-side-nav-item>--}}
{{--                    <x-side-nav-item :route="'users'">{{__('Users')}}</x-side-nav-item>--}}
{{--                </ul>--}}

{{--            </div>--}}
{{--        </div>--}}


        <x-side-nav>
            <div class="min-h-screen w-full bg-gray-50">
            @livewire('navigation-menu')

            <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
            @endif

            <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </x-side-nav>


        @stack('modals')

        @livewireScripts


        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/popper.js')}}"></script>
    </body>
</html>
