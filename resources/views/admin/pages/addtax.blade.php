@extends('admin.layouts.app')
@section('title', 'Tax')
@section('subtitle', 'Add Tax')
@section('maintitle', 'Add Tax')
@section('content')
    <div class="card">

        <div class="card-body mt-2">
            <h5 class="card-title">Add Tax</h5>

            <form class="row g-3" action="{{ url('tax') }}" method="POST">
                @csrf
                <div class="col-md-6">
                    <label for="name" class="form-label">Tax Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="percentage" class="form-label">Tax Percentage <span class="text-danger">*</span></label>
                    <input type="number" step="any" class="form-control" name="percentage" id="percentage" value="{{ old('percentage') }}">
                    @error('percentage')
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
