<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Users') }}
    </h2>
</x-slot>

<div class="bg-white shadow-lg mt-5 max-w-8xl p-4 min-h-screen">
    <input wire:model.debounce.1000ms="search" type="text">

    <ul>
        @foreach($users as $user)
           <li> {{$user->name}}   </li>
        @endforeach
    </ul>

</div>
