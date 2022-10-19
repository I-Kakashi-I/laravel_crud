<div class="max-w-4xl mx-auto  min-h-screen flex items-center justify-center">
    <div class="dark:bg-gray-800 p-5 rounded-xl bg-white w-full py-12" style="margin-top: -100px">
        <h6 class="block mb-8 text-lg font-medium text-gray-900 dark:text-gray-300 text-center">Edit
            {{$user->hasRole('super_admin')?'Admin':'User'}} Data </h6>
        <form class="w-full" wire:submit.prevent="update" method="POST">
            @csrf
            @method('PUT')
            <x-input_fild wire:model="userData.name" id="name" type="text" name="name" label="Name"
                          placeholder="User name" required/>
            <x-input_fild wire:model="userData.email" id="email" type="email" name="email" label="E-mail"
                          placeholder="user@example.com"/>
            <div class="relative z-0 mb-6 w-full group">
                <label for="password"
                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 right-0 flex items-center px-2">
                        <input class="hidden js-password-toggle" id="toggle" type="checkbox"
                               onclick="showPassword()"/>
                        <label
                            class="bg-gray-300 hover:bg-gray-400 rounded px-2 py-1 text-sm text-gray-600 font-mono cursor-pointer js-password-label"
                            for="toggle">show</label>
                    </div>

                    <input type="password" id="password" name="password"
                           class="js-password @error('password') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full dark:bg-red-100 dark:border-red-400 @enderror  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Password">
                </div>
                @error('password')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <label for="confirm-password"
                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Confirm
                    Password</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 right-0 flex items-center px-2">
                        <input class="hidden js-password-toggle2" id="toggle2" type="checkbox"
                               onclick="showConfirmPassword()"/>
                        <label
                            class="bg-gray-300 hover:bg-gray-400 rounded px-2 py-1 text-sm text-gray-600 font-mono cursor-pointer js-password-label2"
                            for="toggle2">show</label>
                    </div>
                    <input type="password" id="confirm-password" name="password_confirmation"
                           class="js-password2 @error('password') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full dark:bg-red-100 dark:border-red-400 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Re Enter Password">
                </div>
                @error('password_confirmation')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
                @enderror
            </div>

            <x-roles-selector :allRoles="$allRoles" button="submit"/>
            <div class="flex items-center my-4">
                @foreach($allPermissions as $permission)
                    <input wire:model="selectedPermissions" id="permission_{{$permission->id}}"
                           value="{{$permission->name}}" wire:key="{{$permission->id}}" type="checkbox"
                           class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="permission_{{$permission->id}}"
                           class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 mx-2">{{$permission->name}}</label>
                @endforeach
            </div>
            {{--                <button type="submit"--}}
            {{--                        class="text-white bg-blue-700 dark:bg-white dark:focus:ring-grey-200 dark:hover:bg-gray-100 dark:text-black hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 ">--}}
            {{--                    Submit--}}
            {{--                </button>--}}
            <x-jet-button :disabled="$errors->any()" type="submit"
                          class="dark:bg-blue-800 mb-2">Submit</x-jet-button>
        </form>
    </div>
</div>

@push('js')
    <script>
        function showPassword() {
            const passwordToggle = document.querySelector('.js-password-toggle')

            passwordToggle.addEventListener('change', function () {
                const password = document.querySelector('.js-password'),
                    passwordLabel = document.querySelector('.js-password-label')

                if (password.type === 'password') {
                    password.type = 'text'
                    passwordLabel.innerHTML = 'hide'
                } else {
                    password.type = 'password'
                    passwordLabel.innerHTML = 'show'
                }

                password.focus()
            })
        }

        function showConfirmPassword() {
            const passwordToggle = document.querySelector('.js-password-toggle2')

            passwordToggle.addEventListener('change', function () {
                const password = document.querySelector('.js-password2'),
                    passwordLabel = document.querySelector('.js-password-label2')

                if (password.type === 'password') {
                    password.type = 'text'
                    passwordLabel.innerHTML = 'hide'
                } else {
                    password.type = 'password'
                    passwordLabel.innerHTML = 'show'
                }

                password.focus()
            })
        }
    </script>


@endpush




