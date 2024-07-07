@extends('admin.layouts.app')
@section('title', 'Table')
@section('subtitle', 'Edit Table')
@section('maintitle', 'Edit Table')
@section('content')
    <div class="card">

        <div class="card-body mt-2">
            <h5 class="card-title">Edit Table</h5>

            <form class="row g-3" action="{{ url('table/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="col-md-6">
                    <label for="table" class="form-label">Table<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="table" id="table" value="{{ $data->table }}">
                    @error('table')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="floor" class="form-label">Floor</label>
                    <select class="form-select" name="floor" id="floor">
                        <option selected>Select floor</option>
                        @foreach ($floors as $floor)
                            <option value="{{ $floor->id }}" @selected($floor->id == $data->floor_id)>{{ $floor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="capacity" class="form-label">Capacity<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="capacity" id="capacity" value="{{ $data->capacity }}">
                    @error('capacity')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form><!-- End Multi Columns Form -->

        </div>
    </div>

    </div>
@endsection
