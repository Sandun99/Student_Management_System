@extends('layouts.app')

@section('title', 'All Courses')

@section('content')

    <div class="bg-secondary bg-opacity-10 py-5 mb-4">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <h1 class="h2 fw-bold mb-0">All Courses</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item active">Courses</li>
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
                            <h4 class="mb-0">Registered Courses</h4>
                        </div>
                        <form class="d-flex mb-0" onsubmit="return false;">
                            <input id="globalSearchInput" placeholder="Search..." class="form-control form-control-sm me-2">
                        </form>
                        <a href="{{ route('course.create') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-plus-lg"></i> Add New Course
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-dark">
                                <tr>
                                    <th>Code</th>
                                    <th>Course Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Duration</th>
                                    <th class="text-center">Subjects</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody id="searchableTable">
                                @forelse($courses as $course)
                                    <tr data-id="{{ $course->id }}">
                                        <td><strong>{{ $course->code }}</strong></td>
                                        <td class="text-center align-middle">{{ $course->name }}</td>
                                        <td class="text-center align-middle">{{ $course->category ?? '-' }}</td>
                                        <td>Rs.{{ number_format($course->price, 2) }}</td>
                                        <td>{{ $course->duration }}</td>
                                        <td>
                                            @if($course->subjects->isNotEmpty())
                                                @foreach($course->subjects as $subject)
                                                    <span class="badge bg-secondary me-1">{{ $subject->name }}</span>
                                                @endforeach
                                            @else
                                                <span class="text-muted">No subjects</span>
                                            @endif
                                        </td>
                                        <td class="text-center align-middle" style="min-width: 180px;">
                                            <button type="button" class="btn btn-primary btn-sm">
                                                View
                                            </button>
                                            <a href="{{route('course.edit',$course->id)}}" class="btn btn-warning btn-sm">
                                                Edit
                                            </a>
                                            <a href="{{route('course.delete',$course->id)}}" type="button"
                                               data-delete="grade" class="btn btn-danger btn-sm">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">
                                            No courses found. <a href="{{ route('course.create') }}">Create one now</a>
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
