@extends('admin.layouts.app')
@section('title', 'Discount ')
@section('subtitle', 'View Discount')
@section('maintitle', 'View Discount ')
@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <h3>
                        Discount
                    </h3>
                </div>
                <div class="col-md-1">
                    <a href="{{ url('discount') }}"> <button type="button" class="btn btn-primary">Back</button></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row rounded">
                <div class="col-md-6 border p-2 bg-light"><b>Discount Name</b></div>
                <div class="col-md-6 border p-2">{{ $data->name }}</div>
                <div class="col-md-6 border p-2 bg-light"><b>Discount Percentage</b></div>
                <div class="col-md-6 border p-2">{{$data->percentage}}%</div>
            </div>
        </div>
    </div>
@endsection
