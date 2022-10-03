<x-app-layout>
    <div class="container mx-auto py-12">

        <div class="overflow-x-auto relative shadow-md sm:rounded-lg py-12">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        #
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Department Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Address
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Created At
                    </th>

                    <th scope="col" class="py-3 px-6">
                        <span class="sr-only">Action</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $index=>$department)

                    <tr class="border-b dark:bg-gray-700 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 bg-white cursor-pointer"
                        onclick="location.href = '{{route('department.show',[$department->id])}}'">
                        <th class="p-4">{{$index +1}}</th>
                        <th class="p-4">{{$department->name}}</th>
                        <th class="p-4">{{$department->address}}</th>
                        <th>{{$department->updated_at->diffForHumans()}}</th>
                        <th class="p-4">
                            <a href="{{route('department.edit',$department->id)}}"
                               class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                                <span
                                    class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                    Edit</span>
                            </a>
                        </th>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    </div>
</x-app-layout>
