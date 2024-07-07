@extends('admin.layouts.app')
@section('title', 'category ')
@section('subtitle', 'View category')
@section('maintitle', 'View category ')
@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <h3>
                        category
                    </h3>
                </div>
                <div class="col-md-1">
                    <a href="{{ url('category') }}"> <button type="button" class="btn btn-primary">Back</button></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row rounded">
                <div class="col-md-6 border p-2 bg-light"><b>Category Name</b></div>
                <div class="col-md-6 border p-2">{{ $data->name }}</div>
                <div class="col-md-6 border p-2 bg-light"><b>Category Image</b></div>
                <div class="col-md-6 border p-2">
                    @if ($data->image)
                        <td scope="row">
                            <img src="{{ asset('categoryimage/' . $data->image) }}" alt="" srcset=""
                                height="50px" width="50px">
                        </td>
                    @else
                        <img src="{{ asset('assets/img/noimage.jpg') }}" alt="" srcset="" height="50px"
                            width="50px">
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
