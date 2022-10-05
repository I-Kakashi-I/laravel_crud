<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
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
    <style>
        [x-cloak] { display: none !important; }
    </style>
    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased">
<x-jet-banner/>


<x-side-nav>
    <div class="min-h-screen w-full bg-gray-50 dark:bg-gray-800 ">

    @livewire('navigation-menu')


    <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-indigo-500 shadow dark:bg-indigo-700 dark:text-gray-200" >
                <div class="max-w-8xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
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
<script src="{{asset('js/sweetalert.js')}}"></script>
<script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
<x-livewire-alert::flash />

<x-livewire-alert::scripts />

@livewireScripts


<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/popper.js')}}"></script>
@stack('js')

@livewire('livewire-ui-modal')

</body>
</html>
