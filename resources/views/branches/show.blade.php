<x-app-layout>
    <div class="max-w-4xl mx-auto  min-h-screen flex items-center justify-center">
        <div class="dark:bg-gray-800 p-5 rounded-xl bg-white w-full py-12" style="margin-top: -100px">
            <h6 class="block mb-8 text-lg font-medium text-gray-900 dark:text-gray-300 text-center">
                Branch Data</h6>
            <form class="w-full" action="{{route('branches.show',$branch->id)}}" method="POST">
                @csrf
                <x-input_fild id="name" type="text" placeholder="Branch Name" name="name" label="Name"
                              value="{{$branch->name}}" disabled/>
                <x-input_fild id="address" type="text" placeholder="Street1, Street2" name="address" label="Address"
                              value="{{$branch->address}}" disabled  />
                <a href="{{route('branches.index')}}"
                   class="text-white bg-blue-700 dark:bg-white dark:focus:ring-grey-200 dark:hover:bg-gray-100 dark:text-black hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 ">
                    Back
                </a>
            </form>
        </div>
    </div>


</x-app-layout>



