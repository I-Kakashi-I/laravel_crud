@props(['route','icon','title'])
<li class="menu-item">
    @isset($slot)
    <a href="{{$route??'#'}}"><span class="menu-icon"><i class="{{$icon??'ri-question-mark'}}"></i></span><span class="menu-title">{{$title??''}}</span></a>
    @else
    {{$slot}}
    @endif
</li>
