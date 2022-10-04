<x-app-layout>
    <div class="max-w-4xl mx-auto  min-h-screen flex items-center justify-center">
        <div class="dark:bg-gray-800 p-5 rounded-xl bg-white w-full py-12" style="margin-top: -100px">
            <h6 class="block mb-8 text-lg font-medium text-gray-900 dark:text-gray-300 text-center">
                {{$user->is_admin==1?'Admin':'User'}} Data </h6>
            <form class="w-full" action="{{route('users.show',$user->id)}}" method="POST">
                @csrf
                <x-input_fild :value="$user->name" id="name" type="text" name="name" label="Name"
                              placeholder="User name" disabled/>
                <x-input_fild :value="$user->email" id="email" type="email" name="email" label="E-mail"
                              placeholder="user@example.com" disabled/>
                <x-input_fild :value="$user->created_at" id="created_at" type="text" name="created_at"
                              label="E-Joined At" placeholder="" disabled/>
                <x-input_fild :value="$user->updated_at" id="updated_at" type="text" name="updated_at"
                              label="E-Updated At" placeholder="" disabled/>
                <a href="{{route('users.index')}}"
                   class="text-white bg-blue-700 dark:bg-white dark:focus:ring-grey-200 dark:hover:bg-gray-100 dark:text-black hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 ">
                    Back
                </a>
            </form>
        </div>
    </div>


</x-app-layout>



