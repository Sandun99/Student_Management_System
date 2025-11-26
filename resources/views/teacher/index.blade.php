@extends('layouts.app')

@section('title', 'All Teachers')

@section('content')

    <div class="bg-secondary bg-opacity-10 py-5 mb-4">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <h1 class="h2 fw-bold mb-0">All Teachers</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item active">Teachers</li>
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
                            <h4 class="mb-0">Registered Teachers</h4>
                        </div>
                        <a href="{{ route('teacher.teacher.add') }}" class="btn btn-light btn-sm">
                            Add New Teacher
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-dark">
                                <tr>
                                    <th>Teacher ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>NIC</th>
                                    <th>Mobile</th>
                                    <th>Subject</th>
                                    <th>Grade</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($teachers as $teacher)
                                    <tr data-id="{{ $teacher->id }}">
                                        <td><strong>{{ $teacher->t_id }}</strong></td>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->email }}</td>
                                        <td>{{ $teacher->nic }}</td>
                                        <td>{{ $teacher->mobile }}</td>
                                        <td>
                                            @forelse($teacher->subjects as $subject)
                                                <span class="badge bg-secondary me-1 mb-1">{{ $subject->name }}</span>
                                            @empty
                                                <span class="text-muted">—</span>
                                            @endforelse
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary">
                                                {{ $teacher->grade?->name ?? '—' }}
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
                                                    onclick="deleteButton({{ $teacher->id }}, 'teacher')">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>

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
