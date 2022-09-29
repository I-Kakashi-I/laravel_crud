{{--@extends('layouts.app')--}}
{{--@push('css')--}}
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">--}}
{{--@endpush--}}
{{--@section('content')--}}


{{--    <table class="table" id="example">--}}
{{--        <thead class="thead-dark">--}}
{{--        <tr>--}}
{{--            <th scope="col">#</th>--}}
{{--            <th scope="col">Name</th>--}}
{{--            <th scope="col">E-mail</th>--}}
{{--            <th scope="col">Position</th>--}}
{{--            <th scope="col">Date of birth</th>--}}
{{--            <th scope="col">Phone Number</th>--}}
{{--            <th scope="col">Address</th>--}}
{{--            <th scope="col">Created At</th>--}}
{{--            <th scope="col">Action</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($employees as $index=>$employee)--}}
{{--            <tr>--}}
{{--                <th>{{$index +1}}</th>--}}
{{--                <th>{{$employee->name}}</th>--}}
{{--                <th>{{$employee->email}}</th>--}}
{{--                <th>{{$employee->position}}</th>--}}
{{--                <th>{{$employee->birthday}}</th>--}}
{{--                <th>{{$employee->number}}</th>--}}
{{--                <th>{{$employee->address}}</th>--}}
{{--                <th>{{$employee->updated_at->diffForHumans()}}</th>--}}
{{--                --}}{{--TODO--}}
{{--                <th>--}}
{{--                    <a href="{{route('employee.edit',$employee->id)}}" class="btn btn-info btn-sm waves-effect">--}}
{{--                        <i class="fas fa-edit"></i> Edit--}}
{{--                    </a>--}}
{{--                    <a href="{{route('employee.show',$employee->id)}}" class="btn btn-warning btn-sm waves-effect">--}}
{{--                        <i class="fas fa-eyes"></i> Show--}}
{{--                    </a>--}}
{{--                    <form action="{{route('employee.destroy',$employee->id)}}" method="POST"--}}
{{--                          style="display:inline-block">--}}
{{--                        @csrf @method('DELETE')--}}
{{--                        <button class="btn btn-danger btn-sm waves-effect" type="submit">--}}
{{--                            <i class="far fa-trash-alt"></i> Delete--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                </th>--}}
{{--            </tr>--}}
{{--        @endforeach--}}

{{--        </tbody>--}}
{{--    </table>--}}


{{--@endsection--}}
{{--@push('js')--}}
{{--    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>--}}

{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('#example').DataTable();--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}

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
                        name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Position
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Branch
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
                @foreach($employees as $index=>$employee)

                    <tr class="border-b dark:bg-gray-700 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 bg-white cursor-pointer"
                        onclick="location.href = '{{route('employee.show',[$employee->id])}}'">
                        <th class="p-4">{{$index +1}}</th>
                        <th class="p-4">{{$employee->name}}</th>
                        <th class="p-4">{{$employee->position}}</th>
                        <th class="p-4">{{$employee->branch->name}}</th>

                        <th>{{$employee->updated_at->diffForHumans()}}</th>
                        <th class="p-4">


                            <a href="{{route('employee.edit',$employee->id)}}"
                                class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
  <span
      class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
      Edit
  </span>
                            </a>
                        </th>

                    </tr>


                @endforeach
                </tbody>
            </table>
        </div>


    </div>
</x-app-layout>
