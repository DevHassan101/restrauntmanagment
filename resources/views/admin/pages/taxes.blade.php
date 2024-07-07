@extends('admin.layouts.app')

@section('title', 'Home Page')
@section('subtitle', 'Taxes')
@section('maintitle', 'Taxes')

@section('content')


    <div class="card">
        <div class="card-header">
            @if (session('success'))
                <div id="alert" class="alert alert-success">
                    <strong>Success: </strong>
                    {{ session('success') }}
                </div>
            @elseif (session('failed'))
                <div id="alert" class="alert alert-danger">
                    <strong>Failed: </strong>
                    {{ session('failed') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-8">
                    <h3>
                        Taxes
                    </h3>
                </div>
                <div class="col-md-4">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ url('tax/create') }}" type="button" class="btn btn-primary">
                            Add Tax
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tax Name</th>
                        <th scope="col">Tax Percentage</th>
                        <th scope="col">Tax Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php $count = 1; ?>
                <tbody>
                    @foreach ($taxes as $tax)
                        <tr class="">
                            <td>
                                {{ $count++ }}
                            </td>
                            <td scope="row">{{ $tax->name }}</td>
                            <td scope="row">{{ $tax->percentage }}</td>
                            <td scope="row">
                                @if ($tax->status == true)
                                    Active
                                @else
                                    In-active
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary-nz" type="button" data-bs-toggle="dropdown">
                                        <i class="fa fa-bars text-white"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{ url('tax/' . $tax->id) }}"><i
                                                    class="text-info fa fa-eye"></i>
                                                View</a></li>
                                        <li><a class="dropdown-item" href="{{ url('tax/' . $tax->id . '/edit') }}"><i
                                                    class="text-warning fa fa-edit"></i> Edit</a></li>
                                        <li>
                                            <form action="{{ url('tax/' . $tax->id) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button class="dropdown-item">
                                                    <i class="text-danger fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                            @if ($tax->status == true)
                                                <a class="dropdown-item"
                                                    href="{{ url('tax/changestatus/' . $tax->id . '/0') }}">
                                                        <i class="text-danger fa fa-circle" aria-hidden="true"></i>
                                                        In-active</a>
                                            @else
                                                <a class="dropdown-item"
                                                    href="{{ url('tax/changestatus/' . $tax->id . '/1') }}"> 
                                                        <i class="text-success fa fa-check-circle" aria-hidden="true"></i>
                                                        Active</a>
                                            @endif
                                        </li>

                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
