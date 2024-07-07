@extends('admin.layouts.app')
@section('title', 'Staff ')
@section('subtitle', 'View Staff')
@section('maintitle', 'View Staff ')
@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <h3>
                        Staff
                    </h3>
                </div>
                <div class="col-md-1">
                    <a href="{{ url('staff') }}"> <button type="button" class="btn btn-primary">Back</button></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row rounded">
                <div class="col-md-6 border p-2 bg-light"><b>Staff Name</b></div>
                <div class="col-md-6 border p-2">{{ $data->name }}</div>
                <div class="col-md-6 border p-2 bg-light"><b>Role</b></div>
                <div class="col-md-6 border p-2">{{ $data->role }}</div>
            </div>
        </div>
    </div>
@endsection
