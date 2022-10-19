<x-app-layout>
    <div class="max-w-4xl mx-auto  min-h-screen flex items-center justify-center">
        @can('view employees')
            <div class="dark:bg-gray-800 p-5 rounded-xl bg-white w-full py-12" style="margin-top: -100px">
                <h6 class="block mb-8 text-lg font-medium text-gray-900 dark:text-gray-300 text-center">View
                    Employee Data</h6>

                <x-input_fild id="name" name="name" value="{{$employee->name}}" type="text" placeholder="Employee Name"
                              label="Name" disabled/>
                <x-input_fild id="email" name="email" value="{{$employee->email}}" type="email" placeholder=""
                              label="E-mail" disabled/>
                <x-input_fild id="number" name="number" value="{{$employee->number}}" type="tel"
                              placeholder="+1234567890"
                              label="Phone Number" disabled/>
                <x-input_fild id="address" name="address" value="{{$employee->address}}" type="text" placeholder=""
                              label="Address" disabled/>
                <x-input_fild id="position" name="position" value="{{$employee->position}}" type="text" placeholder=""
                              label="Position" disabled/>

                <div class="grid md:grid-cols-2 md:gap-6">

                    <div class="relative">
                        <label for="birthday" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date
                            Of Birth</label>
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input datepicker id="birthday" type="text" name="birthday" value="{{$employee->birthday}}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Select date" disabled>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Select
                            Gender </label>
                        <select disabled id="gender" name="gender"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Gender</option>
                            <option value="male" {{(($employee->gender=='male')? 'selected':'')}} disabled>Male</option>
                            <option value="female" {{(($employee->gender=='female')? 'selected':'')}} disabled>Female
                            </option>
                        </select>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 mb-6 w-full group">
                        <label for="branch_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Select Branch </label>
                        <input id="branch_id" name="branch_id" value="{{$employee->branch->name}}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               disabled>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <label for="department_id"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Select
                            Department</label>
                        <input id="department_id" name="department_id" value="{{$employee->department->name}}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               disabled>
                    </div>
                </div>
                <div class="flex relative z-0 mb-6 w-full group">
                    <div class="flex items-center h-5">
                        <input disabled id="has_license" aria-describedby="helper-checkbox-text" type="checkbox"
                               value="{{$employee->has_licence}}"
                               name="has_license"
                               class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{$employee->has_license==true?'checked':''}}>
                    </div>
                    <div class="ml-2 text-sm ">
                        <label for="has_license" class="font-medium text-gray-900 dark:text-gray-300">Driver
                            Licence</label>

                    </div>
                </div>
            </div>
        @endcan
    </div>


    @push('js')
        <script src="https://unpkg.com/flowbite@1.5.3/dist/datepicker.js"></script>
    @endpush

</x-app-layout>




