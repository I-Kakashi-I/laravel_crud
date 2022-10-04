<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('profile.show')}}" class="bg-white dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-600 overflow-hidden sm:rounded-lg">
                <div>
                    @if(auth()->user()->is_admin)
                        <h1>Welcome Admin {{auth()->user()->name}}</h1>
                    @else
                        <h1>Welcome User {{auth()->user()->name}}</h1>
                    @endif
                </div>
            </a>
        </div>
    </div>
</x-app-layout>
