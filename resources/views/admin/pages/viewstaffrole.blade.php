@extends('admin.layouts.app')
@section('title', 'Staff Role ')
@section('subtitle', 'View Staff Role')
@section('maintitle', 'View Staff Role ')
@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <h3>
                        Staff Role
                    </h3>
                </div>
                <div class="col-md-1">
                    <a href="{{ url('staffrole') }}"> <button type="button" class="btn btn-primary">Back</button></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row rounded">
                <div class="col-md-6 border p-2 bg-light"><b>Staff Role</b></div>
                <div class="col-md-6 border p-2">{{ $data->role }}</div>
            </div>
        </div>
    </div>
@endsection
