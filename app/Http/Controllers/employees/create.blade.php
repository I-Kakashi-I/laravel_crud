@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('/css/formStyle.css')}}">
@endpush

@section('content')

    <form action="{{route('employee.store')}}" method="POST">
        @csrf
        <div class="container mt-5 mb-5 d-flex justify-content-center">
            <div class="card px-1 py-4">
                <div class="card-body">
                    <h6 class="card-title mb-3">Create Employee</h6>
                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <h6 class="information ">Add Data</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{0|1}}" name="has_license">
                            <label class="form-check-label" for="defaultCheck1">
                                Has License
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" placeholder="Name"
                                       value="{{old('name')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input class="form-control" type="text" name="number" placeholder="Phone Number"
                                       value="{{old('number')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="E-mail"
                                       value="{{old('email')}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input class="form-control" type="text" name="position" placeholder="Position"
                                       value="{{old('position')}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input class="form-control" type="date" name="birthday" placeholder="Date Of Birth"
                                       value="{{old('birthday')}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="address" placeholder="Address"
                                           value="{{old('address')}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 form-group input-group">
                            <select class="form-control" aria-label="Default select example" name="gender">
                                <option disabled>Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group input-group">
                            <select class="form-control" aria-label="Default select example" name="branch_id">
                                <option disabled selected>Branch</option>
                                @foreach($branches as $branch)
                                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group input-group">
                            <select class="form-control" aria-label="Default select example" name="department_id">
                                <option disabled selected>Department</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block confirm-button">Add</button>
                </div>
            </div>
        </div>
    </form>

@endsection
