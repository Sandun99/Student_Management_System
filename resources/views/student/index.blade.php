@extends('layouts.app')

@section('title', 'All Students')

@section('content')

    <div class="container pt-2">
        <div class="card border-0 shadow-lg mb-4 border-start border-secondary border-5">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h2 class="mb-1 fw-bold text-dark">
                            <i class="bi bi-people me-2 text-secondary"></i>
                            Registered Students
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
                        <form action="{{route('student.import')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row flex-grow-1">
                                <div class="input-group input-group-sm col-6" style="width: 320px">
                                    <input type="file" name="import_file" class="form-control">
                                    <button type="submit" class="btn btn-primary btn-sm">Import</button>
                                </div>
                            </div>
                        </form>
                        <div class="btn-group ms-1" role="group">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Export As
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <form data-export action="{{ route('student.export') }}" method="get" class="d-inline">
                                        <input type="hidden" name="search">
                                        <button type="submit" class="dropdown-item">
                                            Export Excel
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <form data-export action="{{ route('student.pdf') }}" method="get" class="d-inline">
                                        <input type="hidden" name="search">
                                        <button type="submit" class="dropdown-item">
                                            Export PDF
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="flex-grow-1"></div>
                        <form class="d-flex mb-0" onsubmit="return false;">
                            <input id="globalSearchInput" placeholder="Search..." class="form-control form-control-sm me-2">
                        </form>
                        <button type="button"
                                class="btn btn-outline-light btn-sm"
                                data-create-url="{{ route('student.create') }}">Add New Student
                        </button>
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
                                                {{ $student->grade?->full_name}}
                                            </span>
                                        </td>
                                        <td class="text-center align-middle py-2">
                                            <div class="btn-group" role="group">
                                                <button type="button"
                                                        class="btn btn-primary btn-sm"
                                                        data-view-url="{{ route('student.show', $student->id) }}">
                                                    View
                                                </button>
                                                <a href="{{route('student.edit',$student->id)}}"
                                                   class="btn btn-warning btn-sm">
                                                    Edit
                                                </a>
                                                <a href="{{route('student.delete',$student->id)}}" type="button"
                                                   data-delete="grade" class="btn btn-danger btn-sm">
                                                    Delete
                                                </a>
                                            </div>
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
