<div class="container mx-auto py-12">
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg py-12">

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <div>
                <label for="search"
                       class="mb-2 text-sm font-medium text-gray-900 sr-only  dark:text-gray-300">Search</label>
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                             stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input wire:model="search" type="text" id="search"
                           class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Search Mockups, Logos...">
                </div>
            </div>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    #
                </th>
                <th scope="col" class="py-3 px-6">
                    Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Email
                </th>
                <th scope="col" class="py-3 px-6">
                    Active
                </th>
                <th scope="col" class="py-3 px-6">
                    Joined At
                </th>

                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">Action</span>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $index=>$user)

                <tr class="@if($index%2==1 ) bg-white border-b dark:bg-gray-900 dark:border-gray-700 @else dark:bg-gray-700  @endif border-b  dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 bg-white cursor-pointer"
                    onclick="location.href = '{{route('users.show',[$user->id])}}'">
                    <th class="p-4">{{$index+1}}</th>
                    <th class="p-4">{{$user->name}}</th>
                    <th class="p-4">{{$user->email}}</th>
                    <th>{{$user->updated_at->diffForHumans()}}</th>
                    <th class="p-4">


                        <a href="{{route('users.edit',$user->id)}}"
                           class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                            <span
                                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">Edit</span>
                        </a>
                    </th>
                    <th class="p-4">
                        <form action="{{route('users.destroy',$user->id)}}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="alert()"
                                    class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-600 to-orange-500 group-hover:from-rea-600 group-hover:to-orange-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                              <span
                                  class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                 Delete
                              </span>
                            </button>
                        </form>

                    </th>

                </tr>


            @endforeach
            </tbody>
        </table>
    </div>

    {{ $users->links() }}
</div>
@push('js')
    <script>
        function alert() {
            confirm("Do you want to delete this index?")
        }
    </script>
@endpush

