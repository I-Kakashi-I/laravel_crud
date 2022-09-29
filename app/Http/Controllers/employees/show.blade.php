@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('/css/formStyle.css')}}">
@endpush

@section('content')

        <div class="container mt-5 mb-5 d-flex justify-content-center">
            <div class="card px-1 py-4">
                <div class="card-body">
                    <h6 class="card-title mb-3">Show Department</h6>

                    <h6 class="information mt-4">View Data</h6>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" placeholder="Name" value="{{$employee->name}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="E-mail" value="{{$employee->email}}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input class="form-control" type="text" name="number" placeholder="Number" value="{{$employee->number}}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input class="form-control" type="text" name="position" placeholder="Position" value="{{$employee->position}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input class="form-control" type="date" name="birthday" placeholder="Name" value="{{$employee->birthday}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="addr" placeholder="Address" value="{{$employee->address}}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
