@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('/css/formStyle.css')}}">
@endpush

@section('content')

    <form action="{{route('department.update',$department->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="container mt-5 mb-5 d-flex justify-content-center">
            <div class="card px-1 py-4">
                <div class="card-body">
                    <h6 class="card-title mb-3">Update Department</h6>

                    <h6 class="information mt-4">Edit Data</h6>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" placeholder="Name" value="{{$department->name}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="dic" placeholder="" value="{{$department->dic}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block confirm-button">Update</button>
                </div>
            </div>
        </div>
    </form>

@endsection
