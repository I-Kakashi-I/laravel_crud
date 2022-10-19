<x-app-layout>
    @can('create departments')
    <div class="max-w-4xl mx-auto  min-h-screen flex items-center justify-center">
        <div class="dark:bg-gray-800 p-5 rounded-xl bg-white w-full py-12" style="margin-top: -100px">
            <h6 class="block mb-8 text-lg font-medium text-gray-900 dark:text-gray-300 text-center">Create
                Department </h6>

                <form class="w-full" action="{{route('department.store')}}" method="POST">
                    @csrf
                    <x-input_fild id="name" label="Name" placeholder="Name" value="{{old('name')}}" type="text"
                                  name="name" required/>
                    <x-input_fild id="address" label="Address" placeholder="Street1, Street2" value="{{old('address')}}"
                                  type="text" name="address" required/>
                    <button type="submit"
                            class="text-white bg-blue-700 dark:bg-white dark:focus:ring-grey-200 dark:hover:bg-gray-100 dark:text-black hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 ">
                        Submit
                    </button>
                </form>

        </div>
    </div>
    @endcan
</x-app-layout>


