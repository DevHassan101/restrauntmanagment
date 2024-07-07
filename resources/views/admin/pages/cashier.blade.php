@extends('admin.layouts.app')
@section('title', 'Cashier')
@section('subtitle', 'Cashier')
@section('maintitle', 'Cashier')
@section('content')
    <div class="card">

        <div class="card-body mt-2">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{url('select/table')}}" class="btn btn-primary">Dine In</a>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary">Take Away</button>
                </div>
            </div>

        </div>
    </div>
@endsection
