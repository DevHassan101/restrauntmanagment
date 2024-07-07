@extends('admin.layouts.app')
@section('title', 'Product')
@section('subtitle', 'Edit Product')
@section('maintitle', 'Edit Product')
@section('content')
    <div class="card">

        <div class="card-body mt-2">
            <h5 class="card-title">Edit Product</h5>

            <form class="row g-3" action="{{ url('product/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="col-md-6">
                    <label for="name" class="form-label">Product Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $data->name }}">
                    @error('name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" name="category" id="category">
                        <option value="">Select category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected($category->id == $data->category_id)>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step="any" class="form-control" name="price" id="price"
                        value="{{ $data->price}}">
                    @error('price')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="name" class="form-label">product Image</label>
                    <input type="file" class="form-control" name="image" id="image" value="{{ $data->image }}">
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
                        <img src="{{asset('productimage/'.$data->image)}}" class="img-fluid d-block" alt="" srcset="" height="150" width="150">
                    </div>
                @endif
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form><!-- End Multi Columns Form -->

        </div>
    </div>

    </div>
@endsection
