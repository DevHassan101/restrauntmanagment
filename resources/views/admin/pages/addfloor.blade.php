@extends('admin.layouts.app')
@section('title', 'Floor')
@section('subtitle', 'Add Floor')
@section('maintitle', 'Add Floor')
@section('content')
    <div class="card">

        <div class="card-body mt-2">
            <h5 class="card-title">Add Floor</h5>

            <form class="row g-3" action="{{ url('floor') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="floor" class="form-label">Floor <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="floor" id="floor" value="{{ old('floor') }}">
                    @error('floor')
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
