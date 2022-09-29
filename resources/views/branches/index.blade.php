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
        @foreach($branches as $index=>$branch)
            <tr>
                <th>{{$index +1}}</th>
                <th>{{$branch->name}}</th>
                <th>{{$branch->dic}}</th>
                <th>{{$branch->updated_at->diffForHumans()}}</th>
                {{--TODO--}}
                <th>
                    <a href="{{route('branches.edit',$branch->id)}}" class="btn btn-info btn-sm waves-effect">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{route('branches.show',$branch->id)}}" class="btn btn-warning btn-sm waves-effect">
                        <i class="fas fa-eyes"></i> Show
                    </a>
                    <form action="{{route('branches.destroy',$branch->id)}}" method="POST" style="display:inline-block">
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
