@extends('admin.layouts.app')
@section('title', 'Staff Role')
@section('subtitle', 'Add Staff Role')
@section('maintitle', 'Add Staff Role')
@section('content')
    <div class="card">

        <div class="card-body mt-2">
            <h5 class="card-title">Add Staff Role</h5>

            <form class="row g-3" action="{{ url('staffrole') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="role" class="form-label">Staff Role <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="role" id="role" value="{{ old('role') }}">
                    @error('role')
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
