@extends('admin.layouts.app')
@section('title', 'Deal')
@section('subtitle', 'Edit Deal')
@section('maintitle', 'Edit Deal')
@section('content')
    <div class="card">

        <div class="card-body mt-2">
            <h5 class="card-title">Edit Deal</h5>

            <form class="row g-3" action="{{ url('deal/' . $data->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <div class="col-md-6">
                    <label for="name" class="form-label">Deal Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $data->name }}">
                    @error('name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="discount_percentage" class="form-label">Deal Percentage <span
                            class="text-danger">*</span></label>
                    <input type="number" step="any" class="form-control" name="discount_percentage"
                        id="discount_percentage" value="{{ $data->discount_percentage }}">
                    @error('discount_percentage')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="personcaneat" class="form-label">Person Can Eat<span class="text-danger">*</span></label>
                    <input type="number" step="any" class="form-control" name="personcaneat" id="personcaneat"
                        value="{{ $data->personcaneat }}">
                    @error('personcaneat')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>


                <table id="time-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tablee">
                        @foreach ($dataitems as $dealitem)
                            <tr class="">
                                <td>
                                    <select name="product[]" class="form-select" id="product" required>
                                        <option value="">Select Product</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}" @selected($dealitem->product_id == $product->id)>
                                                {{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="number" step="any" name="quantity[]" class="form-control"
                                        placeholder="quantity" value="{{ $dealitem->quantity }}">
                                    <input type="hidden" value="{{ $dealitem->id }}" name="dealitem[]">
                                </td>

                                <td>
                                    <button value="{{ $dealitem->id }}" class="btn btn-primary remove"
                                        type="submit">Remove</button>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="template-row">
                            <td>
                                <select name="product[]" class="form-select" id="product" required>
                                    <option value="">Select Product</option>
                                    @foreach ($products2 as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="number" step="any" name="quantity[]" class="form-control"
                                    placeholder="quantity">
                                <input type="hidden" value="0" name="dealitem[]">
                            </td>
                            <td><button class="remove-row-btn btn btn-primary" type="button">Remove</button></td>
                        </tr>
                    </tbody>
                </table>

                <button id="add-row-btn" type="button" class="btn btn-primary w-auto">Add Row</button>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form><!-- End Multi Columns Form -->

        </div>
    </div>
    {{-- table jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.remove').click(function() {
                var id = $(this).val();

                $.ajax({
                    type: "GET",
                    url: "{{ url('delete/dealitem') }}",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        console.log("succcess");
                        $('#tablee').load(location.href + ' #tablee');
                    }
                });
            });
        });
    </script>
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
