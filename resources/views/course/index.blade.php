@extends('layouts.app')

@section('title', 'All Courses')

@section('content')

    <div class="container pt-2">
        <div class="card border-0 shadow-lg mb-4 border-start border-secondary border-5">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h2 class="mb-1 fw-bold text-dark">
                            <i class="bi bi-book me-2 text-secondary"></i>
                            Registered Courses
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                        <form action="{{route('course.import')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row flex-grow-1">
                                <div class="input-group input-group-sm col-6" style="width: 320px">
                                    <input type="file" name="import_file" class="form-control">
                                    <button type="submit" class="btn btn-primary btn-sm">Import</button>
                                </div>
                            </div>
                        </form>
                        <form action="{{route('course.export')}}" method="get">
                            <button type="submit" class="btn btn-primary btn-sm ms-1">Export</button>
                            <a href="{{route('course.pdf')}}" type="button" class="btn btn-primary btn-sm">Export PDF</a>
                        </form>
                        <div class="flex-grow-1 text-center"></div>
                        <form class="d-flex mb-0" onsubmit="return false;">
                            <input id="globalSearchInput" placeholder="Search..." class="form-control form-control-sm me-2">
                        </form>
                        <button type="button"
                                class="btn btn-outline-light btn-sm"
                                data-create-url="{{ route('course.create') }}">Add New Course
                        </button>
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
                                            @foreach($course->subjects as $subject)
                                                <span class="badge bg-secondary me-1">{{ $subject->name }}</span>
                                            @endforeach
                                        </td>
                                        <td class="text-center align-middle" style="min-width: 180px;">
                                            <button type="button"
                                                    class="btn btn-primary btn-sm"
                                                    data-view-url="{{ route('course.show', $course->id) }}">
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
