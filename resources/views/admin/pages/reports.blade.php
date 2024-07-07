@extends('admin.layouts.app')

@section('title', 'Home Page')
@section('subtitle', '')
@section('maintitle', '')

@section('content')


    <div class="card">
        <div class="card-header">
            @if (session('success'))
                <div id="alert" class="alert alert-success">
                    <strong>Success: </strong>
                    {{ session('success') }}
                </div>
            @elseif (session('failed'))
                <div id="alert" class="alert alert-danger">
                    <strong>Failed: </strong>
                    {{ session('failed') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-8">
                    <h3>
                        Order Reports
                    </h3>
                </div>
            </div>
        </div>
        <div class="card-body p-3">
            <a name="" id="" class="btn btn-primary w-100 mb-2" href="{{ url('report/summary') }}"
                role="button">Sales Report Summary</a>
            <a name="" id="" class="btn btn-primary w-100 mb-2" href="{{ url('report/detail') }}" role="button">Detail Sale
                Report</a>
        </div>

    </div>
@endsection
