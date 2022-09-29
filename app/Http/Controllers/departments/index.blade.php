@extends('layouts.app')

@section('content')


    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Discretion</th>
            <th scope="col">Crated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($departments as $index=>$department)
            <tr>
                <th>{{$index +1}}</th>
                <th>{{$department->name}}</th>
                <th>{{$department->dic}}</th>
                <th>{{$department->updated_at->diffForHumans()}}</th>
                {{--TODO--}}
                <th>
                    <a href="{{route('department.edit',$department->id)}}" class="btn btn-info btn-sm waves-effect">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{route('department.show',$department->id)}}" class="btn btn-warning btn-sm waves-effect">
                        <i class="fas fa-eyes"></i> Show
                    </a>
                    <form action="{{route('department.destroy',$department->id)}}" method="POST" style="display:inline-block">
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
