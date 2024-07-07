@extends('admin.layouts.app')
@section('title', 'Deal ')
@section('subtitle', 'View Deal')
@section('maintitle', 'View Deal ')
@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <h3>
                        Deal
                    </h3>
                </div>
                <div class="col-md-1">
                    <a href="{{ url('deal') }}"> <button type="button" class="btn btn-primary">Back</button></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row rounded">
                <div class="col-md-6 border p-2 bg-light"><b>Deal Name</b></div>
                <div class="col-md-6 border p-2">{{ $data->name }}</div>
                <div class="col-md-6 border p-2 bg-light"><b>Original Price</b></div>
                <div class="col-md-6 border p-2">{{ $data->originalprice }}</div>
                <div class="col-md-6 border p-2 bg-light"><b>Deal Price</b></div>
                <div class="col-md-6 border p-2">{{ $data->dealprice }}</div>
                <div class="col-md-6 border p-2 bg-light"><b>Discount Percentage</b></div>
                <div class="col-md-6 border p-2">{{ $data->discount_percentage }}</div>
                <div class="col-md-6 border p-2 bg-light"><b>Person Can Eat</b></div>
                <div class="col-md-6 border p-2">{{ $data->personcaneat }}</div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                        @foreach ($dataitems as $dealitem)
                            <tr class="">
                                <td scope="row">{{ $count++ }}</td>
                                <td>{{ $dealitem->product }}</td>
                                <td>{{ $dealitem->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
