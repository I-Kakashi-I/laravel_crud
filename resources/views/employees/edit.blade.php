<x-app-layout>
    <div class="max-w-4xl mx-auto  min-h-screen flex items-center justify-center">
        <div class="dark:bg-gray-800 p-5 rounded-xl bg-white w-full py-12" style="margin-top: -100px">
            <h6 class="block mb-8 text-lg font-medium text-gray-900 dark:text-gray-300 text-center">Update
                Employee Data</h6>
            <form class="w-full" action="{{route('employee.update',$employee->id)}}" method="POST">
                @csrf
                @method('PUT')
                <x-input_fild id="name" type="text" name="name" value="{{$employee->name}}"
                              placeholder="First Name - Second Name" label="Name" required/>
                <x-input_fild id="email" type="email" name="email" value="{{$employee->email}}"
                              placeholder="name@example.com" label="E-mail" required/>
                <x-input_fild id="number" type="tel" name="number" value="{{$employee->number}}"
                              placeholder="+1234567890" label="Phone Number" required/>
                <x-input_fild id="address" type="text" name="address" value="{{$employee->address}}"
                              placeholder="Street 1 Street 2" label="Address" required/>
                <x-input_fild id="position" type="text" name="position" value="{{$employee->position}}"
                              placeholder="Position" label="Position" required/>

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
                               placeholder="Select date">
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Select
                            Gender </label>
                        <select id="gender" name="gender"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Gender</option>
                            <option value="male" {{(($employee->gender=='male')? 'selected':'')}}>Male</option>
                            <option value="female" {{(($employee->gender=='female')? 'selected':'')}}>Female</option>
                        </select>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 mb-6 w-full group">
                        <label for="branch_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Select
                            Branch </label>
                        <select id="branch_id" name="branch_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Branches</option>
                            @foreach($branches as $branch)
                                <option class="text-black"
                                        value="{{$branch->id}}" {{$branch->id == $employee->branch_id?'selected':'' }} >{{$branch->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <label for="department_id"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Select
                            Department</label>
                        <select id="department_id" name="department_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Departments</option>
                            @foreach($departments as $department)
                                <option class="text-black"
                                        value="{{$department->id}}" {{$department->id == $employee->department_id?'selected':'' }} >{{$department->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex relative z-0 mb-6 w-full group">
                    <div class="flex items-center h-5">
                        <input id="has_license" aria-describedby="helper-checkbox-text" type="checkbox" value="{{0|1}}"
                               name="has_license"
                               class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{$employee->has_license==1?'checked':''}}>
                    </div>
                    <div class="ml-2 text-sm ">
                        <label for="has_license" class="font-medium text-gray-900 dark:text-gray-300">Driver
                            Licence</label>
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
        <script src="https://unpkg.com/flowbite@1.5.3/dist/datepicker.js"></script>
    @endpush
</x-app-layout>








