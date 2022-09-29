@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('/css/formStyle.css')}}">
@endpush

@section('content')

    <form action="{{route('employee.update',$employee->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="container mt-5 mb-5 d-flex justify-content-center">
            <div class="card px-1 py-4">
                <div class="card-body">
                    <h6 class="card-title mb-3">Update Department</h6>

                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <h6 class="information ">Edit Data</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$employee->has_license}}"
                                   name="has_license" {{$employee->has_license==1?'checked':''}}>
                            <label class="form-check-label" for="defaultCheck1">
                                Has License
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" placeholder="Name"
                                       value="{{$employee->name}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" type="email" name="email" placeholder=""
                                           value="{{$employee->email}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" type="date" name="birthday" placeholder=""
                                           value="{{$employee->birthday}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="number" placeholder=""
                                           value="{{$employee->number}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="position" placeholder="Position"
                                           value="{{$employee->position}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="addr" placeholder=""
                                           value="{{$employee->address}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group input-group">
                            <select class="form-control" aria-label="Default select example" name="gender">
                                <option disabled>Gender</option>
                                <option value="male" {{(($employee->gender=='male')? 'selected':'')}}>Male</option>
                                <option value="female" {{(($employee->gender=='female')? 'selected':'')}}>Female
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group input-group">
                            <select class="form-control" aria-label="Default select example" name="branch_id">
                                <option disabled selected>Branch</option>
                                @foreach($branches as $branch)
                                    <option class="text-black"
                                            value="{{$branch->id}}" {{$branch->id == $employee->branch_id?'selected':'' }} >{{$branch->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group input-group">
                            <select class="form-control" aria-label="Default select example" name="department_id">
                                <option disabled selected>Department</option>
                                @foreach($departments as $department)

                                    <option
                                        value="{{$department->id}}" {{ $department->id == $employee->department_id ? 'selected':'' }}>{{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block confirm-button">Update</button>
                </div>
            </div>
        </div>
    </form>

@endsection
