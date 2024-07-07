@extends('admin.layouts.app')
@section('title', 'Staff Role')
@section('subtitle', 'Edit Staff Role')
@section('maintitle', 'Edit Staff Role')
@section('content')
    <div class="card">

        <div class="card-body mt-2">
            <h5 class="card-title">Edit Staff Role</h5>

            <form class="row g-3" action="{{ url('staffrole/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="col-md-6">
                    <label for="role" class="form-label">Staff Role<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="role" id="role" value="{{ $data->role }}">
                    @error('role')
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
