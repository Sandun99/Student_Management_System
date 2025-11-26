@extends('layouts.app')

@section('title', 'All Students')

@section('content')

    <div class="bg-secondary bg-opacity-10 py-5 mb-4">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <h1 class="h2 fw-bold mb-0">All Students</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item active">Students</li>
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
                            <h4 class="mb-0">Registered Students</h4>
                        </div>
                        <form class="d-flex mb-0" onsubmit="return false;">
                            <input id="globalSearchInput" placeholder="Search..." class="form-control form-control-sm me-2">
                        </form>
                        <a href="{{ route('student.create') }}" class="btn btn-light btn-sm">
                            Add New Student
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-dark">
                                <tr>
                                    <th>Reg No</th>
                                    <th>Name</th>
                                    <th>NIC</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Course</th>
                                    <th>Grade</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody id="searchableTable">
                                @forelse($students as $student)
                                    <tr data-id="{{ $student->id }}">
                                        <td><strong>{{ $student->reg_no }}</strong></td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->nic }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->mobile }}</td>
                                        <td>
                                            @if($student->course)
                                                <span class="badge bg-secondary">
                                                        {{ $student->course->name }}
                                                    </span>
                                            @else
                                                <span class="badge bg-secondary">No Course</span>
                                            @endif
                                        </td>
                                        <td>
                                                <span class="badge bg-secondary">
                                                    {{ $student->grade?->name ?? '—' }}
                                                </span>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary btn-sm">
                                                View
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="deleteButton({{ $student->id }}, 'student')">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-5">
                                            <h5>No students found</h5>
                                            <a href="{{ route('student.create') }}" class="btn btn-primary mt-2">
                                                Add First Student
                                            </a>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
