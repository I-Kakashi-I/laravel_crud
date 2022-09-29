@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endpush
@section('content')


    <table class="table" id="example">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Position</th>
            <th scope="col">Date of birth</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Address</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $index=>$employee)
            <tr>
                <th>{{$index +1}}</th>
                <th>{{$employee->name}}</th>
                <th>{{$employee->email}}</th>
                <th>{{$employee->position}}</th>
                <th>{{$employee->birthday}}</th>
                <th>{{$employee->number}}</th>
                <th>{{$employee->address}}</th>
                <th>{{$employee->updated_at->diffForHumans()}}</th>
                {{--TODO--}}
                <th>
                    <a href="{{route('employee.edit',$employee->id)}}" class="btn btn-info btn-sm waves-effect">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{route('employee.show',$employee->id)}}" class="btn btn-warning btn-sm waves-effect">
                        <i class="fas fa-eyes"></i> Show
                    </a>
                    <form action="{{route('employee.destroy',$employee->id)}}" method="POST"
                          style="display:inline-block">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm waves-effect" type="submit">
                            <i class="far fa-trash-alt"></i> Delete
                        </button>
                    </form>
                </th>
            </tr>
        @endforeach

        </tbody>
    </table>












@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endpush
