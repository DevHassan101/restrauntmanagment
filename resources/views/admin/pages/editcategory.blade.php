@extends('admin.layouts.app')
@section('title', 'category')
@section('subtitle', 'Edit category')
@section('maintitle', 'Edit category')
@section('content')
    <div class="card">

        <div class="card-body mt-2">
            <h5 class="card-title">Edit category</h5>

            <form class="row g-3" action="{{ url('category/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="col-md-6">
                    <label for="name" class="form-label">Category Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $data->name }}">
                    @error('name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="name" class="form-label">Category Image</label>
                    <input type="file" class="form-control" name="image" id="image" value="{{ old('image') }}">
                    @error('image')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                @if ($data->image)
                    <div class="col-md-6">
                        <label for="old_image" class="form-label">Old Image</label>
                        <input type="hidden" class="form-control" name="old_image" id="old_image" value="{{ $data->name }}">
                        <img src="{{asset('categoryimage/'.$data->image)}}" class="img-fluid d-block" alt="" srcset="" height="150" width="150">
                    </div>
                @endif
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form><!-- End Multi Columns Form -->

        </div>
    </div>

    </div>
@endsection
