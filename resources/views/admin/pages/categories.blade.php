@extends('admin.layouts.app')

@section('title', 'Home Page')
@section('subtitle', '')
@section('maintitle', '')

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
                        Categories
                    </h3>
                </div>
                <div class="col-md-4">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ url('category/create') }}" type="button" class="btn btn-primary">
                            Add category
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
                        <th scope="col">Category Name</th>
                        <th scope="col">category Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php $count = 1; ?>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="">
                            <td>
                                {{ $count++ }}
                            </td>
                            <td scope="row">{{ $category->name }}</td>
                            <td scope="row">
                                @if ($category->image)
                                    <img src="{{ asset('categoryimage/' . $category->image) }}" alt="" srcset=""
                                        height="50px" width="50px">
                                @else
                                    <img src="{{ asset('assets/img/noimage.jpg') }}" alt="" srcset=""
                                        height="50px" width="50px">
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary-nz" type="button" data-bs-toggle="dropdown">
                                        <i class="fa fa-bars text-white"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{ url('category/' . $category->id) }}"><i
                                                    class="text-info fa fa-eye"></i>
                                                View</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ url('category/' . $category->id . '/edit') }}"><i
                                                    class="text-warning fa fa-edit"></i> Edit</a></li>
                                        <li>
                                            <form action="{{ url('category/' . $category->id) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button class="dropdown-item">
                                                    <i class="text-danger fa fa-trash"></i> Delete
                                                </button>
                                            </form>
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
