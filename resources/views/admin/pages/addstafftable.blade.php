@extends('admin.layouts.app')
@section('title', 'Staff Table')
@section('subtitle', 'Add Staff Table')
@section('maintitle', 'Add Staff Table')
@section('content')
    <div class="card">

        <div class="card-body mt-2">
            <h5 class="card-title">Add Staff Table</h5>

            <form class="row g-3" action="{{ url('stafftable') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="staff" class="form-label">Staff</label>
                    <select class="form-select" name="staff" id="staff">
                        <option value="">Select staff</option>
                        @foreach ($staffs as $staff)
                            <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                        @endforeach
                    </select>
                    @error('staff')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="table" class="form-label">Table</label>
                    <select class="form-select" name="table" id="table">
                        <option value="">Select table</option>
                        @foreach ($tables as $table)
                            <option value="{{ $table->id }}">{{ $table->table }}</option>
                        @endforeach
                    </select>
                    @error('table')
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
