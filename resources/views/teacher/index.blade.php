@extends('layouts.app')

@section('title', 'All Teachers')

@section('content')

    <div class="container pt-2">
        <div class="card border-0 shadow-lg mb-4 border-start border-secondary border-5">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h2 class="mb-1 fw-bold text-dark">
                            <i class="bi bi-person-badge me-2 text-secondary"></i>
                            Registered Teachers
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
                        <form action="{{route('teacher.import')}}" method="post" enctype="multipart/form-data">
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
                                    <form data-export action="{{ route('teacher.export') }}" method="get" class="d-inline">
                                        <input type="hidden" name="search">
                                        <button type="submit" class="dropdown-item">
                                            Export Excel
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <form data-export action="{{ route('teacher.pdf') }}" method="get" class="d-inline">
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
                                data-create-url="{{ route('teacher.teacher.create') }}">Add New Teacher
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-dark">
                                <tr>
                                    <th>T_ID</th>
                                    <th>Name</th>
                                    <th>NIC</th>
                                    <th>Mobile</th>
                                    <th>Subject</th>
                                    <th>Grade</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody id="searchableTable">
                                @forelse($teachers as $teacher)
                                    <tr data-id="{{ $teacher->id }}">
                                        <td><strong>{{ $teacher->t_id }}</strong></td>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->nic }}</td>
                                        <td>{{ $teacher->mobile }}</td>
                                        <td>
                                            @foreach($teacher->subjects as $subject)
                                                <span class="badge bg-secondary me-1 mb-1">{{ $subject->name }}</span>
                                            @endforeach
                                        </td>
                                        <td style="width: 120px">
                                            @foreach($teacher->grades as $grade)
                                                <span class="badge bg-secondary me-1 mb-1">{{ $grade->full_name }}</span>
                                            @endforeach

                                        </td>
                                        <td class="text-center align-middle py-2">
                                            <div class="btn-group" role="group">
                                                <button type="button"
                                                        class="btn btn-primary btn-sm"
                                                        data-view-url="{{ route('teacher.show', $teacher->id) }}">
                                                    View
                                                </button>
                                                <a href="{{route('teacher.teacher.edit',$teacher->id)}}"
                                                   class="btn btn-warning btn-sm">
                                                    Edit
                                                </a>
                                                <a href="{{route('teacher.teacher.delete',$teacher->id)}}"
                                                   data-delete="teacher" class="btn btn-danger btn-sm">
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

