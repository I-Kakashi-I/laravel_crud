@props(['id','type','name','label','value','placeholder'])
<div class="mb-6">
    <div class="relative z-0 w-full group">
        <label :for="{{$id}}"
               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$label}}</label>
        <input type="{{$type}}" id="{{$id}}" name="{{$name}}" value="{{$value}}"
               class="@error($name) bg-red-50 border border-red-500 text-red-900 dark:text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full dark:bg-red-100 dark:border-red-400 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="{{$placeholder}}" {!! $attributes !!}>
    </div>
    @error($name)
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
    @enderror

</div>

