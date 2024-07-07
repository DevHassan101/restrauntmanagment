@extends('admin.layouts.app')
@section('title', 'Table ')
@section('subtitle', 'View Table')
@section('maintitle', 'View Table ')
@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <h3>
                        Table
                    </h3>
                </div>
                <div class="col-md-1">
                    <a href="{{ url('table') }}"> <button type="button" class="btn btn-primary">Back</button></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row rounded">
                <div class="col-md-6 border p-2 bg-light"><b>Table Name</b></div>
                <div class="col-md-6 border p-2">{{ $data->table }}</div>
                <div class="col-md-6 border p-2 bg-light"><b>Table Floor</b></div>
                <div class="col-md-6 border p-2">{{ $data->floor }}</div>
                <div class="col-md-6 border p-2 bg-light"><b>Table Capacity</b></div>
                <div class="col-md-6 border p-2">{{ $data->capacity }}</div>
            </div>
        </div>
    </div>
@endsection
