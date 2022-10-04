<x-app-layout>
    <div class="max-w-4xl mx-auto  min-h-screen flex items-center justify-center">
        <div class="dark:bg-gray-800 p-5 rounded-xl bg-white w-full py-12" style="margin-top: -100px">
            <h6 class="block mb-8 text-lg font-medium text-gray-900 dark:text-gray-300 text-center">Create
                User </h6>
            <form class="w-full" action="{{route('users.store')}}" method="POST">
                @csrf
                <x-input_fild id="name" type="text" name="name" label="Name" placeholder="User Name"
                              value="{{old('name')}}" required/>
                <x-input_fild id="email" type="email" name="email" label="E-mail" placeholder="User@example.com"
                              value="{{old('email')}}" required/>
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
                               class="js-password bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Password" required>
                    </div>
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
                               class="js-password2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Re Enter Password" required>
                    </div>
                </div>
                <div class="flex relative z-0 mb-6 w-full group">
                    <div class="flex items-center h-5">
                        <input id="is_admin" aria-describedby="helper-checkbox-text" type="checkbox"
                               value="{{old('is_admin')?old('is_admin')[0]:true}}"
                               name="is_admin[]"
                               class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    </div>
                    <div class="ml-2 text-sm ">
                        <label for="is_admin" class="font-medium text-gray-900 dark:text-gray-300">
                            Admin</label>

                    </div>
                </div>

                <button type="submit"
                        class="text-white bg-blue-700 dark:bg-white dark:focus:ring-grey-200 dark:hover:bg-gray-100 dark:text-black hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 ">
                    Submit
                </button>
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

</x-app-layout>


