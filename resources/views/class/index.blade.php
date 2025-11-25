@extends('layouts.app')

@section('title', 'All Classes')

@section('content')

    <div class="bg-secondary bg-opacity-10 py-5 mb-4">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <h1 class="h2 fw-bold mb-0">All Classes</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item active">Classes</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">

                <div class="card shadow">
                    <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                        <div class="flex-grow-1 text-center">
                            <h4 class="mb-0">Registered Classes</h4>
                        </div>
                        <a href="{{ route('class.create') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-plus-lg"></i> Add New Class
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-dark">
                                <tr>
                                    <th>Class Code</th>
                                    <th>Class Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($classes as $class)
                                    <tr>
                                        <td><strong>{{ $class->code }}</strong></td>
                                        <td>{{ $class->name }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-warning btn-sm">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
