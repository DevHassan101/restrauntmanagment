@extends('admin.layouts.app')
@section('title', 'Table')
@section('subtitle', 'Add Table')
@section('maintitle', 'Add Table')
@section('content')
    <div class="card">

        <div class="card-body mt-2">
            <h5 class="card-title">Add Table</h5>

            <form class="row g-3" action="{{ url('table') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <table id="time-table">
                    <thead>
                        <tr>
                            <th>Table</th>
                            <th>Floor</th>
                            <th>Capacity</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="template-row">
                            <td>
                                <input type="text" class="form-control" name="table[]" id="table"
                                    placeholder="Table Number">
                            </td>
                            <td>
                                <select name="floor[]" class="form-select" id="floor" required>
                                    <option value="">Select floor</option>
                                    @foreach ($floors as $floor)
                                        <option value="{{$floor->id}}">{{$floor->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="number" name="capacity[]" class="form-control" placeholder="capacity"></td>
                            <td><button class="remove-row-btn btn btn-primary" type="button">Remove</button></td>
                        </tr>
                    </tbody>
                </table>

                <button id="add-row-btn" type="button" class="btn btn-primary w-auto">Add Row</button>



                {{-- <div class="col-md-6">
                    <label for="table" class="form-label">Table Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="table" id="table" value="{{ old('table') }}">
                    @error('table')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="floor" class="form-label">Floor</label>
                    <select class="form-select" name="floor" id="floor">
                        <option value="">Select floor</option>
                            <option value="floor one">Floor One</option>
                            <option value="floor two">Floor Two</option>
                    </select>
                    @error('floor')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="capacity" class="form-label">Capacity</label>
                    <input type="text" step="any" class="form-control" name="capacity" id="capacity" value="{{ old('capacity') }}">
                    @error('capacity')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div> --}}
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form><!-- End Multi Columns Form -->

        </div>
    </div>

    </div>

    <script>
        const addRowBtn = document.getElementById('add-row-btn');
        const timeTable = document.getElementById('time-table');
        const templateRow = document.querySelector('.template-row');

        addRowBtn.addEventListener('click', function() {
            const newRow = templateRow.cloneNode(true);
            timeTable.querySelector('tbody').appendChild(newRow);
        });

        timeTable.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-row-btn')) {
                const row = event.target.closest('tr');
                row.remove();
            }
        });
    </script>
@endsection
