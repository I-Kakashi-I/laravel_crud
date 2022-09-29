@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('/css/formStyle.css')}}">
@endpush

@section('content')

    <form action="{{route('department.store')}}" method="POST">
        @csrf
    <div class="container mt-5 mb-5 d-flex justify-content-center">
        <div class="card px-1 py-4">
            <div class="card-body">
                <h6 class="card-title mb-3">Create Department</h6>

                <h6 class="information mt-4">Add Data</h6>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                          <input class="form-control" type="text" name="name" placeholder="Name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" type="text" name="dic" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block confirm-button">Add</button>
            </div>
        </div>
    </div>
    </form>

@endsection
