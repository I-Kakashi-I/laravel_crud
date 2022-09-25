@props(['route'])
<li>
    <a class="active:bg-gray-300 active:text-gray-800 mt-1 py-2 {{request()->routeIs($route)?'bg-gray-300':''}}" href="{{route($route)}}">{{$slot}}</a>
</li>
