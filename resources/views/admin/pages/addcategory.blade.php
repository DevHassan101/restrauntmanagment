@extends('admin.layouts.app')
@section('title', 'category')
@section('subtitle', 'Add category')
@section('maintitle', 'Add category')
@section('content')
    <div class="card">

        <div class="card-body mt-2">
            <h5 class="card-title">Add category</h5>

            <form class="row g-3" action="{{ url('category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="name" class="form-label">Category Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
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
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form><!-- End Multi Columns Form -->

        </div>
    </div>

    </div>
@endsection
