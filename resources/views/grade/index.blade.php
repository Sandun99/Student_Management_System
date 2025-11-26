@extends('layouts.app')

@section('title', 'Add Grade')

@section('content')

    <div class="bg-secondary bg-opacity-10 py-5 mb-4">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <h1 class="h2 fw-bold mb-0">All Grades</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item active">Grades</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container pb-5">

        <div class="card shadow" >
            <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                <div class="flex-grow-1 text-center">
                    <h4 class="mb-0">Registered Grades</h4>
                </div>
                <a href="{{ route('grade.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-lg"></i> Add New Grade
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="gradesTable">
                        <thead class="table-dark">
                        <tr>
                            <th>Grade Code</th>
                            <th>Grade Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody id="gradesBody">
                        @foreach($grades as $grade)
                            <tr data-id="{{ $grade->id }}">
                                <td><strong>{{ $grade->code }}</strong></td>
                                <td>
                                    <strong>{{ $grade->full_name }}</strong>

                                </td>
                                <td class='text-center'>
                                    <button type="button" class="btn btn-warning btn-sm"
                                            onclick="loadUpdateForm({{ $grade->id }})">Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                            onclick="deleteButton({{ $grade->id }}, 'grade')">
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

@endsection
