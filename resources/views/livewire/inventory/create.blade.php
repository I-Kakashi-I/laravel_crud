<x-app-layout>
    <div class="max-w-4xl mx-auto  min-h-screen flex items-center justify-center"   >
        <div class="dark:bg-gray-800 p-5 rounded-xl bg-white w-full py-12" style="margin-top: -100px">
            <h6 class="block mb-8 text-lg font-medium text-gray-900 dark:text-gray-300 text-center">Create
                User </h6>
            <form class="w-full" action="{{route('')}}" method="POST">
                @csrf

            </form>
        </div>
    </div>

</x-app-layout>



